@extends('adminlte::page')

@section('title', '水分量編集')

@section('content_header')
    <h1>{{ $tenants->name }}</h1>
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
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="card-body">
                        {{-- 水分摂取量 --}}
                        <div class="form-group">
                            <label for="name">水分名</label>
                            <input type="text" class="form-control" name="name" value="{{ $waters->name }}">
                        </div>
                        <div class="form-group">
                            <label for="water">水分量</label>
                            <p><span class="current-val"></span>cc</p>
                            <input type="range" min="0" max="300" step="10" value="{{ $waters->water }}"
                                class="form-control range" name="water">
                        </div>


                        <div class="form-group">
                            <label for="date">日付</label>
                            <input type="date" class="form-control" name="date" value="{{ $waters->date }}">
                        </div>
                        <div class="form-group">
                            <label for="time">時間</label>
                            <input type="time" class="form-control" name="time" value="{{ $waters->time }}">
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">編集</button>
                            <a class="btn btn-danger ml-1" href="javascript:void(0);"
                                onclick=" var ok=confirm('削除します。よろしいですか？');
                                if (ok) location.href='/waters/delete/{{ $waters->id }}'; return false; ">
                                削除
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            width: 50%;

        }

        .card-body {
            width: 100%;
        }
    </style>
@stop

@section('js')
    <script>
        //水分量スライダー

        const rangeElem = document.getElementsByClassName('range')[0];
        const currentValElem = document.getElementsByClassName('current-val')[0];


        // 現在の値をspanに埋め込む関数
        const setCurrentValue = (val) => {
            currentValElem.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const rangeOnChange = (e) => {
            setCurrentValue(e.target.value);
        }


        window.onload = () => {
            rangeElem.addEventListener('input', rangeOnChange); // スライダー変化時にイベントを発火
            setCurrentValue(rangeElem.value); // ページ読み込み時に値をセット
            rangeElemSide.addEventListener('input', rangeOnChangeSide); // スライダー変化時にイベントを発火
            setCurrentValueSide(rangeElemSide.value); // ページ読み込み時に値をセット


        }
    </script>
@stop
