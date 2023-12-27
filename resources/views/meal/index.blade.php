@extends('adminlte::page')

@section('title', '食事量一覧')

@section('content_header')
    <h1>{{ $tenants->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">食事量一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('meals/add/' . $tenants->id) }}"class="btn btn-default">食事量登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="text-center table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th> </th>
                                <th colspan="2">朝</th>
                                <th colspan="2">昼</th>
                                <th colspan="2">夕</th>
                                <th>職員名</th>
                                <th> </th>
                            </tr>
                            <tr>
                                <th> </th>
                                <td class="font-weight-bold">主</td>
                                <td class="font-weight-bold">副</td>
                                <td class="font-weight-bold">主</td>
                                <td class="font-weight-bold">副</td>
                                <td class="font-weight-bold">主</td>
                                <td class="font-weight-bold">副</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meals as $meal)
                                <tr>
                                    <td class="font-weight-bold">
                                        {{ $meal->date }}
                                    </td>
                                    <td>{{ $meal->morning_main }}</td>
                                    <td>{{ $meal->morning_side }}</td>
                                    <td>{{ $meal->lunch_main }}</td>
                                    <td>{{ $meal->lunch_side }}</td>
                                    <td>{{ $meal->dinner_main }}</td>
                                    <td>{{ $meal->dinner_side }}</td>
                                    <td>{{ $meal->user->name }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary mr-1" href="{{ url('meals/edit/' . $meal->id) }}">編集</a>
                                        <form action="{{ url('meals/delete') }}" method="post"
                                            onsubmit="return confirm('削除します。よろしいですか？')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $meal->id }}">
                                            <input type="submit" value="削除" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                <tr class=" border-bottom border-1">

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
