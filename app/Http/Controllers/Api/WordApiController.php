<?php

namespace App\Http\Controllers\Api;

use App\Models\Nice;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class WordApiController extends BaseController
{

    public function toggleNice(Request $request){

        $deleteFlg = false;
        $nice = Nice::UserIdAndWordId($request->user_id, $request->word_id)->get();

        if($nice->isEmpty()){

            // 空の場合は登録
            $data = [
                'user_id' => $request->user_id,
                'word_id' => $request->word_id
            ];

            Nice::create($data);

        }else{

            // 存在する場合は削除
            $nice->first()->delete();
            $deleteFlg = true;

        }

        return ['deleteFlg' => $deleteFlg];

    }

}
