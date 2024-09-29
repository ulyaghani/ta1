<?php

namespace App\Http\Controllers\Livechat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
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
                
        return view('home', $data);
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

        return redirect()->route('livechat.index')->with('success', 'Pesan terkirim!');
    }
}


