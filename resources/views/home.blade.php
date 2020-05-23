@extends('layouts.app')

@section('title', 'お知らせ')

@section('sidebar_first_level_active', 'information')

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
                <div class="update ml-auto mr-auto">
                    <a href="{{ route('information.show.add') }}" class="btn btn-outline-info">追加</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    @if($informations->isEmpty())お知らせが登録されていません。@endif
                    <ul>
                        @foreach($informations as $row)
                            <li>
                                <h6><span class="badge badge-danger mr-1">{{ displayNewIcon($row->open_date) }}</span>{{ $row->title }}</h6>
                                <span class="form-inline">
                                    <span class="form-group">
                                        <span>{{ formatDate($row->open_date) }}</span>
                                        <a href="{{ route('information.show.edit', ['information_id' => $row->id]) }}" class="btn btn-outline-info ml-3">編集</a>
                                        <form action="{{ route('information.delete', ['information_id' => $row->id]) }}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-outline-warning ml-3 delete-btn" value="削除">
                                        </form>
                                    </span>
                                </span>
                                <p>{!! nl2br(e($row->content)) !!}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer ">
            </div>
        </div>
    </div>
</div>

@endsection