@extends('adminlte::page')

@section('title', '食事量登録')

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
                        {{-- 朝食摂取量 --}}
                        <h4>朝食</h4>
                        <div class="form-group">
                            <label for="moring_main">主食</label>
                            <p><span class="m-current-val"></span>割</p>
                            <input type="range" min="0" max="10" step="1" value="0"
                                class="form-control m-range" name="morning_main">
                        </div>

                        <div class="form-group">
                            <label for="morning_side">おかず</label>
                            <p><span class="m-current-val-side"></span>割</p>
                            <input type="range" min="0" max="10" step="1" value="0"
                                class="form-control m-range-side" name="morning_side">
                        </div>

                        {{-- 昼食摂取量 --}}

                        <span class="my-3 d-block border-top border-1"></span>
                        <h4>昼食</h4>
                        <div class="form-group">
                            <label for="lunch_main">主食</label>
                            <p><span class="l-current-val"></span>割</p>
                            <input type="range" min="0" max="10" step="1" value="0"
                                class="form-control l-range" name="lunch_main">
                        </div>

                        <div class="form-group">
                            <label for="lunch_side">おかず</label>
                            <p><span class="l-current-val-side"></span>割</p>
                            <input type="range" min="0" max="10" step="1" value="0"
                                class="form-control l-range-side" name="lunch_side">
                        </div>
                        
                        {{-- 夕食摂取量 --}}

                        <span class="my-3 d-block border-top border-1"></span>
                        <h4>夕食</h4>
                        <div class="form-group">
                            <label for="dinner_main">主食</label>
                            <p><span class="d-current-val"></span>割</p>
                            <input type="range" min="0" max="10" step="1" value="0"
                                class="form-control d-range" name="dinner_main">
                        </div>

                        <div class="form-group">
                            <label for="dinner_side">おかず</label>
                            <p><span class="d-current-val-side"></span>割</p>
                            <input type="range" min="0" max="10" step="1" value="0"
                                class="form-control d-range-side" name="dinner_side">
                        </div>
                        

                        <div class="form-group">
                            <label for="date">日付</label>
                            <input type="date" class="form-control" name="date" value="{{ now()->format('Y-m-d')}}">
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
        //朝主食

        const morningRangeElem = document.getElementsByClassName('m-range')[0];
        const morningCurrentValElem = document.getElementsByClassName('m-current-val')[0];


        // 現在の値をspanに埋め込む関数
        const morningSetCurrentValue = (val) => {
            morningCurrentValElem.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const morningRangeOnChange = (e) => {
            morningSetCurrentValue(e.target.value);
        }


        //朝おかず

        const morningRangeElemSide = document.getElementsByClassName('m-range-side')[0];
        const morningCurrentValElemSide = document.getElementsByClassName('m-current-val-side')[0];


        // 現在の値をspanに埋め込む関数
        const morningSetCurrentValueSide = (val) => {
            morningCurrentValElemSide.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const morningRangeOnChangeSide = (e) => {
            morningSetCurrentValueSide(e.target.value);
        }

        //昼主食

        const lunchRangeElem = document.getElementsByClassName('l-range')[0];
        const lunchCurrentValElem = document.getElementsByClassName('l-current-val')[0];


        // 現在の値をspanに埋め込む関数
        const lunchSetCurrentValue = (val) => {
            lunchCurrentValElem.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const lunchRangeOnChange = (e) => {
            lunchSetCurrentValue(e.target.value);
        }


        //昼おかず

        const lunchRangeElemSide = document.getElementsByClassName('l-range-side')[0];
        const lunchCurrentValElemSide = document.getElementsByClassName('l-current-val-side')[0];


        // 現在の値をspanに埋め込む関数
        const lunchSetCurrentValueSide = (val) => {
            lunchCurrentValElemSide.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const lunchRangeOnChangeSide = (e) => {
            lunchSetCurrentValueSide(e.target.value);
        }

        //夕主食

        const dinnerRangeElem = document.getElementsByClassName('d-range')[0];
        const dinnerCurrentValElem = document.getElementsByClassName('d-current-val')[0];


        // 現在の値をspanに埋め込む関数
        const dinnerSetCurrentValue = (val) => {
            dinnerCurrentValElem.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const dinnerRangeOnChange = (e) => {
            dinnerSetCurrentValue(e.target.value);
        }


        //夕おかず

        const dinnerRangeElemSide = document.getElementsByClassName('d-range-side')[0];
        const dinnerCurrentValElemSide = document.getElementsByClassName('d-current-val-side')[0];


        // 現在の値をspanに埋め込む関数
        const dinnerSetCurrentValueSide = (val) => {
            dinnerCurrentValElemSide.innerText = val;
        }

        // inputイベント時に値をセットする関数
        const dinnerRangeOnChangeSide = (e) => {
            dinnerSetCurrentValueSide(e.target.value);
        }

        window.onload = () => {
            morningRangeElem.addEventListener('input', morningRangeOnChange); // スライダー変化時にイベントを発火
            morningSetCurrentValue(morningRangeElem.value); // ページ読み込み時に値をセット
            morningRangeElemSide.addEventListener('input', morningRangeOnChangeSide); // スライダー変化時にイベントを発火
            morningSetCurrentValueSide(morningRangeElemSide.value); // ページ読み込み時に値をセット
            
            lunchRangeElem.addEventListener('input', lunchRangeOnChange); // スライダー変化時にイベントを発火
            lunchSetCurrentValue(lunchRangeElem.value); // ページ読み込み時に値をセット
            lunchRangeElemSide.addEventListener('input', lunchRangeOnChangeSide); // スライダー変化時にイベントを発火
            lunchSetCurrentValueSide(lunchRangeElemSide.value); // ページ読み込み時に値をセット

            dinnerRangeElem.addEventListener('input', dinnerRangeOnChange); // スライダー変化時にイベントを発火
            dinnerSetCurrentValue(dinnerRangeElem.value); // ページ読み込み時に値をセット
            dinnerRangeElemSide.addEventListener('input', dinnerRangeOnChangeSide); // スライダー変化時にイベントを発火
            dinnerSetCurrentValueSide(dinnerRangeElemSide.value); // ページ読み込み時に値をセット

        }
    </script>
@stop
