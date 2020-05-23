<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InformationPost;
use App\Http\Controllers\BaseController;

class InformationController extends BaseController
{

    public function showAdd(){

        return view('information.add');

    }

    public function add(InformationPost $request){

        Information::create($request->all());
        session()->flash('complete_msg', 'お知らせの登録が完了しました。');

        return redirect()->route('home');

    }

    public function showEdit(Request $request){

        $information = Information::find($request->information_id);

        return view('information.edit')->with([
            'information' => $information
        ]);

    }

    public function edit(InformationPost $request){

        $information = Information::find($request->information_id);

        $information->fill($request->all())->save();

        session()->flash('complete_msg', 'お知らせの編集が完了しました。');

        return redirect()->route('home');

    }

    public function delete(Request $request){

        $information = Information::find($request->information_id);

        $information->delete();

        session()->flash('complete_msg', 'お知らせの削除が完了しました。');

        return redirect()->route('home');

    }

}
