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
                    @if (count($attentionVitals) > 0)
                        <h3 class="card-title">要観察者</h3>
                    @else
                        <h3 class="card-title">要観察者はいません。要観察者が存在すると、表示されます。</h3>
                    @endif
                </div>
                @if (count($attentionVitals) > 0)
                    <p id="accordion">バイタル異常者がいます。確認して下さい。</p>
                    <div class=" accordion card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>名前</th>
                                    <th>KT</th>
                                    <th>BP</th>
                                    <th>P</th>
                                    <th>SPO2</th>
                                    <th>日時</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attentionVitals as $attentionVital)
                                    <tr>
                                        <td>
                                            <a href="{{ url('vitals/' . $attentionVital->tenant->id) }}">
                                                {{ $attentionVital->tenant->name }}
                                            </a>
                                        </td>
                                        @if ($attentionVital->kt >= 37.5)
                                            <td class="text-red">{{ $attentionVital->kt }}</td>
                                        @else
                                            <td>{{ $attentionVital->kt }}</td>
                                        @endif
                                        @if ($attentionVital->sbp >= 135)
                                            <td class="text-red">{{ $attentionVital->sbp }} / {{ $attentionVital->dbp }}
                                            </td>
                                        @else
                                            <td>{{ $attentionVital->sbp }} / {{ $attentionVital->dbp }}</td>
                                        @endif
                                        @if ($attentionVital->p >= 100)
                                            <td class="text-red">{{ $attentionVital->p }}</td>
                                        @else
                                            <td>{{ $attentionVital->p }}</td>
                                        @endif
                                        @if ($attentionVital->spo2 <= 89)
                                            <td class="text-red">{{ $attentionVital->spo2 }}</td>
                                        @else
                                            <td>{{ $attentionVital->spo2 }}</td>
                                        @endif
                                        <td>{{ $attentionVital->created_at->format('m/d h:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @endif
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
                                <form action="{{ url('/tenants') }}" method="GET" class="form-inline">
                                    <input class="form-control" type="text" name="keyword">
                                    <button class="btn btn-default mx-3" type="submit">名前検索</button>
                                </form>
                                @if (Auth::user()->role_id === 1)
                                    <a href="{{ url('tenants/add') }}" class="btn btn-default btn-create">入居者登録</a>
                                @endif
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
                                <th class="set">
                                    <p class="vital-decription">バイタルを入力できます</p>
                                    <p class="meal-decription">食事量を入力できます</p>
                                    <p class="water-decription">水分量を入力できます</p>
                                </th>
                                <th class="set">
                                    <p class="edit-decription">入居者を編集できます</p>
                                    <p class="delete-decription">入居者の退所処理を行います</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->id }}</td>
                                    <td>
                                        {{ $tenant->name }}
                                        <a href="{{ url('vitals/' . $tenant->id) }}">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="vital btn btn-default" href="{{ url('vitals/' . $tenant->id) }}">
                                            バイタル
                                        </a>
                                        <a class="meal btn btn-default ms-1" href="{{ url('meals/' . $tenant->id) }}">
                                            食事
                                        </a>
                                        <a class="water btn btn-default ms-1" href="{{ url('waters/' . $tenant->id) }}">
                                            水分
                                        </a>
                                    </td>
                                    <td class="d-flex">
                                        @if (Auth::user()->role_id === 1)
                                            <a class="edit btn btn-primary"
                                                href="{{ url('tenants/edit/' . $tenant->id) }}">入居者編集</a>
                                            <form class="delete" action="{{ url('tenants/delete') }}" method="post"
                                                onsubmit="return confirm('退所処理を行います。よろしいですか？')">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $tenant->id }}">
                                                <input type="submit" value="退所" class="mx-1 btn btn-danger">
                                            </form>
                                        @endif
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
    <style>
        .set {
            position: relative;
        }

        .vital-decription {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border: #333 solid 1px;
            border-radius: 5px;
            padding: 3px;
            z-index: 10;
            opacity: 80%;
            display: none;
        }

        .meal-decription {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border: #333 solid 1px;
            border-radius: 5px;
            padding: 3px;
            z-index: 10;
            opacity: 80%;
            display: none;
        }

        .water-decription {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border: #333 solid 1px;
            border-radius: 5px;
            padding: 3px;
            z-index: 10;
            opacity: 80%;
            display: none;
        }

        .edit-decription {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border: #333 solid 1px;
            border-radius: 5px;
            padding: 3px;
            z-index: 10;
            opacity: 80%;
            display: none;
        }

        .delete-decription {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border: #333 solid 1px;
            border-radius: 5px;
            padding: 3px;
            z-index: 10;
            opacity: 80%;
            display: none;
        }

        .btn-create {
            font-size: unset !important;
            padding: 0.375rem 0.75rem !important;
        }

        .accordion {
            display: none;
        }

        .accordion.active {
            display: block;
        }

        #accordion {
            padding: 15px;
            color: #333;
            font-size: 14px;
            background: rgba(255, 0, 0, 0.5);
            position: relative;
            cursor: pointer;
            font-weight: bold;
        }

        #accordion::before {
            /* 閉じている時 */
            content: "＋";
            position: absolute;
            right: 20px;
        }

        #accordion.active::before {
            /* 開いている時 */
            content: "－";
        }
    </style>
@stop

@section('js')
    <script>
        $(function() {
            //Accordionの処理
            $('#accordion').click(() => {
                $('.accordion').toggleClass('active');
                $('#accordion').toggleClass('active');
            });
            //hover時の処理
            $('.vital').hover(() => {
                $('.vital-decription').toggle();
            })
            $('.meal').hover(() => {
                $('.meal-decription').toggle();
            })
            $('.water').hover(() => {
                $('.water-decription').toggle();
            })
            $('.edit').hover(() => {
                $('.edit-decription').toggle();
            })
            $('.delete').hover(() => {
                $('.delete-decription').toggle();
            })
        });
    </script>
@stop
