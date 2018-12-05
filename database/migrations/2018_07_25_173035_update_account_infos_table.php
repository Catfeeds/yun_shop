<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateAccountInfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_infos', function (Blueprint $table) {

            $table->integer('province')->nullable()->default(0)->comment('省份');
            $table->integer('city')->nullalbe()->default(0)->comment('城市');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
