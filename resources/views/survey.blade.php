@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">调查问卷</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="post" action="{{ route('answer.create') }}">
                        <div class="list-group">
                            @foreach ($questions as $question)
                                @if ($loop->first)
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <h5>1.您的身份是？</h5>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="0" name="q0">
                                            <label class="form-check-label">教职工</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" name="q0">
                                            <label class="form-check-label">学生</label>
                                        </div>
                                    </a>
                                @endif
                                <a href="#" class="list-group-item list-group-item-action">
                                    <h5>
                                        {{ $question->seq }}.{{ $question->content }}
                                        @if ($question->type == 1)
                                            （可多选）
                                        @endif
                                    </h5>
                                    <ol>
                                        @if ($question->type == 1)
                                            @foreach ($question->options as $option)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="{{ $option->id }}" name="q{{ $question->id }}">
                                                    <li>
                                                        <label class="form-check-label">{{ $option->content }}</label>
                                                    </li>
                                                </div>
                                            @endforeach
                                        @elseif ($question->type == 0)
                                            @if (is_null($question->options))
                                                <div class="form-group">
                                                    <textarea name="q{{ $question->id }}" id="q{{ $question->id }}" rows="10" class="form-control"></textarea>
                                                </div>
                                            @else
                                                @foreach ($question->options as $option)
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="{{ $option->id }}" name="q{{ $question->id }}">
                                                        <li>
                                                            <label class="form-check-label">{{ $option->content }}</label>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </ol>
                                </a>
                            @endforeach
                        </div>
                        
                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
