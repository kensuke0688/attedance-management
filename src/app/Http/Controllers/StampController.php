<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class StampController extends Controller
{
    public function stamp()
    {
        return view('stamp');
    }

    public function store(Request $request)
    {
        $action = $request->input('action');
        $user_id = auth()->id();
        $data = [
            'user_id' => $user_id,
            'workday' => now()->toDateString(),
        ];

        // アクションに応じて適切なデータを追加
        switch ($action) {
            case 'work_start':
                $data['work_start_time'] = now();
                break;
            case 'work_end':
                $data['work_end_time'] = now();
                break;
            case 'break_start':
                $data['break_start_time'] = now();
                break;
            case 'break_end':
                $data['break_end_time'] = now();
                break;
            default:
                // 不明なアクションの場合の処理を追加
                break;
        }

        // データを保存
        Attendance::create($data);

        return redirect()->route('attendance.index');
    }
}
