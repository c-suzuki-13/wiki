<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    public function showMember(){

        $users = User::all();
        $words = Word::RecentlyWords()->get();

        return view('member.member')->with([
            'users' => $users,
            'words' => $words
        ]);

    }

    public function detail(Request $request){

        $user = User::find($request->user_id);
        $words = Word::UserId($request->user_id)->get();

        return view('member.detail')->with([
            'user' => $user,
            'words' => $words
        ]);

    }

}
