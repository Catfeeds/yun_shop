<?php

namespace App\Repositories;

use App\Models\AccountInfo;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
/**
 * Class AccountInfoRepository
 * @package App\Repositories
 * @version July 24, 2018, 5:30 pm CST
 *
 * @method AccountInfo findWithoutFail($id, $columns = ['*'])
 * @method AccountInfo find($id, $columns = ['*'])
 * @method AccountInfo first($columns = ['*'])
*/
class AccountInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account',
        'mini_appid',
        'mini_secret'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountInfo::class;
    }

    public function accountAdminInfo($account=null,$use_save=false,$use_shop=false){
       // return Cache::remember('zcjy_account_info_'.$account.'_'.$use_save.'_'.$use_shop, Config::get('web.cachetime'), function() use($account,$use_save,$use_shop){
            try {
                if(!empty($account)){
                      $admin_info = AccountInfo::where('account',$account)->first();
                }
                else{
                    $admin_info = null;
                }
                if($use_save){
                    if(empty($admin_info)){
                         if($use_shop){
                            $account = app('commonRepo')->accountString();
                         }
                         $admin_info = AccountInfo::create([
                                'account'=>$account
                            ]);
                         //app('commonRepo')->accountString()
                    }
                    else{
                        $admin_info = false;
                    }
                }
                return $admin_info;
            } catch (Exception $e) {
                return null;
            }
        //});
    }
}
