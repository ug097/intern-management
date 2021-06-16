<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInterviewContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interview_contents', function (Blueprint $table) {
            $table->dropColumn(['self_score_detail', 'goal']);
            $table->text('current_self')->nullable()->comment('現在の自分はどんな自分か')->after('user_id');
            $table->text('five_years_later')->nullable()->comment('5年後、自分はどうありたいか')->after('current_self');
            $table->text('after_intern')->nullable()->comment('インターン後どうなっていたいか')->after('improvement');
            $table->text('strengths_affect')->nullable()->comment('自分自身の強みがどのようにインターン先に影響すると思うか')->after('intern_aspiration');
            $table->text('intern_condition')->nullable()->comment('インターン先の条件または希望')->after('strengths_affect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interview_contents', function (Blueprint $table) {
            $table->dropColumn(['current_self', 'five_years_later', 'after_intern', 'strengths_affect', 'intern_condition']);
            $table->text('self_score_detail')->nullable()->comment('今の自分の点数の深堀り内容')->after('user_id');
            $table->text('goal')->nullable()->comment('目標設定、インターン中の目標')->after('intern_aspiration');

        });
    }
}
