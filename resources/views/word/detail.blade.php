@extends('layouts.app')

@section('title', '知識詳細')

@section('sidebar_first_level_active', 'mypage')

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
                <div class="row">
                    <div class="col-md-12">
                        <h6>{{ $word->title }}</h6>
                    </div>
                </div>
                <div class="form-inline row mb-3">
                    <div class="form-group col-md-12">
                        <span>{{ formatDate($word->created_at) }}<i class="far fa-user"></i>：{{ displayUserName($word->user) }}</span>
                        <a href="{{ route('member.detail', ['user_id' => 1]) }}" class="btn btn-outline-success ml-3">他の知識を見る</a>
                        @if($word->user_id == $loginUser->id)
                            <a href="{{ route('word.show.edit', ['word_id' => $word->id]) }}" class="btn btn-outline-info ml-3">編集</a>
                            <form action="{{ route('word.delete', ['information_id' => $word->id]) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-outline-warning ml-3 delete-btn" value="削除">
                            </form>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <sapn>{!! nl2br(e($word->content)) !!}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <span class="btn btn-outline-primary" id="comment-add-btn"><i class="fa fa-pen mr-2"></i>コメント</span>
                        @if($word->user_id != $loginUser->id)
                            <span class="btn btn-outline-danger float-right" id="nice-btn" data-wid="{{ $word->id }}" data-uid="{{ $loginUser->id }}"><i class="fa fa-heart mr-2"></i>いいね</span>
                        @endif
                    </div>
                </div>
                <form action="{{ route('word.add.comment', ['word_id' => $word->id]) }}" method="post" id="comment-area">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control textarea{{ $errors->has('comment') ? ' is-invalid' : '' }}" placeholder="コメント..." name="comment" rows="4" id="comment">{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </div>
                </form>
                @foreach($word->comments as $row)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div><span>{{ formatDate($row->created_at) }}<i class="far fa-user"></i>：{{ displayUserName($row->user) }}</span></div>
                            <div>{!! nl2br(e($row->comment)) !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection