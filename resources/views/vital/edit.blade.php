@extends('adminlte::page')

@section('title', 'バイタル編集')

@section('content_header')
    <h1>バイタル編集</h1>
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
                            <input type="text" class="form-control" id="kt" name="kt" value="{{$vitals->kt}}">
                        </div>
                        <div class="form-group">
                            <label for="sbp">SBP(収縮期血圧)</label>
                            <input type="text" class="form-control" id="sbp" name="sbp" value="{{$vitals->sbp}}">
                        </div>
                        <div class="form-group">
                            <label for="dbp">DBP(拡張期血圧)</label>
                            <input type="text" class="form-control" id="dbp" name="dbp" value="{{$vitals->dbp}}">
                        </div>
                        <div class="form-group">
                            <label for="p">P(脈拍)</label>
                            <input type="text" class="form-control" id="p" name="p" value="{{$vitals->p}}">
                        </div>
                        <div class="form-group">
                            <label for="spo2">SPO2(血中酸素濃度)</label>
                            <input type="text" class="form-control" id="spo2" name="spo2" value="{{$vitals->spo2}}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
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
