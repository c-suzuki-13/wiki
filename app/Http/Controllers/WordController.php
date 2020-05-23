<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\WordPost;
use App\Http\Requests\CommentPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\WordSearchPost;
use App\Http\Controllers\BaseController;

class WordController extends BaseController
{

    public function showAdd(){

        return view('word.add');

    }

    public function add(WordPost $request){

        $data = $request->all();
        $data['user_id'] = $this->user->id;

        Word::create($data);
        session()->flash('complete_msg', '知識の登録が完了しました。');

        return redirect()->route('member.detail', ['user_id' => $this->user->id]);

    }

    public function showEdit(Request $request){

        $word = Word::find($request->word_id);

        return view('word.edit')->with([
            'word' => $word
        ]);

    }

    public function edit(WordPost $request){

        $word = Word::find($request->word_id);

        if($word->user_id != $this->user->id){

            session()->flash('error_msg', '知識の編集ができませんでした。');
            return back()->withInput();

        }

        $word->fill($request->all())->save();

        session()->flash('complete_msg', '知識の編集が完了しました。');

        return redirect()->route('word.detail', ['word_id' => $word->id]);

    }

    public function detail(Request $request){
        
        $word = Word::find($request->word_id);

        return view('word.detail')->with([
            'word' => $word
        ]);

    }

    public function addComment(CommentPost $request){

        $data = [
            'word_id' => $request->word_id,
            'user_id' => $this->user->id,
            'comment' => $request->comment
        ];
 
        Comment::create($data);

        session()->flash('complete_msg', 'コメントの登録が完了しました。');

        return redirect()->back();

    }

    public function search(WordSearchPost $request){

        $words = empty($request->all()) ? Word::all() : Word::WordSearch($request->keyword)->get();

        return view('word.search')->with([
            'words' => $words
        ]);

    }

    public function delete(Request $request){

        $word = Word::find($request->word_id);

        $comments = $word->comments;
        $nices = $word->nices;

        $relationDatas = [$comments, $nices];

        $word->delete();

        // 関連するコメントといいねも削除
        foreach($relationDatas as $relationData){
            foreach($relationData as $row){
                $row->delete();
            }
        }

        session()->flash('complete_msg', '知識の削除が完了しました。');

        return redirect()->route('member.detail', ['user_id' => $this->user->id]);

    }

}
