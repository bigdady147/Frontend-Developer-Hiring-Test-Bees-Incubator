<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //

    }
    protected $admin;
    protected $data;
    protected $redirectTo = '/';

    public function getQuestion1(){
        return View('question-1');
    }
    public function getQuestion2(){
        return View('question-2');
    }

}
