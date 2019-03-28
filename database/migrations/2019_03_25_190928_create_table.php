<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable(true);
            $table->string('user_name');
            $table->date('date_of_birth')->nullable(true);
            $table->integer('user_type');
            $table->string('profile_image')->nullable(true);
            $table->string('slug')->nullable(true);
            $table->boolean('status')->default(1);
            $table->boolean('is_online')->default(0);
            $table->string('password');

            $table->timestamps();
        });

        Schema::create('user_task', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->timestamps();


        });



        DB::table('users')->insert([
            [
                'first_name' => 'Super Administrator', 'last_name' => '',
                'user_type' => 10,
                'user_name' => 'superAdmin123@gmail.com',
                'profile_image'=>'default.png',
                'password' => Hash::make('admin'),


            ],
            [
                'first_name' => 'Test1', 'last_name' => '',
                'user_name' => 'test1@gmail.com',
                'user_type' => 20,
                'profile_image'=>'default.png',
                'password' => Hash::make('test1'),



            ],

        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_task');

    }
}
