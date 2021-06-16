<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchingProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matching_progresses', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 256)->comment('マッチング段階名');
            $table->decimal('order', 2, 0)->nullable()->comment('序列'); 
            $table->timestamps();
        });
        
        \DB::statement("ALTER TABLE matching_progresses COMMENT 'マッチング段階マスタ';");
         
        \DB::table('matching_progresses')->insert([
             ["name" => "選考中", "order" => 0, ],
             ["name" => "成立", "order" => 1, ],
             ["name" => "不成立", "order" => 2, ],     
         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matching_progresses');
    }
}
