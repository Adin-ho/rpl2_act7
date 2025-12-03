<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = User::count();
        $today = now()->toDateString();
        $todayPresent = Attendance::whereDate('date',$today)->where('status','hadir')->count();
        $todayAbsent = Attendance::whereDate('date',$today)->whereIn('status',['izin','sakit','alpha'])->count();
        $recentAttendances = Attendance::with('user')->latest()->limit(6)->get();

        return view('dashboard.index', compact('totalEmployees','todayPresent','todayAbsent','recentAttendances'));
    }
}
