<?php

use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\AccountInfo;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //if(count(AdminInfo::all()) == 0){
        if(count(AccountInfo::all())==0){
          $admin_info = AccountInfo::create([
            'account'=>'zcjy'
          ]);
        }
        //}

        //if(count(Admin::all()) == 0){
        if(count(Admin::all())==0){
          $super_admin_user = Admin::create([
            'nickname' => '超级管理员',
            'mobile' => '13125110550',
            'password'=>Hash::make('zcjy123'),
            'type' => '管理员',
            'account'=>'zcjy',
            'account_id'=>$admin_info->id
          ]);
        }
        //}
     
    }


}
