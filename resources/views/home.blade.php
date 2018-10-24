@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($rankNotification->pointsDifference == 0)
            <div class="alert success">
                <span class="closebtn">&times;</span>
                <strong>{{ trans('app.Congradulations') }}</strong> {{ trans('app.TopTableNotification') }}
            </div>
            @else
            <div class="alert warning">
                <span class="closebtn">&times;</span>
                <strong>{{ trans('app.Alert') }}</strong> {{ trans('app.QuizesNotification1') }} {{$rankNotification->pointsDifference+1}} {{ trans('app.QuizesNotification2') }}
                {{$rankNotification->competetorName}} {{ trans('app.QuizesNotification3') }} {{$rankNotification->rank}}.
            </div>
            @endif
            @if($rankNotification->quizCount != 0)
            <div class="alert info">
                <span class="closebtn">&times;</span>
                @if($rankNotification->quizCount == 1)
                <strong>{{ trans('app.Alert') }}</strong> {{ trans('app.OneQuizNotification') }}
                @else
                <strong>{{ trans('app.Alert') }}</strong> {{$rankNotification->quizCount}} {{ trans('app.QuizesNotification') }}
                @endif
            </div>
            @endif


            <div class="card">
                <div class="card-header">
                    <b>{{ trans('app.StudentDashboard') }}</b>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div id="studentDashboardMenu">

                        <div class="col-md-12">
                            <div class="tab-container mb-5">
                                <ul role="tablist" class="nav nav-tabs nav-tabs-primary">
                                    <li class="nav-item">
                                        <a href="#leaderBoard" data-toggle="tab" role="tab" class="nav-link active">
                                            <b>{{ trans('app.LeaderBoardTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pointsHistory" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.PointsHistoryTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#takeQuiz" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.QuizTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#retakeQuiz" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.RetakeQuizTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#dailyChallenge" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.DailyChallengeTab') }}</b>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="padding:20px;">
                                    <div id="leaderBoard" role="tabpanel" class="tab-pane active">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.LeaderBoardLabel') }}</h3>
                                                    <p>
                                                        <i>{{ trans('app.LeaderBoardDesc') }}</i>
                                                    </p>

                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-hover" id="leaderBoardTable">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('app.RankLabel') }}</th>
                                                                <th>{{ trans('app.UserIdLabel') }}</th>
                                                                <th>{{ trans('app.NameLabel') }}</th>
                                                                <th>{{ trans('app.QuizPointsLabel') }}</th>
                                                                <th>{{ trans('app.DailyChallengePointsLabel') }}</th>
                                                                <th>{{ trans('app.TotalPointsLable') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach($userPoints as $key => $result)

                                                            <tr>

                                                                <td>{{$key+1}}</td>
                                                                <td>{{$result->id}}</td>
                                                                <td>{{$result->name}}</td>
                                                                <td>{{$result->points_earned}}</td>
                                                                <td>{{$result->daily_challenge_points}}</td>
                                                                <td>{{$result->daily_challenge_points+$result->points_earned}}</td>

                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="pointsHistory" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.PointsHistoryLabel') }}</h3>
                                                    <p>
                                                        <i>{{ trans('app.PointsHistoryDesc') }}</i>
                                                    </p>

                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-hover" id="pointsHistoryTable">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('app.QuizNumberLabel') }}</th>
                                                                <th>{{ trans('app.QuizName') }}</th>
                                                                <th>{{ trans('app.TotalQuestionsLabel') }}</th>
                                                                <th>{{ trans('app.CorrectAnswersLabel') }}</th>
                                                                <th>{{ trans('app.WrongAnswersLabel') }}</th>
                                                                <th>{{ trans('app.PointsEarnedLable') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach($quizResults as $result)

                                                            <tr>

                                                                <td>{{$result->quiz_number}}</td>
                                                                <td>{{$result->quiz_name}}</td>
                                                                <td>{{$result->totalQuestions}}</td>
                                                                <td>{{$result->correctAnswers}}</td>
                                                                <td>{{$result->wrongAnswers}}</td>
                                                                <td>{{$result->pointsEarned}}</td>

                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="takeQuiz" role="tabpanel" class="tab-pane">

                                        <h3>{{ trans('app.QuizLabel') }}</h3>
                                        <p>
                                            <i>{{ trans('app.QuizDescLine1') }}
                                                <br>{{ trans('app.QuizDescLine2') }}</i>
                                        </p>
                                        @if(count($quizs) == 0)
                                        <p style="text-align:center; color:red; font-weight:bold;">{{
                                            trans('app.NoQuizNotification') }}</p>
                                        @else
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="form-group">

                                                    <label for="add-question" style="font-weight:bold;">{{
                                                        trans('app.ChooseQuizLabel') }}</label>
                                                    <select class="form-control input-sm" name="quizNumber" id="quizNumber"
                                                        required>

                                                        @foreach ($quizs as $quiz)

                                                        <option value="{{$quiz->quizNumber}}">{{ $quiz->quizName }}
                                                        </option>

                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                        </div>
                                        <button id="takeToQuiz" class="buttonStyle" onclick="startQuiz()">
                                            {{ trans('app.StartQuizButton') }} </button>
                                        @endif

                                    </div>
                                    <div id="retakeQuiz" role="tabpanel" class="tab-pane">

                                        <h3>{{ trans('app.RetakeQuizLabel') }}</h3>
                                        <p>
                                            <i>{{ trans('app.RetakeQuizDescLine1') }}
                                                <br>{{ trans('app.RetakeQuizDescLine2') }}
                                                <br>{{ trans('app.RetakeQuizDescLine3') }}</i>
                                        </p>
                                        @if(count($retakeQuizs) == 0)
                                        <p style="text-align:center; color:red; font-weight:bold;">{{
                                            trans('app.RetakeQuizNotification') }}</p>
                                        @else
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="form-group">

                                                    <label for="add-question" style="font-weight:bold;">{{
                                                        trans('app.ChooseQuizLabel') }}</label>
                                                    <select class="form-control input-sm" name="quizNo" id="quizNo"
                                                        required>

                                                        @foreach ($retakeQuizs as $quiz)

                                                        <option value="{{$quiz->quizNumber}}">{{ $quiz->quizName }}
                                                        </option>

                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                        </div>
                                        <button id="takeToQuiz" class="buttonStyle" style="text-decoration:none;"
                                            onclick="retakeQuiz()">
                                            {{ trans('app.StartQuizButton') }} </button>
                                        @endif

                                    </div>
                                    <div id="dailyChallenge" role="tabpanel" class="tab-pane">

                                        <h3>{{ trans('app.DailyChallengeLabel') }}</h3>
                                        <p>
                                            <i>{{ trans('app.DailyChallengeDescLine1') }}
                                                <br>{{ trans('app.DailyChallengeDescLine2') }}</i>
                                        </p>

                                        @if(!$userTakenChallenge) @if(!is_null($question))
                                        <form id="submitQuiz" method="POST" action="{{ route('submitDailyQuiz.store') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-2 offset-md-10">
                                                    <label>{{ trans('app.DifficultyLevelLabel') }}
                                                        {{$question->difficultyLevel}}</label>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-8 offset-md-2">
                                                            {{$question->question}}
                                                        </div>
                                                    </div>
                                                    @if ($question->questionType == 'MultipleChoice' ||
                                                    $question->questionType == 'OrderOptions' ||
                                                    $question->questionType == 'ImageType' ||
                                                    $question->questionType == 'VideoType')
                                                    <div class="form-group row">
                                                        <div class="col-md-7 offset-md-2">
                                                            @if ($question->questionType == 'ImageType')
                                                            <div class="col-md-7 offset-md-2">
                                                                <div class="table-responsive-sm">
                                                                    <table class="table">
                                                                        <thead>

                                                                        </thead>
                                                                        <tbody>

                                                                            <tr>
                                                                                <td><img width="150px" height="150px"
                                                                                        src="/img/{{ $question->imgFileName }}"></td>

                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                @endif @if ($question->questionType == 'VideoType')
                                                                <video height="300px" width="600px" controls>
                                                                    <source src="/video/{{ $question->imgFileName }}"
                                                                        type="video/mp4">
                                                                    <source src="/video/{{ $question->imgFileName }}"
                                                                        type="video/ogg">
                                                                    Your browser does not support the video tag.

                                                                </video>
                                                                @endif
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice1}}">
                                                                        {{$question->choice1}}</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice2}}">
                                                                        {{$question->choice2}}</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice3}}">
                                                                        {{$question->choice3}}</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice4}}">
                                                                        {{$question->choice4}}</label>
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
                                                                                <th scope="col">{{
                                                                                    trans('app.Image1Label')}}</th>
                                                                                <th scope="col">{{
                                                                                    trans('app.Image2Label')}}</th>
                                                                                <th scope="col">{{
                                                                                    trans('app.Image3Label')}}</th>
                                                                                <th scope="col">{{
                                                                                    trans('app.Image4Label')}}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <tr>
                                                                                <td><img class="img-responsive" width="150px"
                                                                                        height="150px" src="/img/{{ $question->choice1 }}"></td>
                                                                                <td><img class="img-responsive" width="150px"
                                                                                        height="150px" src="/img/{{ $question->choice2 }}"></td>
                                                                                <td><img class="img-responsive" width="150px"
                                                                                        height="150px" src="/img/{{ $question->choice3 }}"></td>
                                                                                <td><img class="img-responsive" width="150px"
                                                                                        height="150px" src="/img/{{ $question->choice4 }}"></td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-7 offset-md-2">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice1}}">
                                                                        {{ trans('app.Image1Label') }}</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice2}}">
                                                                        {{ trans('app.Image2Label') }}</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice3}}">
                                                                        {{ trans('app.Image3Label') }}</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="radio" id="answer"
                                                                            value="{{$question->choice4}}">
                                                                        {{ trans('app.Image4Label') }}</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @endif @if ($question->questionType == 'MultipleAnswer')
                                                        <div class="form-group row">
                                                            <div class="offset-md-2 col-md-12">

                                                                <div class="form-group">

                                                                    <table width="70%">
                                                                        <tr>
                                                                            <label>{{
                                                                                trans('app.MultipleAnswersDesc') }}</label>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="15%">
                                                                                <label>{{ trans('app.Choice1Label')
                                                                                    }}</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control"
                                                                                    name="choice[1]" id="choice1" value="{{$question->choice1}}"
                                                                                    readonly />
                                                                            </td>
                                                                            <td align="center">
                                                                                <input class="checkboxField" name="selected_ids[]"
                                                                                    type="checkbox" value="1" />
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label>{{ trans('app.Choice2Label')
                                                                                    }}</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control"
                                                                                    name="choice[2]" id="choice2" value="{{$question->choice2}}"
                                                                                    readonly />
                                                                            </td>
                                                                            <td align="center">
                                                                                <input class="checkboxField" name="selected_ids[]"
                                                                                    type="checkbox" value="2" />
                                                                            </td>

                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <label>{{ trans('app.Choice3Label')
                                                                                    }}</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control"
                                                                                    name="choice[3]" id="choice3" value="{{$question->choice3}}"
                                                                                    readonly />
                                                                            </td>
                                                                            <td align="center">
                                                                                <input class="checkboxField" name="selected_ids[]"
                                                                                    type="checkbox" value="3" />
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label>{{ trans('app.Choice3Label')
                                                                                    }}</label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control"
                                                                                    name="choice[4]" id="choice4" value="{{$question->choice4}}"
                                                                                    readonly />
                                                                            </td>
                                                                            <td align="center">
                                                                                <input class="checkboxField" name="selected_ids[]"
                                                                                    type="checkbox" value="4" />
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
                                                                            <input type="radio" name="radio" id="answer"
                                                                                value="True"> {{
                                                                            trans('app.TrueLabel') }}</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label>
                                                                            <input type="radio" name="radio" id="answer"
                                                                                value="False"> {{
                                                                            trans('app.FalseLabel') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif @if ($question->questionType == 'FillUp')
                                                        <div class="form-group row">
                                                            <div class="offset-md-2 col-md-8">

                                                                <div class="form-group">
                                                                    <label for="add-question">{{
                                                                        trans('app.AnswerLabel') }}</label>
                                                                    <input type="text" class="form-control" name="answer"
                                                                        id="answer">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @endif @if ($question->questionType == 'NumericQuestion')
                                                        <div class="form-group row">
                                                            <div class="offset-md-2 col-md-8">

                                                                <div class="form-group">
                                                                    <label for="add-question">{{
                                                                        trans('app.AnswerLabel') }}</label>
                                                                    <input type="number" class="form-control" name="answer"
                                                                        id="answer">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="questionID" id="questionID"
                                                        value="{{$question->id}}" readonly required>
                                                    <input type="hidden" class="form-control" name="questionType" id="questionType"
                                                        value="{{$question->questionType}}" readonly required>
                                                    <input type="hidden" class="form-control" name="questionAnswer" id="questionAnswer"
                                                        value="{{$question->answer}}" readonly required>
                                                    <input type="hidden" class="form-control" name="difficultyLevel" id="difficultyLevel"
                                                        value="{{$question->difficultyLevel}}" readonly required>
                                                </div>
                                                <div class="alert alert-success" id="correctAnswer" style="display:none;">
                                                    <strong>{{ trans('app.CorrectAnsMsg') }}</strong>
                                                </div>
                                                <div class="alert alert-success" id="exactAnswer" style="display:none;">
                                                    <strong>{{ trans('app.CorrectAnsRangeMsg') }}
                                                        {{$question->answer}}.</strong>
                                                </div>
                                                <div class="alert alert-danger" id="wrongAnswer" style="display:none;">
                                                    <strong>{{ trans('app.WrongAnsMsg') }} {{$question->answer}}.</strong>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-md-2 offset-md-10">
                                                        <a class="btn btn-warning" style="color:white;" onclick="showCorrectAnswer('{{$question->questionType}}','{{$question->isRangeAllowed}}')"
                                                            class="btn btn-info pull-right">{{
                                                            trans('app.SubmitButton') }} </a>
                                                    </div>
                                                </div>

                                        </form>
                                        @else
                                        <p style="text-align:center; color:red; font-weight:bold;">{{
                                            trans('app.NoChallengeNotification') }}</p>
                                        @endif @else
                                        <p style="text-align:center; color:red; font-weight:bold;">{{
                                            trans('app.NoChallengeNotification') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <head>

        <style>
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                opacity: 1;
                transition: opacity 0.6s;
                margin-bottom: 15px;
            }

            .alert.success {
                background-color: #4CAF50;
            }

            .alert.info {
                background-color: #2196F3;
            }

            .alert.warning {
                background-color: #ff9800;
            }

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }

            #leaderBoardTable th,
            #leaderBoardTable td,
            #pointsHistoryTable th,
            #pointsHistoryTable td {
                text-align: center;
                /* Left-align text */
                padding: 12px;
                /* width:100% ! important;
        white-space: nowrap; */
                /* Add padding */
            }

            #leaderBoardTable,
            #pointsHistoryTable {
                background: radial-gradient(#e6e9f0, #eef1f5);
                border-collapse: collapse;
                /* Collapse borders */
                width: 100%;
                /* Full-width */
                border: 1px solid #ddd;
                /* Add a grey border */
                font-size: 18px;
                /* Increase font-size */
            }

            #leaderBoardTable th,
            #leaderBoardTable td,
            #pointsHistoryTable th,
            #pointsHistoryTable td {
                text-align: center;
                /* Left-align text */
                padding: 12px;
                /* width:100% ! important;
        white-space: nowrap; */
                /* Add padding */
            }

            #leaderBoardTable tr,
            #pointsHistoryTable tr {
                /* Add a bottom border to all table rows */
                border-bottom: 1px solid #ddd;
                /* page-break-inside: avoid ! important; */
            }

            .tbodyPanel {
                display: block;
                height: 400px;
                width: 100%;
                overflow-y: scroll;
                overflow-x: hidden;

            }


            #leaderBoardTable tr.header,
            #leaderBoardTable tr:hover,
            #pointsHistoryTable tr.header,
            #pointsHistoryTable tr:hover {
                /* Add a grey background color to the table header and on hover */
                background-color: #f1f1f1;
            }


            thead,
            tbody tr {
                display: table;
                width: 100%;
                table-layout: fixed;
                /* even columns width , fix width of table too*/
            }

            thead {
                background: rgba(99, 109, 132, 0.34);
                /*  width: calc( 100% - 1em ) scrollbar is average 1em/16px width, remove it from thead width */
            }

            table {
                width: 400px;
            }
        </style>
        <script>
            window.onload = function () {
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                    close[i].onclick = function () {
                        var div = this.parentElement;
                        div.style.opacity = "0";
                        setTimeout(function () {
                            div.style.display = "none";
                        }, 600);
                    }
                }
            };

            function startQuiz() {

                var selected_quiz = $('#quizNumber').val();
                var attempt = "firstAttempt";
                var url = "{{ route('take.quiz', [':id',':id1']) }}";
                url = url.replace(':id', selected_quiz);
                url = url.replace(':id1', attempt);


                document.location.href = url;
            }

            function retakeQuiz() {

                var selected_quiz = $('#quizNo').val();
                var attempt = "reAttempt";
                var url = "{{ route('take.quiz', [':id',':id1']) }}";
                url = url.replace(':id', selected_quiz);
                url = url.replace(':id1', attempt);


                document.location.href = url;
            }

            function showCorrectAnswer(questionType, isRangeAllowed) {

                var enteredAnswer = "";
                if (questionType == 'MultipleChoice' || questionType == 'TrueFalse') {
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
                if (enteredAnswer === undefined) {
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
        </script>

    </head>