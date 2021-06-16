<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grad_schools', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 256)->comment('大学院名');
            $table->decimal('order', 2, 0)->nullable()->comment('序列');
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement("ALTER TABLE grad_schools COMMENT '大学院マスタ';");

        \DB::table('grad_schools')->insert([
            ["id" => 0, "name" => "大同大学大学院", "order" => 0, ],
            ["id" => 1, "name" => "星城大学大学院", "order" => 1, ],
            ["id" => 2, "name" => "愛知産業大学大学院", "order" => 2, ],
            ["id" => 3, "name" => "愛知工業大学大学院", "order" => 3, ],
            ["id" => 4, "name" => "至学館大学大学院", "order" => 4, ],
            ["id" => 5, "name" => "愛知医科大学大学院", "order" => 5, ],
            ["id" => 6, "name" => "愛知学院大学大学院", "order" => 6, ],
            ["id" => 7, "name" => "愛知教育大学大学院", "order" => 7, ],
            ["id" => 8, "name" => "愛知県立芸術大学大学院", "order" => 8, ],
            ["id" => 9, "name" => "愛知県立大学大学院", "order" => 9, ],
            ["id" => 10, "name" => "愛知工科大学大学院", "order" => 10, ],
            ["id" => 11, "name" => "愛知淑徳大学大学院", "order" => 11, ],
            ["id" => 12, "name" => "愛知大学大学院", "order" => 12, ],
            ["id" => 13, "name" => "愛知文教大学大学院", "order" => 13, ],
            ["id" => 14, "name" => "愛知みずほ大学大学院", "order" => 14, ],
            ["id" => 15, "name" => "桜花学園大学大学院", "order" => 15, ],
            ["id" => 16, "name" => "金城学院大学大学院", "order" => 16, ],
            ["id" => 17, "name" => "椙山女学園大学大学院", "order" => 17, ],
            ["id" => 18, "name" => "中京大学大学院", "order" => 18, ],
            ["id" => 19, "name" => "中部大学大学院", "order" => 19, ],
            ["id" => 20, "name" => "豊橋創造大学大学院", "order" => 20, ],
            ["id" => 21, "name" => "東海学園大学大学院", "order" => 21, ],
            ["id" => 22, "name" => "豊田工業大学大学院", "order" => 22, ],
            ["id" => 23, "name" => "豊橋技術科学大学大学院", "order" => 23, ],
            ["id" => 24, "name" => "同朋大学大学院", "order" => 24, ],
            ["id" => 25, "name" => "名古屋女子大学大学院", "order" => 25, ],
            ["id" => 26, "name" => "名古屋音楽大学大学院", "order" => 26, ],
            ["id" => 27, "name" => "名古屋外国語大学大学院", "order" => 27, ],
            ["id" => 28, "name" => "名古屋学院大学大学院", "order" => 28, ],
            ["id" => 29, "name" => "名古屋学芸大学大学院", "order" => 29, ],
            ["id" => 30, "name" => "名古屋経済大学大学院", "order" => 30, ],
            ["id" => 31, "name" => "名古屋芸術大学大学院", "order" => 31, ],
            ["id" => 32, "name" => "名古屋工業大学院", "order" => 32, ],
            ["id" => 33, "name" => "名古屋産業大学大学院", "order" => 33, ],
            ["id" => 34, "name" => "名古屋商科大学大学院", "order" => 34, ],
            ["id" => 35, "name" => "名古屋市立大学大学院", "order" => 35, ],
            ["id" => 36, "name" => "名古屋造形大学大学院", "order" => 36, ],
            ["id" => 37, "name" => "名古屋大学大学院", "order" => 37, ],
            ["id" => 38, "name" => "南山大学大学院", "order" => 38, ],
            ["id" => 39, "name" => "日本福祉大学大学院", "order" => 39, ],
            ["id" => 40, "name" => "日本赤十字豊田看護大学大学院", "order" => 40, ],
            ["id" => 41, "name" => "人間環境大学大学院", "order" => 41, ],
            ["id" => 42, "name" => "藤田保健衛生大学大学院", "order" => 42, ],
            ["id" => 43, "name" => "名城大学大学院", "order" => 43, ],
            ["id" => 44, "name" => "朝日大学大学院", "order" => 44, ],
            ["id" => 45, "name" => "岐阜医療科学大学大学院", "order" => 45, ],
            ["id" => 46, "name" => "岐阜経済大学大学院", "order" => 46, ],
            ["id" => 47, "name" => "岐阜県立看護大学大学院", "order" => 47, ],
            ["id" => 48, "name" => "岐阜聖徳学園大学大学院", "order" => 48, ],
            ["id" => 49, "name" => "岐阜女子大学大学院", "order" => 49, ],
            ["id" => 50, "name" => "岐阜大学大学院", "order" => 50, ],
            ["id" => 51, "name" => "岐阜薬科大学大学院", "order" => 51, ],
            ["id" => 52, "name" => "情報科学芸術大学院大学", "order" => 52, ],
            ["id" => 53, "name" => "中部学院大学大学院", "order" => 53, ],
            ["id" => 54, "name" => "東海学院大学大学院", "order" => 54, ],
            ["id" => 55, "name" => "皇學館大学大学院", "order" => 55, ],
            ["id" => 56, "name" => "四日市看護医療大学大学院", "order" => 56, ],
            ["id" => 57, "name" => "鈴鹿大学大学院", "order" => 57, ],
            ["id" => 58, "name" => "鈴鹿医療科学大学大学院", "order" => 58, ],
            ["id" => 59, "name" => "三重県立看護大学大学院", "order" => 59, ],
            ["id" => 60, "name" => "三重大学大学院", "order" => 60, ],
            ["id" => 61, "name" => "静岡県立大学大学院", "order" => 61, ],
            ["id" => 62, "name" => "静岡大学大学院", "order" => 62, ],
            ["id" => 63, "name" => "静岡文化芸術大学大学院", "order" => 63, ],
            ["id" => 64, "name" => "静岡理工科大学大学院", "order" => 64, ],
            ["id" => 65, "name" => "聖隷クリストファー大学大学院", "order" => 65, ],
            ["id" => 66, "name" => "常葉大学大学院", "order" => 66, ],
            ["id" => 67, "name" => "浜松医科大学大学院", "order" => 67, ],
            ["id" => 68, "name" => "光産業創成大学大学院", "order" => 68, ],
        ]);
        \DB::table('grad_schools')->insert([
            ["id" => 999, "name" => "その他", "order" => 99, ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grad_schools');
    }
}
