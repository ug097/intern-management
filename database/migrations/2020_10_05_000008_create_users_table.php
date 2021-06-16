<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('first_name', 256)->comment('名');
            $table->string('family_name', 256)->comment('姓');
            $table->string('first_name_kana', 256)->comment('メイ');
            $table->string('family_name_kana', 256)->comment('セイ');
            $table->decimal('gender', 1, 0)->comment('性別'); 
            $table->date('birthday')->comment('生年月日');
            $table->decimal('zip', 7, 0)->nullable()->comment('郵便番号');
            $table->string('address', 512)->nullable()->comment('住所');
            $table->string('mail', 128)->comment('メールアドレス')->unique();
            $table->string('tel', 32)->comment('電話番号');
            $table->integer('university_id')->comment('大学ID');
            $table->string('university_name', 256)->nullable()->comment('大学名（その他選択時）');
            $table->integer('undergraduate_id')->comment('学部ID');
            $table->string('undergraduate_name', 256)->nullable()->comment('学部名（その他選択時）');
            $table->integer('admission_year')->comment('入学年度');
            $table->integer('graduation_year')->comment('卒業年度');
            $table->integer('grad_school_id')->nullable()->comment('大学院ID');
            $table->string('grad_school_name', 256)->nullable()->comment('大学院名（その他選択時）');
            $table->string('seminar_etc', 256)->nullable()->comment('研究室・ゼミ・専攻');
            $table->string('research_content', 512)->nullable()->comment('研究内容');
            $table->integer('occupation_lg_id')->comment('職種大分類ID');
            $table->text('skill')->nullable()->comment('資格・スキル等');
            $table->text('club_etc')->nullable()->comment('部活・サークル・団体等');
            $table->string('opportunity_to_know', 512)->comment('N-aikuを知ったきっかけ');
            $table->text('improve_ability')->comment('インターンで成長させたい力');
            $table->decimal('participation_experience', 1, 0)->comment('インターン参加経験');
            $table->integer('self_score')->comment('今の自分の点数');
            $table->text('score_reason')->comment('点数の理由');
            $table->text('necessary')->comment('理想に近づくために必要だと思うこと');



            $table->timestamps();
            $table->softDeletes();
        });
        
        \DB::statement("ALTER TABLE users COMMENT '学生情報マスタ';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
