<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndergraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undergraduates', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 256)->comment('学部名');
            $table->decimal('order', 2, 0)->nullable()->comment('序列');
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement("ALTER TABLE undergraduates COMMENT '学部マスタ';");

        \DB::table('undergraduates')->insert([
            ["id" => 0, "name" => "文学部", "order" => 0, ],
            ["id" => 1, "name" => "教育学部", "order" => 1, ],
            ["id" => 2, "name" => "社会学部", "order" => 2, ],
            ["id" => 3, "name" => "人間科学部", "order" => 3, ],
            ["id" => 4, "name" => "心理学部", "order" => 4, ],
            ["id" => 5, "name" => "外国語学部", "order" => 5, ],
            ["id" => 6, "name" => "国際学部", "order" => 6, ],
            ["id" => 7, "name" => "法学部", "order" => 7, ],
            ["id" => 8, "name" => "経済学部", "order" => 8, ],
            ["id" => 9, "name" => "経営学部", "order" => 9, ],
            ["id" => 10, "name" => "商学部", "order" => 10, ],
            ["id" => 11, "name" => "理学部", "order" => 11, ],
            ["id" => 12, "name" => "工学部", "order" => 12, ],
            ["id" => 13, "name" => "情報学部", "order" => 13, ],
            ["id" => 14, "name" => "医学部", "order" => 14, ],
            ["id" => 15, "name" => "薬学部", "order" => 15, ],
            ["id" => 16, "name" => "歯学部", "order" => 16, ],
            ["id" => 17, "name" => "看護学部", "order" => 17, ],
            ["id" => 18, "name" => "保健学部", "order" => 18, ],
            ["id" => 19, "name" => "福祉学部", "order" => 19, ],
            ["id" => 20, "name" => "獣医学部", "order" => 20, ],
            ["id" => 21, "name" => "生物学部", "order" => 21, ],
            ["id" => 22, "name" => "農学部", "order" => 22, ],
            ["id" => 23, "name" => "栄養学部", "order" => 23, ],
            ["id" => 24, "name" => "家政学部", "order" => 24, ],
            ["id" => 25, "name" => "美術学部", "order" => 25, ],
            ["id" => 26, "name" => "体育学部", "order" => 26, ],
            ["id" => 27, "name" => "音楽学部", "order" => 27, ],
            ["id" => 28, "name" => "観光学部", "order" => 28, ],
        ]);
        \DB::table('undergraduates')->insert([
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
        Schema::dropIfExists('undergraduates');
    }
}
