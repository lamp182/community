<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function  getPersonal()
    {
        return view('home.personal.add');
    }

    public function postDopersonal(Request $request)
    {
    		dd($request->all());
    }
}
