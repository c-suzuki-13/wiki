@extends('layouts.app')

@section('title', '知識検索')

@section('sidebar_first_level_active', 'member')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
            </div>
            <div class="card-body ">
                <form action="{{ route('word.search') }}" method="get">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>検索する知識</label>
                                <input type="text" class="form-control" placeholder="キーワード..." name="keyword" value="{{ app('request')->input('keyword') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer ">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach($words as $row)
                                <li class="mb-3">
                                    <h5>{{ $row->title }}</h5>
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
</div>
@endsection