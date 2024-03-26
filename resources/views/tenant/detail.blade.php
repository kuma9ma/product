@extends('adminlte::page')

@section('title', '入居者個別ページ')

@section('content_header')
    <h1>{{ $tenants->name }}</h1>
@stop

@section('content')
    <div class="container border  p-3 mt-5">


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
        <div>
            <a href="{{ url('vitals/' . $tenants->id) }}">
                バイタル一覧
            </a>

            <a href="{{ url('meals/' . $tenants->id) }}">
                食事量一覧
            </a>

            <a href="{{ url('waters/' . $tenants->id) }}">
                水分量一覧
            </a>
        </div>

    </div>

@stop

@section('css')
    <style>

    </style>
@stop

@section('js')
    <script></script>
@stop
