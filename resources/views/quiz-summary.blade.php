@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.QuizSummaryHeader') }}</div>

                <div class="card-body">
                @csrf
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @foreach ($pointsHistory as $pointsHistory)
                    <div class="form-group row">
                    <h3>{{ trans('app.YourPointsLabel') }} {{$pointsHistory->pointsEarned}}</h3>
                    </div>
                    <div class="form-group row">
                                         <div class="col-md-7 offset-md-2">
                                         <ul class="list-group">
                                         
                                         <li class="list-group-item">{{ trans('app.QuizNoSummaryLabel') }} {{$pointsHistory->quiz_number}}</li>
                                         <li class="list-group-item">{{ trans('app.QuizNameSummaryLabel') }} {{$pointsHistory->quiz_name}}</li>
                                         <li class="list-group-item">{{ trans('app.TotatlQuestionSummaryLabel') }} {{$pointsHistory->totalQuestions}}</li>
                                         <li class="list-group-item">{{ trans('app.CorrectAnsSummaryLabel') }} {{$pointsHistory->correctAnswers}}</li>
                                         <li class="list-group-item">{{ trans('app.WrongAnsSummaryLabel') }} {{$pointsHistory->wrongAnswers}}</li>
                                                    
                                            </ul>
                                        </div>
                                      </div>
                                      @endforeach
                                      <div class="row mt-4">
                                        <div class="col-md-2 offset-md-8">
                                        <a class="btn btn-danger" href="{{ route('home') }}">
                                        {{ trans('app.BackButton') }}
                                </a>                                     
                                        </div>
                                    </div>           
                
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>
@endsection

<script>

history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };

</script>