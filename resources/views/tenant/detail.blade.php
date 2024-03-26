@extends('adminlte::page')

@section('title', '入居者個別ページ')

@section('content_header')
    <h1>{{ $tenants->name }}</h1>
@stop

@section('content')
    <div class="container border rounded p-3 mt-5">


        <dl>
            <dt>氏名</dt>
            <dd>{{ $tenants->name }}</dd>
            <dt>年齢</dt>
            <dd>{{ $tenants->age }}</dd>
            <dt>生年月日</dt>
            <dd>{{ $tenants->birth }}</dd>
            <dt>住所</dt>
            <dd>{{ $tenants->address }}</dd>
            <dt>電話番号</dt>
            <dd>{{ $tenants->tel }}</dd>
        </dl>
        <div class="mb-3">
            <a class="btn btn-default" href="{{ url('vitals/' . $tenants->id) }}">
                バイタル一覧
            </a>

            <a class="btn btn-default" href="{{ url('meals/' . $tenants->id) }}">
                食事量一覧
            </a>

            <a class="btn btn-default" href="{{ url('waters/' . $tenants->id) }}">
                水分量一覧
            </a>
        </div>
        <td>
            @if (Auth::user()->role_id === 1)
                <a class="edit btn btn-primary" href="{{ url('tenants/edit/' . $tenants->id) }}">入居者編集</a>
                <form class="delete d-inline" action="{{ url('tenants/delete') }}" method="post"
                    onsubmit="return confirm('退所処理を行います。よろしいですか？')">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tenants->id }}">
                    <input type="submit" value="退所" class="mx-1 btn btn-danger">
                </form>
            @endif
        </td>
    </div>

@stop

@section('css')
    <style>

    </style>
@stop

@section('js')
    <script></script>
@stop
