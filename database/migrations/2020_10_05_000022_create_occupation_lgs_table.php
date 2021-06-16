<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationLgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupation_lgs', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 256)->comment('職種名');
            $table->decimal('order', 3, 0)->nullable()->comment('序列');
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement("ALTER TABLE occupation_lgs COMMENT '職種大分類マスタ';");

        \DB::table('occupation_lgs')->insert([
            ["id" => 1, "name" => "営業", "order" => 1, ],
            ["id" => 2, "name" => "経理", "order" => 2, ],
            ["id" => 3, "name" => "企画・管理", "order" => 3, ],
            ["id" => 4, "name" => "広告・PR・マーケティング職", "order" => 4, ],
            ["id" => 5, "name" => "事務", "order" => 5, ],
            ["id" => 6, "name" => "販売・サービス", "order" => 6, ],
            ["id" => 7, "name" => "専門職（コンサルタント・監査法人等）", "order" => 7, ],
            ["id" => 8, "name" => "金融系専門職", "order" => 8, ],
            ["id" => 9, "name" => "医療系専門職", "order" => 9, ],
            ["id" => 10, "name" => "公務員・教員・農林水産関連", "order" => 10, ],
            ["id" => 11, "name" => "技術・開発・研究職", "order" => 11, ],
            ["id" => 12, "name" => "エンジニア", "order" => 12, ],
            ["id" => 13, "name" => "クリエイター・クリエイティブ職", "order" => 13, ],
        ]);
        \DB::table('occupation_lgs')->insert([
            ["id" => 99, "name" => "その他", "order" => 99, ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occupation_lgs');
    }
}
