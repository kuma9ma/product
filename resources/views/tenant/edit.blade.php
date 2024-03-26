@extends('adminlte::page')

@section('title', '入居者編集')

@section('content_header')
    <h1>入居者編集</h1>
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
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$tenants->name }}">
                            <label for="name">年齢</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{$tenants->age }}" />
                            <label for="name">生年月日</label>
                            <input type="date" class="form-control" id="birth" name="birth" value="{{$tenants->birth }}" />
                            <label for="name">住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$tenants->address }}" />
                            <label for="name">電話番号</label>
                            <input type="tel" class="form-control" id="tel" name="tel" value="{{$tenants->tel }}" />
                        </div>
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
