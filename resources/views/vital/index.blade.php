@extends('adminlte::page')

@section('title', '入居者一覧')

@section('content_header')
    <h1>{{ $tenants->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">バイタル一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('vitals/add/' . $tenants->id) }}"class="btn btn-default">バイタル登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>KT</th>
                                <th>BP</th>
                                <th>P</th>
                                <th>SPO2</th>
                                <th>日付</th>
                                <th>時間</th>
                                <th>職員名</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($vitals as $vital)
                                    <td>{{ $vital->id }}</td>
                                    <td>{{ $vital->kt }}</td>
                                    <td>{{ $vital->sbp }} / {{ $vital->dbp }}</td>
                                    <td>{{ $vital->p }}</td>
                                    <td>{{ $vital->spo2 }}</td>
                                    <td>{{ $vital->date}}</td>
                                    <td>{{ $vital->time}}</td>
                                    <td>{{ $vital->user->name }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary" href="{{ url('vitals/edit/' . $vital->id) }}">編集</a>
                                        <a class="btn btn-danger ml-1" href="javascript:void(0);"
                                            onclick=" var ok=confirm('削除します。よろしいですか？');
                                            if (ok) location.href='/vitals/delete/{{ $vital->id }}'; return false; ">
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
