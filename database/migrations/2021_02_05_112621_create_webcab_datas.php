<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebcabDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webcab_datas', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('user_id')->comment('学生ID');
            $table->string('pdf_url', 512)->nullable()->comment('PDFのURL');

            $table->timestamps();
            $table->softDeletes();
        });
        
        \DB::statement("ALTER TABLE webcab_datas COMMENT 'webcabデータ';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webcab_datas');
    }
}
