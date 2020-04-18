<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('user_id')->unsigned()->index();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->double('balance', 15, 2)->default(100000);
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('email');
            $table->string('picture')->nullable();
            $table->string('phone_number');
            $table->string('account_number');
            $table->string('card_options')->default(serialize(['card' => 0, 'online' => 0, 'foreign' => 0]));
            $table->datetime('opening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
