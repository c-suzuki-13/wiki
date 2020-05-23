@extends('layouts.app')

@section('title', '知識登録')

@section('sidebar_first_level_active', 'mypage')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title"></h5>
            </div>
            <div class="card-body ">
                <form action="{{ route('word.add') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><span class="text-danger">*</span>タイトル</label>
                                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="タイトル..." name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><span class="text-danger">*</span>説明</label>
                                <textarea class="form-control textarea{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="説明..." name="content" rows="4">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer ">
            </div>
        </div>
    </div>
</div>

@endsection