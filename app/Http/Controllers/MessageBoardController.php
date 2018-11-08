<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MessageBoard;

class MessageBoardController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new message
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createMessage(Request $request)
    {
        MessageBoard::create($request->all());
        return redirect('/home');
    }

}
