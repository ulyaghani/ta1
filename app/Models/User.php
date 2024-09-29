<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'google_id',
        'google_token',
        'google_refresh_token',
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'google_token',
        'google_refresh_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Cek apakah user memiliki role tertentu.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Cek apakah user adalah AdminChat.
     *
     * @return bool
     */
    public function isAdminChat(): bool
    {
        return $this->role === 'AdminChat';
    }

    /**
     * Cek apakah user adalah SuperAdmin.
     *
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === 'SuperAdmin';
    }

    /**
     * Cek apakah user adalah user biasa.
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }
}