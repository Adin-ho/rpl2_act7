<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'nik'=>'ADMIN001',
            'name'=>'Admin',
            'email'=>'admin@test.local',
            'role'=>'admin',
            'password'=>Hash::make('password')
        ]);

        User::factory(5)->create(['role'=>'employee'])->each(function($user){
            for($d=0;$d<3;$d++){
                Attendance::create([
                    'user_id'=>$user->id,
                    'date'=>now()->subDays($d)->toDateString(),
                    'status'=>'hadir'
                ]);
            }
        });
    }
}
