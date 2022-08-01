<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Testpol;

class TestpolController extends Controller
{
    public function adminview(){
        // $user = Auth::user();

        // $this->authorize('viewAny',Client::class);
        $this->authorize('viewAdmin',Testpol::class);
        return view('admin.index');

    }
    public function clientview(){
        // $user = Auth::user();
        error_log("moet in clienview komen");
        // $this->authorize('viewAny',Client::class);
        $this->authorize('viewClient',Testpol::class);
        return view('client.index');

    }
    public function mentorview(){
        // $user = Auth::user();

        // $this->authorize('viewAny',Client::class);
        $this->authorize('viewMentor',Testpol::class);
        return view('mentor.index');

    }
}
