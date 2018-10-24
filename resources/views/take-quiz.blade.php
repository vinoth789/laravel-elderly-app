@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.QuizHeader') }}</div>

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif



                    <form id="submitQuiz" method="POST" action="{{ route('submitQuiz.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <label style="display:none;" id="quizTimer">{{ trans('app.TimeRemainingLabel') }}
                                    <p id="timer"></p>
                                </label>
                            </div>
                            <div class="col-md-2 offset-md-2">
                                <label>{{ trans('app.DifficultyLevelLabel') }} {{$question->difficultyLevel}}</label>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-2" style="white-space: pre-wrap;">{{$question->questionNumber}}. {{$question->question}}</div>
                                </div>
                                @if ($question->questionType == 'MultipleChoice' || $question->questionType ==
                                'OrderOptions')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="radio" id="answer" value="{{$question->choice1}}">
                                                {{$question->choice1}}</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="radio" id="answer" value="{{$question->choice2}}">
                                                {{$question->choice2}}</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="radio" id="answer" value="{{$question->choice3}}">
                                                {{$question->choice3}}</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="radio" id="answer" value="{{$question->choice4}}">
                                                {{$question->choice4}}</label>
                                        </div>

                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'MultipleAnswer')
                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-12">

                                        <div class="form-group">

                                            <table width="70%">
                                                <tr>
                                                    <label>{{ trans('app.MultipleAnswersDesc') }}</label>
                                                </tr>
                                                <tr>
                                                    <td width="15%">
                                                        <label>{{ trans('app.Choice1Label') }}</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="choice[1]" id="choice1"
                                                            value="{{$question->choice1}}" readonly />
                                                    </td>
                                                    <td align="center">
                                                        <input class="checkboxField" name="selected_ids[]" type="checkbox"
                                                            value="1" />
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>{{ trans('app.Choice2Label') }}</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="choice[2]" id="choice2"
                                                            value="{{$question->choice2}}" readonly />
                                                    </td>
                                                    <td align="center">
                                                        <input class="checkboxField" name="selected_ids[]" type="checkbox"
                                                            value="2" />
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label>{{ trans('app.Choice3Label') }}</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="choice[3]" id="choice3"
                                                            value="{{$question->choice3}}" readonly />
                                                    </td>
                                                    <td align="center">
                                                        <input class="checkboxField" name="selected_ids[]" type="checkbox"
                                                            value="3" />
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>{{ trans('app.Choice4Label') }}</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="choice[4]" id="choice4"
                                                            value="{{$question->choice4}}" readonly />
                                                    </td>
                                                    <td align="center">
                                                        <input class="checkboxField" name="selected_ids[]" type="checkbox"
                                                            value="4" />
                                                    </td>

                                                </tr>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'TrueFalse')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="radio" id="answer" value="True"> {{
                                                    trans('app.TrueLabel') }}</label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="radio" id="answer" value="False"> {{
                                                    trans('app.FalseLabel') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'FillUp')
                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-8">

                                        <div class="form-group">
                                            <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                            <input type="text" class="form-control" name="answer" id="answer">
                                        </div>

                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'NumericQuestion')
                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-8">

                                        <div class="form-group">
                                            <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                            <input type="number" class="form-control" name="answer" id="answer">
                                        </div>

                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'ImageAsOptions')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">{{ trans('app.Image1Label') }}</th>
                                                        <th scope="col">{{ trans('app.Image2Label') }}</th>
                                                        <th scope="col">{{ trans('app.Image3Label') }}</th>
                                                        <th scope="col">{{ trans('app.Image4Label') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td><img class="img-responsive" width="150px" height="150px"
                                                                src="/img/{{ $question->choice1 }}"></td>
                                                        <td><img class="img-responsive" width="150px" height="150px"
                                                                src="/img/{{ $question->choice2 }}"></td>
                                                        <td><img class="img-responsive" width="150px" height="150px"
                                                                src="/img/{{ $question->choice3 }}"></td>
                                                        <td><img class="img-responsive" width="150px" height="150px"
                                                                src="/img/{{ $question->choice4 }}"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-7 offset-md-2">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio" id="answer" value="{{$question->choice1}}">
                                                        {{ trans('app.Image1Label') }}</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio" id="answer" value="{{$question->choice2}}">
                                                        {{ trans('app.Image2Label') }}</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio" id="answer" value="{{$question->choice3}}">
                                                        {{ trans('app.Image3Label') }}</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio" id="answer" value="{{$question->choice4}}">
                                                        {{ trans('app.Image4Label') }}</label>
                                                </div>

                                            </div>
                                        </div>
                                        @endif

                                        @if ($question->questionType == 'ImageType')
                                        <div class="form-group row">
                                            <div class="col-md-7 offset-md-2">
                                                <div class="table-responsive-sm">
                                                    <table class="table">
                                                        <thead>

                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td><img width="150px" height="150px" src="/img/{{ $question->imgFileName }}"></td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-7 offset-md-2">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice1}}">
                                                                {{$question->choice1}}</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice2}}">
                                                                {{$question->choice2}}</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice3}}">
                                                                {{$question->choice3}}</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice4}}">
                                                                {{$question->choice4}}</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endif


                                                @if ($question->questionType == 'VideoType')

                                                <div class="form-group row">
                                                    <div class="col-md-7 offset-md-2">

                                                        <video id="videoTypeQuestion" height="300px" width="600px"
                                                            controls preload="auto">
                                                            <source src="/video/{{ $question->imgFileName }}" type="video/mp4">
                                                            <source src="/video/{{ $question->imgFileName }}" type="video/ogg">
                                                            Your browser does not support the video tag.

                                                        </video>

                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice1}}">
                                                                {{$question->choice1}}</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice2}}">
                                                                {{$question->choice2}}</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice3}}">
                                                                {{$question->choice3}}</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="radio" id="answer" value="{{$question->choice4}}">
                                                                {{$question->choice4}}</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="quizNo" id="quizNo" value="{{$quiz->quizNumber}}"
                                                readonly required>
                                            <input type="hidden" class="form-control" name="timerStatus" id="timerStatus"
                                                value="{{$quiz->timerStatus}}" readonly required>
                                            <input type="hidden" class="form-control" name="questionNo" id="questionNo"
                                                value="{{$questionNo}}" readonly required>
                                            <input type="hidden" class="form-control" name="questionID" id="questionID"
                                                value="{{$question->id}}" readonly required>
                                            <input type="hidden" class="form-control" name="questionType" id="questionType"
                                                value="{{$question->questionType}}" readonly required>
                                            <input type="hidden" class="form-control" name="questionAnswer" id="questionAnswer"
                                                value="{{$question->answer}}" readonly required>
                                            <input type="hidden" class="form-control" name="difficultyLevel" id="difficultyLevel"
                                                value="{{$question->difficultyLevel}}" readonly required>
                                            <input type="hidden" class="form-control" name="attempt" id="attempt" value="{{$attempt}}"
                                                readonly required>
                                            <input type="hidden" class="form-control" name="isRangeAllowed" id="isRangeAllowed"
                                                value="{{$question->isRangeAllowed}}}" readonly required>
                                        </div>
                                        <div class="alert alert-success" id="correctAnswer" style="display:none;">
                                            <strong>{{ trans('app.CorrectAnsMsg') }}</strong>
                                        </div>
                                        <div class="alert alert-success" id="exactAnswer" style="display:none;">
                                            <strong>{{ trans('app.CorrectAnsRangeMsg') }} {{$question->answer}}.</strong>
                                        </div>
                                        <div class="alert alert-danger" id="wrongAnswer" style="display:none;">
                                            <strong>{{ trans('app.WrongAnsMsg') }} {{$question->answer}}. </strong>
                                        </div>
                                        @if ($questionNo != -1)
                                        <div class="row mt-4">
                                            <div class="col-md-2 offset-md-10">
                                                <a class="buttonStyle" style="color:white;" onclick="showCorrectAnswer('{{$question->questionType}}','{{$question->isRangeAllowed}}')"
                                                    class="btn btn-info pull-right">{{ trans('app.NextButton') }}</a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row mt-4">
                                            <div class="col-md-2 offset-md-10">
                                                <a class="btn btn-warning" style="color:white;" onclick="showCorrectAnswer('{{$question->questionType}}','{{$question->isRangeAllowed}}')"
                                                    class="btn btn-info pull-right">{{ trans('app.SubmitButton') }}</a>
                                            </div>
                                        </div>
                                        @endif
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

