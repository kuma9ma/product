@extends('adminlte::page')

@section('title', '入居者一覧')

@section('content_header')
    <h1>{{$tenants->name}}</h1>
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
                                <a href="{{ url('vitals/add/'.$tenants->id)}}"class="btn btn-default">バイタル登録</a>
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
                                <th>SBP</th>
                                <th>DBP</th>
                                <th>SPO2</th>
                                <th>日時</th>
                                <th>職員名</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($vitals as $vital)
                                    <td>{{ $vital->id }}</td>
                                    <td>{{ $vital->kt }}</td>
                                    <td>{{ $vital->sbp }}</td>
                                    <td>{{ $vital->dbp }}</td>
                                    <td>{{ $vital->spo2 }}</td>
                                    <td>{{ $vital->created_at->format('y/m/d h:i') }}</td>
                                    <td>{{ $vital->user->name }}</td>
                                    <td>
                                        <form action="{{ url('vitals/delete') }}" method="post"
                                            onsubmit="return confirm('削除します。よろしいですか？')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $vital->id }}">
                                            <input type="submit" value="削除" class="btn btn-danger">
                                        </form>
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
