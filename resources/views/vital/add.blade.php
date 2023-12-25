@extends('adminlte::page')

@section('title', 'バイタル登録')

@section('content_header')
    <h1>バイタル登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kt">KT(体温)</label>
                            <input type="text" class="form-control" id="kt" name="kt" placeholder="36.5">
                        </div>
                        <div class="form-group">
                            <label for="sbp">SBP(収縮期血圧)</label>
                            <input type="text" class="form-control" id="sbp" name="sbp" placeholder="125">
                        </div>
                        <div class="form-group">
                            <label for="dbp">DBP(拡張期血圧)</label>
                            <input type="text" class="form-control" id="dbp" name="dbp" placeholder="75">
                        </div>
                        <div class="form-group">
                            <label for="p">P(脈拍)</label>
                            <input type="text" class="form-control" id="p" name="p" placeholder="65">
                        </div>
                        <div class="form-group">
                            <label for="spo2">SPO2(血中酸素濃度)</label>
                            <input type="text" class="form-control" id="spo2" name="spo2" placeholder="99">
                        </div>
                        <div class="form-group">
                            <label for="date">日付</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="time">時間</label>
                            <input type="time" class="form-control" id="time" name="time" placeholder="">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
