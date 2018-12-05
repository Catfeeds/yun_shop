<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountInfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_infos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('account')->comment('租户account信息');

            $table->string('mini_appid')->nullable()->comment('小程序appid');
            $table->string('mini_secret')->nullable()->comment('小程序secret');
            #更多
            
            $table->index(['id', 'created_at']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('account_infos');
    }
}
