<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use App\Models\anuncio;
use App\Models\descripcion;
use App\Models\User_actividad;
use App\Models\anuncio_User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class workController extends Controller
{
    //Vista de anuncios

    public function ads () {
        $ads = anuncio::orderBy('id', 'desc')->get();
        return view("dashboard", compact('ads'));
    }

    public function groupFolder () {
        return view('groupFolder');
    }

    public function actividades() {
        $acts = actividad::orderBy('id', 'desc')->get();
        return view("actividades", compact('acts'));
    }

    public function generatead (Request $request) {
        $ad = new anuncio();
        $ad->title = $request->title;
        $ad->body = $request->body;
        $ad->link = $request->link;

        $ad->save();

        $has_usuario = new anuncio_User();
        $has_usuario->user_id = 1;
        $has_usuario->anuncio_id = $ad->id;
        $has_usuario->save();

        $email = new MailController();
        $email->sendAdEmail($ad->id);
        return redirect()->route("dashboard");
    }

    public function generateWork (Request $request) {
        $act = new actividad();
        // $descripcion = new descripcion();
        // $descripcion->desc = $request->de;
        // $descripcion->save();


        $act->title = $request->title;
        $act->date = $request->fecha;
        $act->desc = $request->de;
        $act->user = $request->user;

        $act->save();

        // $userActivity = new User_actividad();
        // $userActivity->user_id = $request->user;
        // $userActivity->actividad_id = $act->id;
        // $userActivity->save();

        return redirect()->route("calendar");
    }

    public function calendar () {
        $act = actividad::all();
        return view('calendar', compact('act'));
    }
}
