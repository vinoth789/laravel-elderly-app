@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.ViewQuestionHeader') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('login') }}">
                        @csrf @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif @foreach($questions as $question)
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-2">
                                        {{$question->questionNumber}}. {{$question->question}}
                                    </div>
                                </div>
                                @if ($question->questionType == 'MultipleChoice')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <ul class="list-group">
                                            @if ($question->answer == $question->choice1)
                                            <li class="list-group-item list-group-item-success">1. {{$question->choice1}}</li>
                                            @else
                                            <li class="list-group-item">1. {{$question->choice1}}</li>
                                            @endif @if ($question->answer == $question->choice2)
                                            <li class="list-group-item list-group-item-success">2. {{$question->choice2}}</li>

                                            @else
                                            <li class="list-group-item">2. {{$question->choice2}}</li>
                                            @endif @if ($question->answer == $question->choice3)
                                            <li class="list-group-item list-group-item-success">3. {{$question->choice3}}</li>

                                            @else
                                            <li class="list-group-item">3. {{$question->choice3}}</li>
                                            @endif @if ($question->answer == $question->choice4)
                                            <li class="list-group-item list-group-item-success">4. {{$question->choice4}}</li>

                                            @else
                                            <li class="list-group-item">4. {{$question->choice4}}</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'MultipleAnswer')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <ul class="list-group">
                                            @if (strpos($question->answer , $question->choice1) !== false)
                                            <li class="list-group-item list-group-item-success">1. {{$question->choice1}}</li>
                                            @else
                                            <li class="list-group-item">1. {{$question->choice1}}</li>
                                            @endif @if (strpos($question->answer , $question->choice2) !== false)
                                            <li class="list-group-item list-group-item-success">2. {{$question->choice2}}</li>

                                            @else
                                            <li class="list-group-item">2. {{$question->choice2}}</li>
                                            @endif @if (strpos($question->answer , $question->choice3) !== false)
                                            <li class="list-group-item list-group-item-success">3. {{$question->choice3}}</li>

                                            @else
                                            <li class="list-group-item">3. {{$question->choice3}}</li>
                                            @endif @if (strpos($question->answer , $question->choice4) !== false)
                                            <li class="list-group-item list-group-item-success">4. {{$question->choice4}}</li>

                                            @else
                                            <li class="list-group-item">4. {{$question->choice4}}</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'TrueFalse')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="form-group">
                                            <label for="">{{ trans('app.AnswerLabel') }}</label>
                                            <select class="form-control input-sm" name="trueOrFalse" id="trueOrFalse" disabled="true">
                                                @if ($question->answer == 'True')
                                                <option value="True" selected="selected">{{ trans('app.TrueLabel') }}</option>
                                                <option value="False">{{ trans('app.FalseLabel') }}</option>
                                                @endif @if ($question->answer == 'False')
                                                <option value="True">{{ trans('app.TrueLabel') }}</option>
                                                <option value="False" selected="selected">{{ trans('app.FalseLabel') }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'FillUp')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="form-group">
                                            <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                            <input type="text" class="form-control" name="fillup" id="fillup" value='{{$question->answer}}' readonly>
                                        </div>
                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'NumericQuestion')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="form-group">
                                            <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                            <input type="number" class="form-control" name="numericQuestion" id="numericQuestion" value='{{$question->answer}}' readonly>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="row ">
                                    <div class="col-md-2 offset-md-8">
                                        <a class="btn btn-info pull-right" href="{{route('question.edit', $question->id)}}">{{ trans('app.EditButton') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div class="row ">
                            <div class="col-md-2 offset-md-10" style="padding:10px;">
                                <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">
                                    {{ trans('app.BackButton') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="mt-4">
                {{$questions->links()}}
            </div>
        </div>
    </div>
</div>
@endsection