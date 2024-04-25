<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Record;

class AttendanceController extends Controller
{
        // ログインページ表示
    public function create()
    {
        return view('attendances');
    }
}