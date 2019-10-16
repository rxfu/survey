@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">“关于档案馆档案服务利用的问卷调查”数据统计</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">#</th>
                                <th scope="col" rowspan="2">题目</th>
                                <th scope="col" rowspan="2">选项</th>
                                <th scope="col" colspan="2">教职工</th>
                                <th scope="col" colspan="2">学生</th>
                            </tr>
                            <tr>
                                <th scope="col">合计</th>
                                <th scope="col">百分比</th>
                                <th scope="col">合计</th>
                                <th scope="col">百分比</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $item['qid'] }}</th>
                                    <td>{{ $item['qtitle'] }}</td>
                                    <td>{{ $item['otitle'] }}</td>
                                    <td>{{ $item['ttotal'] }}</td>
                                    <td>{{ number_format($item['tpercent'] * 100) }}%</td>
                                    <td>{{ $item['stotal'] }}</td>
                                    <td>{{ number_format($item['spercent'] * 100) }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
