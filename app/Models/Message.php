<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'user_id',
        'adminchat_id',
        'message',
        'sender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    /**
     * Relasi ke model User (pengirim).
     * Pengirim bisa berupa user atau admin (AdminChat/SuperAdmin).
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke model User (penerima pesan admin).
     * Relasi ini digunakan jika pesan dikirim ke admin.
     */
    public function adminChat()
    {
        return $this->belongsTo(User::class, 'adminchat_id');
    }

    /**
     * Cek apakah pengirim pesan adalah user biasa.
     *
     * @return bool
     */
    public function isFromUser(): bool
    {
        return $this->sender->role === 'user';
    }

    /**
     * Cek apakah pengirim pesan adalah AdminChat.
     *
     * @return bool
     */
    public function isFromAdminChat(): bool
    {
        return $this->sender->role === 'AdminChat';
    }

    /**
     * Cek apakah pengirim pesan adalah SuperAdmin.
     *
     * @return bool
     */
    public function isFromSuperAdmin(): bool
    {
        return $this->sender->role === 'SuperAdmin';
    }
}
