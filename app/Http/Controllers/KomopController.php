<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use App\Komop;
use Illuminate\Support\Facades\Auth;

class KomopController extends Controller
{
    public function index(){
        // $user = Auth::user();

        // $this->authorize('viewAny',Client::class);
        $this->authorize('viewAny',Komop::class);
        return view('client.index');

    }
}
