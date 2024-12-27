<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Panel;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'nisn', 'email', 'password', 'photo', 'gender', 'date_of_birth', 'gen'];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function alumni()
    {
        return $this->hasOne(Alumni::class, 'nisn', 'nisn');
    }

    public function kinerjaSemester()
    {
        return $this->hasOne(KinerjaSemester::class, 'nisn', 'nisn');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
