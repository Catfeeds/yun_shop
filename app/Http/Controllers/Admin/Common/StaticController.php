<?php

namespace App\Http\Controllers\Admin\Common;

//use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Carbon\Carbon;
use App\Models\Admin;

class StaticController extends AppBaseController
{
    /** @var  managerRepository */
    /**
     * Display a listing of the Shop.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $start_time = Carbon::today();
        $end_time = null;
        $admin = admin();
        if(array_key_exists('time_type', $input) && !empty($input['time_type'])){
                if($input['time_type'] == 'day'){
                     $start_time = Carbon::today();
                     $end_time = Carbon::tomorrow();
                }
                elseif($input['time_type'] == 'week'){
                     $start_time = Carbon::today()->startOfWeek();
                     $end_time = Carbon::today()->endOfWeek();
                }
                elseif ($input['time_type'] == 'month') {
                     $start_time = Carbon::today()->startOfMonth();
                     $end_time = Carbon::today()->endOfMonth();
                }
                elseif ($input['time_type'] == 'custom'){
                    if(array_key_exists('time_start',$input) && !empty($input['time_start'])){
                        $start_time = $input['time_start'];
                    }

                   if(array_key_exists('time_end',$input) && !empty($input['time_end'])){
                        $end_time = $input['time_end'];
                    }
                }
        }#默认当天
        else{
             $start_time = Carbon::today();
               $end_time = Carbon::tomorrow();
        }
        #角色类型 如果是代理商就返回对应代理商的id
        $role_type = $admin->type=='管理员'?'总部':$admin->id;
        #根据时间和角色类型统计对应的套餐情况
        $statics = app('commonRepo')->packageLogRepo()->staticsPackageType($start_time,$end_time,$role_type);
        $admins = collect([]);
        if( $admin->type == '管理员'){
            $admins = paginate(Admin::where('type','代理商'));
            foreach ($admins as $key => $val) {
                $package_price = 0;
                $package_num = 0;
                $ticheng_sum_price = 0;
                #这个代理商下的所有商户
                $shanghus = admin_parent_arr($val->id,false);
                #代理商旗下注册商户数
                $val['shanghu_num'] = count($shanghus);
                foreach ($shanghus as $key => $shanghu) {
                    #这些代理商旗下商户的套餐记录
                    $shanghu_package_log = $shanghu->packagelog()->where('status','已完成')->get();
                    $package_num  += count($shanghu_package_log);
                    $package_price += $shanghu_package_log->sum('price');
                    #再算每次套餐的钱
                    foreach ($shanghu_package_log as $key => $shanghu_log) {
                       if($shanghu_log->distribution_one == $val->nickname){
                            $ticheng_sum_price += $shanghu_log->bonus_one;
                       }
                       if($shanghu_log->distribution_two == $val->nickname){
                            $ticheng_sum_price += $shanghu_log->bonus_two;
                       }
                    }
                }
                #商户购买套餐数量
                $val['shanghu_buy_num'] = $package_num;
                #商户购买套餐总额
                $val['shanghu_buy_price'] = $package_price;
                #提成总额
                $val['ticheng_sum_price'] = $ticheng_sum_price;
            }
        }
        return view('common.statics.index')
              ->with('type',$admin->type)
              ->with('statics',$statics)
              ->with('admins',$admins)
              ->with('input',$input);
    }

 
}
