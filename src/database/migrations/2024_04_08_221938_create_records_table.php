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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // usersテーブルのidを外部キーとして設定
            $table->string('work_start_time'); // 勤務開始時間
            $table->string('work_end_time'); // 勤務終了時間
            $table->string('break_start_time'); // 休憩開始時間
            $table->string('break_end_time'); // 休憩終了時間
            $table->timestamp('time'); // 記録された時間
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
