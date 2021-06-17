<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 256)->comment('大学名');
            $table->decimal('order', 3, 0)->nullable()->comment('序列');
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement("ALTER TABLE universities COMMENT '大学マスタ';");

        \DB::table('universities')->insert([
            ["id" => 0, "name" => "愛知教育大学", "order" => 0, ],
            ["id" => 1, "name" => "豊橋技術科学大学", "order" => 1, ],
            ["id" => 2, "name" => "名古屋工業大学", "order" => 2, ],
            ["id" => 3, "name" => "名古屋大学", "order" => 3, ],
            ["id" => 4, "name" => "愛知県立芸術大学", "order" => 4, ],
            ["id" => 5, "name" => "愛知県立大学", "order" => 5, ],
            ["id" => 6, "name" => "名古屋市立大学", "order" => 6, ],
            ["id" => 7, "name" => "愛知医科大学", "order" => 7, ],
            ["id" => 8, "name" => "愛知学院大学", "order" => 8, ],
            ["id" => 9, "name" => "愛知学泉大学", "order" => 9, ],
            ["id" => 10, "name" => "愛知工科大学", "order" => 10, ],
            ["id" => 11, "name" => "愛知工業大学", "order" => 11, ],
            ["id" => 12, "name" => "愛知産業大学", "order" => 12, ],
            ["id" => 13, "name" => "愛知淑徳大学", "order" => 13, ],
            ["id" => 14, "name" => "愛知大学", "order" => 14, ],
            ["id" => 15, "name" => "愛知東邦大学", "order" => 15, ],
            ["id" => 16, "name" => "愛知文教大学", "order" => 16, ],
            ["id" => 17, "name" => "愛知みずほ大学", "order" => 17, ],
            ["id" => 18, "name" => "一宮研伸大学", "order" => 18, ],
            ["id" => 19, "name" => "桜花学園大学", "order" => 19, ],
            ["id" => 20, "name" => "岡崎女子大学", "order" => 20, ],
            ["id" => 21, "name" => "金城学院大学", "order" => 21, ],
            ["id" => 22, "name" => "至学館大学", "order" => 22, ],
            ["id" => 23, "name" => "修文大学", "order" => 23, ],
            ["id" => 24, "name" => "椙山女学園大学", "order" => 24, ],
            ["id" => 25, "name" => "星城大学", "order" => 25, ],
            ["id" => 26, "name" => "大同大学", "order" => 26, ],
            ["id" => 27, "name" => "中京大学", "order" => 27, ],
            ["id" => 28, "name" => "中部大学", "order" => 28, ],
            ["id" => 29, "name" => "東海学園大学", "order" => 29, ],
            ["id" => 30, "name" => "同朋大学", "order" => 30, ],
            ["id" => 31, "name" => "豊田工業大学", "order" => 31, ],
            ["id" => 32, "name" => "豊橋創造大学", "order" => 32, ],
            ["id" => 33, "name" => "名古屋音楽大学", "order" => 33, ],
            ["id" => 34, "name" => "名古屋外国語大学", "order" => 34, ],
            ["id" => 35, "name" => "名古屋学院大学", "order" => 35, ],
            ["id" => 36, "name" => "名古屋学芸大学", "order" => 36, ],
            ["id" => 37, "name" => "名古屋経済大学", "order" => 37, ],
            ["id" => 38, "name" => "名古屋芸術大学", "order" => 38, ],
            ["id" => 39, "name" => "名古屋国際工科専門職大学", "order" => 39, ],
            ["id" => 40, "name" => "名古屋産業大学", "order" => 40, ],
            ["id" => 41, "name" => "名古屋商科大学", "order" => 41, ],
            ["id" => 42, "name" => "名古屋女子大学", "order" => 42, ],
            ["id" => 43, "name" => "名古屋造形大学", "order" => 43, ],
            ["id" => 44, "name" => "名古屋文理大学", "order" => 44, ],
            ["id" => 45, "name" => "名古屋柳城女子大学", "order" => 45, ],
            ["id" => 46, "name" => "南山大学", "order" => 46, ],
            ["id" => 47, "name" => "日本赤十字豊田看護大学", "order" => 47, ],
            ["id" => 48, "name" => "日本福祉大学", "order" => 48, ],
            ["id" => 49, "name" => "人間環境大学", "order" => 49, ],
            ["id" => 50, "name" => "藤田医科大学", "order" => 50, ],
            ["id" => 51, "name" => "名城大学", "order" => 51, ],
            ["id" => 52, "name" => "愛知医療学院短期大学", "order" => 52, ],
            ["id" => 53, "name" => "愛知学院大学短期大学部", "order" => 53, ],
            ["id" => 54, "name" => "愛知学泉短期大学", "order" => 54, ],
            ["id" => 55, "name" => "愛知工科大学自動車短期大学", "order" => 55, ],
            ["id" => 56, "name" => "愛知江南短期大学", "order" => 56, ],
            ["id" => 57, "name" => "愛知大学短期大学部", "order" => 57, ],
            ["id" => 58, "name" => "愛知文教女子短期大学", "order" => 58, ],
            ["id" => 59, "name" => "愛知みずほ短期大学", "order" => 59, ],
            ["id" => 60, "name" => "岡崎女子短期大学", "order" => 60, ],
            ["id" => 61, "name" => "至学館大学短期大学部", "order" => 61, ],
            ["id" => 62, "name" => "修文大学短期大学部", "order" => 62, ],
            ["id" => 63, "name" => "豊橋創造大学短期大学部", "order" => 63, ],
            ["id" => 64, "name" => "名古屋経営短期大学", "order" => 64, ],
            ["id" => 65, "name" => "名古屋女子大学短期大学部", "order" => 65, ],
            ["id" => 66, "name" => "名古屋短期大学", "order" => 66, ],
            ["id" => 67, "name" => "名古屋文化短期大学", "order" => 67, ],
            ["id" => 68, "name" => "名古屋文理大学短期大学部", "order" => 68, ],
            ["id" => 69, "name" => "名古屋柳城短期大学", "order" => 69, ],
            ["id" => 70, "name" => "岐阜大学", "order" => 70, ],
            ["id" => 71, "name" => "岐阜県立看護大学", "order" => 71, ],
            ["id" => 72, "name" => "岐阜薬科大学", "order" => 72, ],
            ["id" => 73, "name" => "朝日大学", "order" => 73, ],
            ["id" => 74, "name" => "岐阜医療科学大学", "order" => 74, ],
            ["id" => 75, "name" => "岐阜協立大学", "order" => 75, ],
            ["id" => 76, "name" => "岐阜聖徳学園大学", "order" => 76, ],
            ["id" => 77, "name" => "岐阜女子大学", "order" => 77, ],
            ["id" => 78, "name" => "岐阜保健大学", "order" => 78, ],
            ["id" => 79, "name" => "中京学院大学", "order" => 79, ],
            ["id" => 80, "name" => "中部学院大学", "order" => 80, ],
            ["id" => 81, "name" => "東海学院大学", "order" => 81, ],
            ["id" => 82, "name" => "岐阜市立女子短期大学", "order" => 82, ],
            ["id" => 83, "name" => "大垣女子短期大学", "order" => 83, ],
            ["id" => 84, "name" => "岐阜聖徳学園大学短期大学部", "order" => 84, ],
            ["id" => 85, "name" => "岐阜保健大学短期大学部", "order" => 85, ],
            ["id" => 86, "name" => "正眼短期大学", "order" => 86, ],
            ["id" => 87, "name" => "高山自動車短期大学", "order" => 87, ],
            ["id" => 88, "name" => "中京学院大学短期大学部", "order" => 88, ],
            ["id" => 89, "name" => "中部学院大学短期大学部", "order" => 89, ],
            ["id" => 90, "name" => "東海学院大学短期大学部", "order" => 90, ],
            ["id" => 91, "name" => "中日本自動車短期大学", "order" => 91, ],
            ["id" => 92, "name" => "平成医療短期大学", "order" => 92, ],
            ["id" => 93, "name" => "三重大学", "order" => 93, ],
            ["id" => 94, "name" => "三重県立看護大学", "order" => 94, ],
            ["id" => 95, "name" => "皇學館大学", "order" => 95, ],
            ["id" => 96, "name" => "鈴鹿医療科学大学", "order" => 96, ],
            ["id" => 97, "name" => "鈴鹿大学", "order" => 97, ],
            ["id" => 98, "name" => "四日市看護医療大学", "order" => 98, ],
            ["id" => 99, "name" => "四日市大学", "order" => 99, ],
            ["id" => 100, "name" => "三重短期大学", "order" => 100, ],
            ["id" => 101, "name" => "鈴鹿大学短期大学部", "order" => 101, ],
            ["id" => 102, "name" => "高田短期大学", "order" => 102, ],
            ["id" => 103, "name" => "ユマニテク短期大学", "order" => 103, ],
            ["id" => 999, "name" => "その他", "order" => 999, ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universities');
    }
}
