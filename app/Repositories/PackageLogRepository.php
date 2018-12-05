<?php

namespace App\Repositories;

use App\Models\PackageLog;
use InfyOm\Generator\Common\BaseRepository;
use Config;
/**
 * Class PackageLogRepository
 * @package App\Repositories
 * @version June 21, 2018, 10:29 am CST
 *
 * @method PackageLog findWithoutFail($id, $columns = ['*'])
 * @method PackageLog find($id, $columns = ['*'])
 * @method PackageLog first($columns = ['*'])
*/
class PackageLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'package_name',
        'price',
        'admin_id',
        'type',
        'bonus_one',
        'bonus_two',
        'distribution_one',
        'distribution_two',
        'status',
        'years',
        'pay_price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PackageLog::class;
    }

    private function packageType($obj,$package_name){
        return $obj->filter(function ($item, $key) use ($package_name){
            return $item->package_name == $package_name;
        });
    }

    /**
     * [统计套餐类型]
     * @param  [type] $start_time [description]
     * @param  [type] $end_time   [description]
     * @param  string/integer $type       [description]
     * @return [type]             [description]
     */
    public function staticsPackageType($start_time,$end_time,$type='总部'){
        #存在两个起止时间
        if(!empty($start_time) && !empty($end_time)){
            $package_log =  PackageLog::whereBetween('created_at',[$start_time,$end_time])->where('status','已完成');
        }

        #只有开始时间
        if(!empty($start_time) && empty($end_time)){
             $package_log =  PackageLog::where('created_at','>=',$start_time)->where('status','已完成');
        }

        #只有结束时间
        if(!empty($end_time) && empty($start_time)){
            $package_log =  PackageLog::where('created_at','<=',$start_time)->where('status','已完成');
        }

        #对应代理商下面的商户购买情况
        if($type != '总部' && is_numeric($type)){
            $package_log = $package_log->whereIn('admin_id',admin_parent_arr($type));
        }

        $package_log =  $package_log->get();

        #总套餐销售量
        $all_count_num = count($package_log);
        #总套餐销售额
        $all_count_price = $package_log->sum('price');
        #展示版销售量
        $all_zhanshi_num = count($this->packageType($package_log,'展示版'));
        #展示版销售额
        $all_zhanshi_price = $this->packageType($package_log,'展示版')->sum('price');
        #在线交易版销售量
        $all_shop_num = count($this->packageType($package_log,'在线交易版'));
        #在线交易版销售额
        $all_shop_price = $this->packageType($package_log,'在线交易版')->sum('price');
        #高级定制版销售量
        $all_custom_num = count($this->packageType($package_log,'高级定制版'));
        #高级定制版销售额
        $all_custom_price = $this->packageType($package_log,'高级定制版')->sum('price');
        
        return (object)[
            'all_count_num' => $all_count_num ,
            'all_count_price' => $all_count_price,
            'all_zhanshi_num' => $all_zhanshi_num,
            'all_zhanshi_price' => $all_zhanshi_price,
            'all_shop_num' => $all_shop_num,
            'all_shop_price' => $all_shop_price,
            'all_custom_num'=> $all_custom_num,
            'all_custom_price' => $all_custom_price
        ]; 
    }

}
