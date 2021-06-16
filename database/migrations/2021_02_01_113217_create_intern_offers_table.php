<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intern_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id')->comment('企業ID');
            $table->integer('ss_staff_id')->nullable()->comment('SS担当者ID');
            $table->decimal('is_public', 1, 0)->nullable()->comment('募集中/募集停止');
            $table->string('memo', 512)->nullable()->comment('メモ');

            $table->string('pic_name', 256)->comment('インターン担当者 氏名');
            $table->string('pic_mail', 128)->comment('インターン担当者 メールアドレス');
            $table->string('pic_tel', 32)->comment('インターン担当者 電話番号');
            $table->string('pic_dept', 32)->comment('インターン担当者 所属部署');
            $table->string('pic_position', 32)->nullable()->comment('インターン担当者 役職');

            $table->string('title', 256)->comment('インターンタイトル');
            $table->text('desciption')->comment('インターン概要');
            $table->string('required_human_resource', 256)->comment('求める人物像');
            $table->string('required_human_skill', 256)->comment('求めるスキル');
            $table->text('acquirable_ability')->comment('インターンを通して得ることができる力');
            $table->string('required_work_hours', 256)->nullable()->comment('求める稼働日数・時間');
            $table->string('salary', 256)->nullable()->comment('給与');
            $table->text('appeal_point')->nullable()->comment('SS担当者から見た企業のポイント');

            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement("ALTER TABLE intern_offers COMMENT 'インターン求人';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intern_offers');
    }
}
