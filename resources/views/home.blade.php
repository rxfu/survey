@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">数据统计</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">题目</th>
                                <th scope="col">选项</th>
                                <th scope="col">教职工</th>
                                <th scope="col">学生</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)
                                <th scope="row">{{ $answer->question->id }}</th>
                                <td>{{ $answer->question->content }}</td>
                                <td>{{ $answer->option->content }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
