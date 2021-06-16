<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('experienced_company')->nullable()->comment('過去にインターン参加した企業')->after('participation_experience');
            $table->integer('grad_admission_year')->nullable()->comment('大学院入学年度')->after('research_content');
            $table->integer('grad_graduation_year')->nullable()->comment('大学院卒業年度')->after('grad_admission_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('experienced_company');
            $table->dropColumn('grad_admission_year');
            $table->dropColumn('grad_graduation_year');
        });
    }
}
