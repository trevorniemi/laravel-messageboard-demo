<?php

namespace App\Http\Controllers;

use App\MessageBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\MessageBoardController;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('message_boards')->orderBy('id', 'desc')->paginate(5);
        return view('home', compact('messages'));
    }
}
