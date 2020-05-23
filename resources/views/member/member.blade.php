@extends('layouts.app')

@section('title', 'みんなの知識箱')

@section('sidebar_first_level_active', 'member')

@section('content')

<div class="row">
 
<div class="col-md-4">
    <div class="card"> 
        <div class="card-header">
        </div>
        <div class="card-body">
            <ul>
                @foreach($users as $row)
                    <li class="mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('member.detail', ['user_id' => $row->id]) }}">
                                    <i class="far fa-user"></i>：{{ displayUserName($row) }}
                                    <div class="mt-2">（
                                        <i class="nc-icon nc-single-copy-04"></i>：{{ $row->words->count() }}件、
                                        <i class="fa fa-pen"></i>：{{ userCommentCount($row) }}件、
                                        <i class="fa fa-heart"></i>：{{ userNiceCount($row) }}件
                                    ）</div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card ">
        <div class="card-header">
            <div class="form-inline row">
                    <div class="form-group col-md-12">
                        <span>最近登録された知識</span>
                        <a href="{{ route('word.search') }}" class="btn btn-outline-info ml-3">検索</a>
                    </div>
                </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        @foreach($words as $row)
                            <li class="mb-3">
                                <h6>{{ $row->title }}</h6>
                                <p>{{ formatDate($row->created_at) }}<i class="far fa-user"></i>：{{ displayUserName($row->user) }}</p>
                                <span>{{ excerpt($row->content) }}</span>
                                <div><a href="{{ route('word.detail', ['word_id' => $row->id]) }}" class="btn btn-outline-success">続きをみる</a></div>
                                
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer ">
        </div>
    </div>
</div>
@endsection