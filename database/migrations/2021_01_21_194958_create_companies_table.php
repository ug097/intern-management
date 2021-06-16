<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 256)->comment('企業名');
            $table->string('address', 512)->comment('住所');
            $table->string('capital', 256)->nullable()->comment('資本金');
            $table->integer('established_year')->comment('創業年度');
            $table->integer('employee_number')->comment('従業員数');
            $table->string('ceo_name', 256)->comment('代表取締役');
            
            $table->timestamps();
            $table->softDeletes();
        });
        
        \DB::statement("ALTER TABLE companies COMMENT '企業情報マスタ';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
