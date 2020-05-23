<?php

use Carbon\Carbon;

if (!function_exists('formatDate')){

    function formatDate($date){
        
        $dt = new Carbon($date);
        $week = array('日', '月', '火', '水', '木', '金', '土');

        return $dt->format('Y-m-d') . '（' . $week[$dt->dayOfWeek] . '）';

    }

}

if (!function_exists('displayNewIcon')){

    function displayNewIcon($openDate){
        
        $dt = new Carbon($openDate);
        $displayDate = $dt->addDay(3);

        return Carbon::today()->lte($displayDate) ? 'NEW' : '';

    }

}

if (!function_exists('displayUserName')){

    function displayUserName($user){

        return $user->last_name . ' ' . $user->first_name;

    }

}

if (!function_exists('excerpt')){

    function excerpt($content) {

        $result = $content;

        if (mb_strlen($result) > 100) {

            $result = mb_substr($result, 0, 100) . '...';

        }
        
        return $result;
    }

}

if (!function_exists('userCommentCount')){

    function userCommentCount($user) {

        $words = $user->words;
        
        $cnt = 0;

        foreach($words as $row){

            $cnt += $row->comments->count();

        }

        return $cnt;
    }

}

if (!function_exists('userNiceCount')){

    function userNiceCount($user) {

        $words = $user->words;
        
        $cnt = 0;

        foreach($words as $row){

            $cnt += $row->nices->count();

        }

        return $cnt;
    }

}