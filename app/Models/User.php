<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nik','name','email','phone','position','status','role','password'
    ];

    protected $hidden = ['password','remember_token'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function isAdmin() { return $this->role === 'admin'; }
    public function isHR() { return $this->role === 'hr'; }
}
