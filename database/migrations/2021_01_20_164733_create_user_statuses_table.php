<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->integer('user_id')->comment('学生ID');
            $table->integer('ss_staff_id')->nullable()->comment('SS担当者ID');
            $table->decimal('webcab_flg', 1, 0)->nullable()->comment('WEBCAB受験状況フラグ');
            $table->decimal('interview_flg', 1, 0)->nullable()->comment('面談状況フラグ'); 
            $table->dateTime('last_interviewed_at')->nullable()->comment('最後の面談日');
            $table->decimal('introduce_flg', 1, 0)->nullable()->comment('インターン先紹介有無'); 
            $table->integer('matching_progress_id')->nullable()->comment('マッチング段階ID');
            $table->decimal('intern_status', 1, 0)->nullable()->comment('インターン進捗');
            $table->integer('company_id')->nullable()->comment('インターン先企業ID');

            $table->timestamps();
            $table->softDeletes();
        });
        
        \DB::statement("ALTER TABLE user_statuses COMMENT '学生の進捗状況';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_statuses');
    }
}
