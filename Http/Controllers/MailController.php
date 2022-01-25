<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\allEmail;
use App\Models\anuncio;
use App\Models\chat;
use App\Models\user;

use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class MailController extends Controller
{
    //
    public function sendAdEmail($id)
    {

        $ads = anuncio::all();


        $details = [
            "title" => "Nuevo anuncio - Grupo 1 - 2338404 SENA",
            "body" => "",
            "id" => $id
        ];

        $users = user::all();

        foreach ($users as $key => $value) {
            Mail::to($value->email)->send(new TestMail($details));
        }
        return view("emails.anuncios", compact("ads"));
    }

    public function sendAllEmail($id)
    {
        $chat = chat::all();


        $details = [
            "title" => "Grupo 1 - 2338404 SENA",
            "body" => "",
            "id" => $id
        ];

        $users = user::all();

        foreach ($users as $key => $value) {
            Mail::to($value->email)->send(new allEmail($details));
        }
        return view("emails.all", compact("chat"));
    }

    public function email()
    {
        return view("email");
    }
}
