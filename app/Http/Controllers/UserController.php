<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index(Request $request)
    {
        $q = User::query();
        if ($request->filled('search')) {
            $s = $request->search;
            $q->where(fn($sub) => $sub->where('name','like',"%$s%")->orWhere('email','like',"%$s%")->orWhere('nik','like',"%$s%"));
        }
        $users = $q->orderBy('created_at','desc')->paginate($request->get('per_page',10));
        return view('users.index', compact('users'));
    }

    public function create() { return view('users.create'); }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('success','User berhasil ditambahkan.');
    }

    public function edit(User $user) { return view('users.edit', compact('user')); }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (!empty($data['password'])) $data['password'] = Hash::make($data['password']);
        else unset($data['password']);
        $user->update($data);
        return redirect()->route('users.index')->with('success','User diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User dihapus.');
    }
}
