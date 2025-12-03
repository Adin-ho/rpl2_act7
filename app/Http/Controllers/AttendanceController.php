<?php
namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\User;
use App\Http\Requests\StoreAttendanceRequest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(Request $request)
    {
        $q = Attendance::with('user')->latest();
        if ($request->filled('user_id')) $q->where('user_id',$request->user_id);
        if ($request->filled('month')) {
            [$year,$month] = explode('-',$request->month);
            $q->whereYear('date',$year)->whereMonth('date',$month);
        }
        $attendances = $q->paginate(15);
        $users = User::orderBy('name')->get();
        return view('attendance.index', compact('attendances','users'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('attendance.create', compact('users'));
    }

    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->validated();
        $exists = Attendance::where('user_id',$data['user_id'])->whereDate('date',$data['date'])->exists();
        if ($exists) return back()->withErrors(['date'=>'Kehadiran untuk tanggal ini sudah ada.'])->withInput();
        Attendance::create($data);
        return redirect()->route('attendance.index')->with('success','Kehadiran dicatat.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success','Data kehadiran dihapus.');
    }
}
