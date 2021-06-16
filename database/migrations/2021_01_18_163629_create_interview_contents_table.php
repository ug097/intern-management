<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_contents', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->integer('user_id')->comment('学生ID');
            $table->text('self_score_detail')->nullable()->comment('今の自分の点数の深堀り内容');
            $table->text('improvement')->nullable()->comment('現状を変えるためにできること');
            $table->text('intern_aspiration')->nullable()->comment('インターンでやりたいこと');
            $table->text('goal')->nullable()->comment('目標設定、インターン中の目標');
            $table->text('free_description1')->nullable()->comment('自由記入欄１');
            $table->text('free_description2')->nullable()->comment('自由記入欄２');
            $table->text('free_description3')->nullable()->comment('自由記入欄３');
            $table->text('appeal_point')->nullable()->comment('面談者から見た学生のアピールポイント');

            $table->timestamps();
            $table->softDeletes();
        });
        
        \DB::statement("ALTER TABLE interview_contents COMMENT '面談内容';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_contents');
    }
}
