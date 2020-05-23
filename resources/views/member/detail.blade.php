@extends('layouts.app')

@section('title', 'My知識箱')

@if($user->id == $loginUser->id)
    @section('sidebar_first_level_active', 'mypage')
@else
    @section('sidebar_first_level_active', 'member')
@endif

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                @if (session('complete_msg'))
                    <div class="alert alert-success  alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{ session('complete_msg') }}
                    </div>
                @endif
            </div>
            <div class="card-body ">
                <div class="form-inline row mb-3">
                    <div class="form-group col-md-12">
                        <span><i class="far fa-user"></i>：{{ displayUserName($user) }}
                        （
                                <i class="nc-icon nc-single-copy-04"></i>：{{ $user->words->count() }}件、
                                <i class="fa fa-pen"></i>：{{ userCommentCount($user) }}件、
                                <i class="fa fa-heart"></i>：{{ userNiceCount($user) }}件
                        ）</span>
                        @if($user->id == $loginUser->id)
                            <a href="{{ route('word.show.add') }}" class="btn btn-outline-info ml-3">追加</a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if($words->isEmpty())知識が登録されていません。@endif
                        @foreach($words as $row)
                            <a href="{{ route('word.detail', ['word_id' => $row->id]) }}" class="mr-2">
                                {{ $row->title }}（<span class="ml-1 mr-1"><i class="fa fa-pen"></i>：{{ $row->comments->count() }}件、<i class="fa fa-heart"></i>：{{ $row->nices->count() }}件</span>）
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer ">
            </div>
        </div>
    </div>
</div>

@endsection