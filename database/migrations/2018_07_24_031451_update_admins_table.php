<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) { 

              if(!Schema::hasColumn('admins', 'account_id')){
                $table->integer('account_id')->nullable()->default(0)->comment('账户id');
              }
            
              $table->integer('province')->nullable()->default(0)->comment('省份');
              $table->integer('city')->nullalbe()->default(0)->comment('城市');
            //$table->string('account')->nullable()->comment('租户, 商户才有');

  
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('admins');
    }
}
