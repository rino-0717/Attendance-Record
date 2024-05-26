<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // usersテーブルのidを外部キーとして設定
            $table->string('type');
            $table->dateTime('work_start_time')->nullable();  // 勤務開始時間
            $table->dateTime('work_end_time')->nullable(); // 勤務終了時間
            $table->dateTime('break_start_time')->nullable(); // 休憩開始時間
            $table->dateTime('break_end_time')->nullable(); // 休憩終了時間
            $table->timestamps();
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
