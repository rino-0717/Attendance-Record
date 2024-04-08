<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id(); // idカラム（主キー）
            $table->foreignId('users_id')->constrained()->onDelete('cascade'); // usersテーブルのidを外部キーとして設定
            $table->date('work_date')->nullable(false); // NOT NULL
            $table->dateTime('work_start_time')->nullable(false); // NOT NULL
            $table->dateTime('work_end_time')->nullable(false); // NOT NULL
            $table->dateTime('break_start_time')->nullable(false); // NOT NULL
            $table->dateTime('break_end_time')->nullable(false); // NOT NULL
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
