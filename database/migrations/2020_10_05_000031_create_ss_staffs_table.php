<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ss_staffs', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 256)->comment('氏名');
            $table->string('mail', 128)->comment('メールアドレス')->unique();
            $table->string('password', 256)->nullable()->comment('パスワード');
            $table->decimal('role', 1, 0)->comment('権限');
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement("ALTER TABLE ss_staffs COMMENT 'SNAPSHOT社員マスタ';");

        \DB::table('ss_staffs')->insert([
            [
                "id" => 0,
                "name" => "管理者",
                "mail" => "admin@snapshot.co.jp",
                "password" => "eyJpdiI6InJPOHdnb0tZNFIyUjh0UVljYmRWNnc9PSIsInZhbHVlIjoibjdocjdjOVJiYkZZSVJPV3R5OCtXZz09IiwibWFjIjoiYzAzNTEwN2FjYmVlNTFkOTk0MTc2OWZkNGI4NDEwZGI3MDY0NGMwNjQ2NGFhMjBiNjg5M2JhOTQwMGIzNGUyZSJ9",
                "role" => 0
            ]
         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ss_staffs');
    }
}
