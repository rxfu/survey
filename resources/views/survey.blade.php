@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3 class="card-title text-center">关于档案馆档案服务利用的问卷调查</h3>

                    <blockquote>
                        <p>您好！感谢您在百忙当中参与这项调查工作。为了更好的做好档案管理工作，提升业务水平，希望能听取您的宝贵意见，请您如实填写。此问卷匿名，我们会对您的回答完全保密。祝您工作顺利，谢谢！</p>
                    </blockquote>

                    <form method="post" action="{{ route('answer.create') }}">
                        <p class="card-text">
                            <div class="list-group">
                                @foreach ($questions as $question)
                                    @if ($loop->first)
                                        <div class="list-group-item list-group-item-action">
                                            <h5>1. 您的身份？</h5>
                                            <ol style="list-style-type: upper-alpha">
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="0" name="q0" id="q01">
                                                        <label class="custom-control-label" for="q01">教职工</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="1" name="q0" id="q02">
                                                        <label class="custom-control-label" for="q02">学生</label>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                    @endif
                                    <div class="list-group-item list-group-item-action">
                                        <h5>
                                            {{ $question->seq }}. {{ $question->content }}
                                            @if ($question->type == 1)
                                                （可多选）
                                            @endif
                                        </h5>
                                        @if ($question->type == 1)
                                            <ol style="list-style-type: upper-alpha">
                                                @foreach ($question->options as $option)
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="{{ $option->id }}" name="q{{ $question->id }}" id="q{{ $question->id }}{{ $option->id }}">
                                                            <label class="custom-control-label" for="q{{ $question->id }}{{ $option->id }}">{{ $option->content }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @elseif ($question->type == 0)
                                            @if ($question->options->count())
                                                <ol style="list-style-type: upper-alpha">
                                                    @foreach ($question->options as $option)
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" value="{{ $option->id }}" name="q{{ $question->id }}" id="q{{ $question->id }}{{ $option->id }}">
                                                                <label class="custom-control-label" for="q{{ $question->id }}{{ $option->id }}">{{ $option->content }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @else
                                                <div class="form-group">
                                                    <textarea name="q{{ $question->id }}" id="q{{ $question->id }}" rows="10" class="form-control"></textarea>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </p>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
