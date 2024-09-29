<?php

namespace App\Http\Controllers\Livechat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function userChatroom()
    {
        // Fetch messages for the current logged-in user
        $messages = Message::where('user_id', Auth::id())
                           ->orWhere('adminchat_id', Auth::id())
                           ->get();

        return view('chatroom', [
            'messages' => $messages,
            'title' => 'Chat Room',
        ]);
    }

    public function adminChatroom()
    {
        // Fetch all messages for AdminChat to see all user interactions
        $messages = Message::all();

        return view('adminchat.chatroom', [
            'messages' => $messages,
            'title' => 'Admin Chat Room',
        ]);
    }
}
