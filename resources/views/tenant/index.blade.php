@extends('adminlte::page')

@section('title', '入居者一覧')

@section('content_header')
    <h1>入居者一覧</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">要注意入居者</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('tenants/add') }}" class="btn btn-default">入居者登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>名前</th>
                            <th>KT</th>
                            <th>SBP</th>
                            <th>DBP</th>
                            <th>SPO2</th>
                            <th>日時</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attentionVitals as $attentionVital)
                            <tr>
                                <td>
                                <a href="{{ url('vitals/'. $attentionVital->tenant->id) }}">
                                    {{ $attentionVital->tenant->name }}
                                </a>
                                </td>
                                <td>{{ $attentionVital->kt }}</td>
                                <td>{{ $attentionVital->sbp }}</td>
                                <td>{{ $attentionVital->dbp }}</td>
                                <td>{{ $attentionVital->spo2 }}</td>
                                <td>{{ $attentionVital->created_at }}</td>
                                <td>
                                    <form action="{{url('tenants/delete')}}" method="post"
                                    onsubmit="return confirm('削除します。よろしいですか？')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $attentionVital->id}}">
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">入居者一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('tenants/add') }}" class="btn btn-default">入居者登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->id }}</td>
                                    <td>
                                    <a href="{{ url('vitals/'. $tenant->id) }}">
                                        {{ $tenant->name }}
                                    </a>
                                    </td>
                                    <td>
                                        <form action="{{url('tenants/delete')}}" method="post"
                                        onsubmit="return confirm('削除します。よろしいですか？')">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $tenant->id}}">
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
