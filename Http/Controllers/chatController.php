<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;

class chatController extends Controller
{
    //

    public function chat()
    {
        $users = User::all();
        $chat = chat::all();
        return view('chat', compact('users', 'chat'));
    }

    public function message(Request $request)
    {
        $createChat = new chat();

        $createChat->user = $request->user;
        $createChat->message = $request->message;

        $createChat->save();
        return redirect()->route('chat');
    }

    public function messageEmail(Request $request)
    {
        $createChat = new chat();

        $createChat->user = $request->user;
        $createChat->message = $request->message;

        $createChat->save();

        $email = new MailController();
        $email->sendAllEmail($createChat->id);
        return redirect()->route('chat');
    }
}
