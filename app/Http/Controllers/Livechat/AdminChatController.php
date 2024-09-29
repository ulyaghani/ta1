<?php

namespace App\Http\Controllers\Livechat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChatController extends Controller
{

    public function index()
    {
        // Ambil semua pesan terkait dengan user yang sedang login
        $messages = Message::where('user_id', Auth::id())
                           ->orWhere('adminchat_id', Auth::id())
                           ->get();

        $data = [
                "messages" => $messages,
                "title" => "Chat Room",
                ];
                
        return view('dashboard.livechat-adminchat', $data);
    }

    public function show($userId)
    {
        $user = User::findOrFail($userId);

        // Ambil semua pesan antara admin dan user
        $messages = Message::where('user_id', $userId)
                        ->orWhere('adminchat_id', Auth::id())
                        ->orderBy('created_at', 'asc')
                        ->get();

                        //dd($messages);
        // Mengambil semua pengguna
        $users = User::where('role', 'user')->get();

        return view('dashboard.livechat-adminchat', [
            'messages' => $messages,
            'users' => $users,
            'user' => $user,
            'title' => 'Chat Room'
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        // Simpan pesan ke database
        Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'sender' => 'user',
        ]);

        return redirect()->route('dashboard.livechat-adminchat')->with('success', 'Pesan terkirim!');
    }



}
