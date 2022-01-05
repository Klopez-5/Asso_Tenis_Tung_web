<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Club;
use App\Post;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
        $countUsers = User::count();
        $countClubs = Club::count();
        $countTourn = Tournament::count();
        $tournaments = Tournament::orderBy('id', 'DESC')->take(2)->get();
        $achievements = Achievement::orderBy('id', 'DESC')->take(5)->get();
        return view('admin.index',['countUsers'=>$countUsers, 'countClubs'=>$countClubs, 'countTourn'=>$countTourn, 'tournaments'=>$tournaments, 'achievements'=>$achievements]);
    }

}
