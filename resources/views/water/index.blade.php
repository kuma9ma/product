@extends('adminlte::page')

@section('title', '水分摂取量一覧')

@section('content_header')
    <h1>{{ $tenants->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">水分摂取量一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('waters/add/' . $tenants->id) }}"class="btn btn-default">水分量登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>水分種類</th>
                                <th>水分量</th>
                                <th>日付</th>
                                <th>時間</th>
                                <th>職員名</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($waters as $water)
                                    <td>{{ $water->id }}</td>
                                    <td>{{ $water->name }}</td>
                                    <td>{{ $water->water }}cc</td>
                                    <td>{{ $water->date }} </td>
                                    <td>{{ $water->time }} </td>
                                    <td>{{ $water->user->name }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary" href="{{ url('waters/edit/' . $water->id)}}">編集</a>
                                        <a class="btn btn-danger ml-1" href="javascript:void(0);"
                                        onclick=" var ok=confirm('削除します。よろしいですか？');
                                        if (ok) location.href='/waters/delete/{{ $water->id }}'; return false; ">
                                        削除
                                    </a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
