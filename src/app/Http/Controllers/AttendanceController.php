<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $attendance = $user->attendance()->paginate(21);

        return view('attendance.index', ['attendance' => $attendance]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'work_start_time' => 'required|date_format:H:i',
        ]);
        
        $user_id = Auth::id();
        $existingAttendance = Attendance::where('user_id', $user_id)->first();
        if ($existingAttendance && $existingAttendance->work_end_time) {
            return redirect()->route('attendance.index')->with('error', 'すでに退勤済みです');
        }
        
        Attendance::create([
            'user_id' => $user_id,
            'work_start_time' => $request->input('work_start_time'),
        ]);
        
        return redirect()->route('attendance.index')->with('success', '出勤打刻が成功しました');
    }

    public function update(Request $request)
    {
        $request->validate([
            'work_end_time' => 'required|date_format:H:i',
        ]);
        
        $user_id = Auth::id();
        
        Attendance::where('user_id', $user_id)->whereNull('work_end_time')->update([
            'work_end_time' => $request->input('work_end_time'),
        ]);

        return redirect()->route('attendance.index')->with('success', '退勤打刻が成功しました');
    }

    public function startBreak(Request $request)
    {
        $request->validate([
            'break_start_time' => 'required|date_format:H:i',
        ]);
        
        $user_id = Auth::id();
        $existingAttendance = Attendance::where('user_id', $user_id)->first();
        if (!$existingAttendance || !$existingAttendance->work_start_time) {
            return redirect()->route('attendance.index')->with('error', '先に出勤打刻をしてください');
        }
        
        if ($existingAttendance->break_start_time) {
            return redirect()->route('attendance.index')->with('error', 'すでに休憩開始済みです');
        }
        
        $existingAttendance->update([
            'break_start_time' => $request->input('break_start_time'),
        ]);

        return redirect()->route('attendance.index')->with('success', '休憩開始が成功しました');
    }

    public function endBreak(Request $request)
    {
        $request->validate([
            'break_end_time' => 'required|date_format:H:i',
        ]);
        
        $user_id = Auth::id();
        $existingAttendance = Attendance::where('user_id', $user_id)->first();
        if (!$existingAttendance || !$existingAttendance->work_start_time) {
            return redirect()->route('attendance.index')->with('error', '先に出勤打刻をしてください');
        }
        
        if (!$existingAttendance->break_start_time) {
            return redirect()->route('attendance.index')->with('error', '先に休憩開始をしてください');
        }
        
        if ($existingAttendance->break_end_time) {
            return redirect()->route('attendance.index')->with('error', 'すでに休憩終了済みです');
        }
        
        $existingAttendance->update([
            'break_end_time' => $request->input('break_end_time'),
        ]);

        return redirect()->route('attendance.index')->with('success', '休憩終了が成功しました');
    }
}