<script>
window.onunload = function(e) {
// Firefox || IE
alert("pls");
e = e || window.event;
 
 var y = e.pageY || e.clientY;
  
 if(y < 0)  alert("Window closed");
 else alert("Window refreshed");e.preventDefault();

}
    window.onload = chooseLevel;

    function chooseLevel(e) {

        $("a").click(function () {
                 logoutFlag = false;
                 return false;
             });


  

        var difficultyLevel = document.getElementById("difficultyLevel").value;
        attempt = document.getElementById("attempt").value;
        timerStatus = document.getElementById("timerStatus").value;
        question_type = document.getElementById("questionType").value;
        is_range_allowed = document.getElementById("isRangeAllowed").value;
        if (question_type == 'VideoType') {
            var vid = document.getElementById("videoTypeQuestion");

            vid.onloadedmetadata = function () {
                videoDuration = Math.round(vid.duration);
                if (difficultyLevel == 'Easy') {
                    myTimeSpan = 1 * (15 + videoDuration) * 1000;
                } else if (difficultyLevel == 'Medium') {
                    myTimeSpan = (1 * 30 * 1000) + vid.duration;
                } else {
                    myTimeSpan = (1 * 45 * 1000) + vid.duration;
                }


                countDownDate = new Date();
                countDownDate.setTime(countDownDate.getTime() + myTimeSpan);

                var x = setInterval(function () {

                    var now = new Date().getTime();
                    var distance = countDownDate - now;

                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    if (attempt != 'firstAttempt' && timerStatus != 'On') {
                    $('#quizTimer').show();
                    document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";

                    if (distance < 0) {
                        clearInterval(x);
                        showCorrectAnswer(question_type, is_range_allowed);
                    }
                    } else {
                        $('#quizTimer').hide();
                    }
                }, );
            };

        } else {

            // 5 minutes in milliseconds
            if (difficultyLevel == 'Easy') {

                myTimeSpan = 1 * 15 * 1000;

            } else if (difficultyLevel == 'Medium') {

                myTimeSpan = 1 * 30 * 1000;

            } else {

                myTimeSpan = 1 * 45 * 1000;

            }

            countDownDate = new Date();
            countDownDate.setTime(countDownDate.getTime() + myTimeSpan);

            var x = setInterval(function () {

                var now = new Date().getTime();
                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (attempt != 'firstAttempt' && timerStatus != 'On') {
                $('#quizTimer').show();
                document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";

                if (distance < 0) {
                    clearInterval(x);
                    showCorrectAnswer(question_type, is_range_allowed);
                }
                } else {
                    $('#quizTimer').hide();
                }
            }, );

        }

    }


    // Updates the count down every 1 second


    function showCorrectAnswer(questionType, isRangeAllowed) {


        var enteredAnswer = "";
        if (questionType == 'MultipleChoice' || questionType == 'OrderOptions' || questionType == 'TrueFalse' ||
            questionType == 'ImageAsOptions' || questionType == 'ImageType' || questionType == 'VideoType') {
            enteredAnswer = $('input[name=radio]:checked').val();

        } else if (questionType == 'MultipleAnswer') {
            var values = new Array();
            var count = 1;
            var checkedLength = $(".checkboxField:checked").length;

            $.each($("input[name='selected_ids[]']:checked"), function () {

                var idNmae = "choice" + count;

                if (count == checkedLength) {
                    enteredAnswer += document.getElementById(idNmae).value;
                } else {
                    enteredAnswer += document.getElementById(idNmae).value;
                    enteredAnswer += ",";
                }
                values.push($(this).val());
                count++;
            });
        } else {
            enteredAnswer = document.getElementById("answer").value;
        }
        if (enteredAnswer == undefined) {
            enteredAnswer = "";
        }

        var actualAnswer = document.getElementById("questionAnswer").value;
        var min, max;
        if (questionType == 'NumericQuestion') {
            if (isRangeAllowed == 'Yes') {
                min = parseInt(actualAnswer) - 6;
                max = parseInt(actualAnswer) + 6;

                if ((min < enteredAnswer) && (enteredAnswer < max)) {
                    if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {
                        $('#correctAnswer').show();
                        $('#wrongAnswer').hide();
                    } else {
                        $('#exactAnswer').show();
                        $('#correctAnswer').hide();
                        $('#wrongAnswer').hide();
                    }
                } else {
                    $('#wrongAnswer').show();
                    $('#correctAnswer').hide();
                }
            } else if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {
                $('#correctAnswer').show();
                $('#wrongAnswer').hide();
            } else {
                $('#wrongAnswer').show();
                $('#correctAnswer').hide();
            }
        } else if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {

            $('#correctAnswer').show();
            $('#wrongAnswer').hide();
        } else {

            $('#wrongAnswer').show();
            $('#correctAnswer').hide();
        }

        setTimeout("submitAnswerForm()", 2500);
    }

    function submitAnswerForm() {

        document.getElementById("submitQuiz").submit();
    }

    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    
    
</script>
