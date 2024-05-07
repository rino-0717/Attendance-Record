<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function calculateWorkHours()
    {
        $start = $this->work_start_time;
        $end = $this->work_end_time;

        // 終了時刻が開始時刻よりも前（日を跨いでいる）場合、終了時刻に24時間を加算して翌日とみなす
        if ($end->lessThan($start)) {
        $end->addDay();
        }

        // 作業時間を計算（開始時刻と終了時刻の差）
        $workHours = $start->diffInHours($end);

        return $workHours;
    }
}