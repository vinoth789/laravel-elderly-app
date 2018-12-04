@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>{{ trans('app.TeacherDashboard') }}</b>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="card-body">
                    <input type="hidden" name="_token" class="btn btn-primary m-d do-ajax"> @csrf
                    </input>
                    @csrf @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="col-md-12">
                        <div class="tab-container mb-5">
                            <ul role="tablist" class="nav nav-tabs nav-tabs-primary">
                                <li class="nav-item">
                                    <a href="#adminHome" data-toggle="tab" role="tab" class="nav-link active">
                                        <b>{{ trans('app.HomeMenu') }}</b>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#studentResults" data-toggle="tab" role="tab" class="nav-link">
                                        <b>{{ trans('app.StudentResultsMenu') }}</b>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#createQuiz" data-toggle="tab" role="tab" class="nav-link">
                                        <b>{{ trans('app.CreateQuizMenu') }}</b>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" style="padding:20px;">
                                <div id="adminHome" role="tabpanel" class="tab-pane active">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default panel-table">
                                            <div class="panel-heading">
                                                <h3>{{ trans('app.HomeMenu') }}</h3>
                                                <p>
                                                    <i>{{ trans('app.HomeDesc') }}</i>
                                                </p>

                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-hover" id="adminHomeTable">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ trans('app.QuizNumber') }}</th>
                                                            <th>{{ trans('app.QuizName') }}</th>
                                                            <th>{{ trans('app.QuestionAdded') }}</th>
                                                            <th>{{ trans('app.Status') }}</th>
                                                            <th>{{ trans('app.Timer') }}</th>
                                                            <th>{{ trans('app.AddQuestions') }}</th>
                                                            <th>{{ trans('app.EditQuestions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbodyPanel">

                                                        @foreach($quizs as $quiz)

                                                        <tr>
                                                            <td align="center">{{$quiz->quizNumber}}</td>
                                                            <td align="center">{{$quiz->quizName}}</td>
                                                            <td align="center">{{$quiz->questionsAdded}}</td>
                                                            <td align="center" width="160px;">
                                                                <form method="POST" id="saveForm{{$quiz->quizNumber}}" action="{{route('confirm.status',$quiz->id)}}">
                                                                    @csrf

                                                                    <select class="form-control input-sm" style="background:radial-gradient(#e6e9f0,#eef1f5);" name="teacherQuizStatus" id="teacherQuizStatus{{$quiz->quizNumber}}"
                                                                        onchange="submitForm({{$quiz->quizNumber}},{{$quiz->questionsAdded}})"
                                                                        required>

                                                                        @if ($quiz->teacherQuizStatus == 'InProgress')
                                                                        <option value="InProgress" selected="selected">{{ trans('app.InprogressStatus') }}</option>
                                                                        <option value="Finish">{{ trans('app.FinishStatus') }}</option>
                                                                        @elseif ($quiz->teacherQuizStatus == 'Finish')
                                                                        <option value="InProgress">{{ trans('app.InprogressStatus') }}</option>
                                                                        <option value="Finish" selected="selected">{{ trans('app.FinishStatus') }}</option>
                                                                        @endif
                                                                    </select>
                                                                </form>
                                                            </td>
                                                            <td align="center">
                                                                <form method="POST" id="timerSwitchForm{{$quiz->quizNumber}}" action="{{route('timer.status',$quiz->id)}}">
                                                                    @csrf
                                                                    <input type="hidden" name="timerSwitchStatus" id="timerSwitchStatus{{$quiz->quizNumber}}" value="" /> @if($quiz->timerStatus == 'On')
                                                                    <label class="switch">
                                                                        <input id="timerSwitch{{$quiz->quizNumber}}" type="checkbox" onchange="changeTimerStatus({{$quiz->quizNumber}})" checked>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                    @elseif ($quiz->timerStatus == 'Off')
                                                                    <label class="switch">
                                                                        <input id="timerSwitch{{$quiz->quizNumber}}" type="checkbox" onchange="changeTimerStatus({{$quiz->quizNumber}})">
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                    @endif
                                                                </form>
                                                            </td>

                                                            <td align="center">
                                                                <div class="addQuiz" id="addQuiz{{$quiz->quizNumber}}">
                                                                    <a class="btn btn-style" href="{{ route('add.questions', $quiz->quizNumber) }}">
                                                                        <i class="fa fa-plus-circle"></i>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                            <td align="center">
                                                                <div class="viewQuiz" id="viewQuiz{{$quiz->quizNumber}}">
                                                                    <a class="btn btn-style" href="{{ route('view.questions', $quiz->quizNumber) }}">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                            </td>


                                                        </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="studentResults" role="tabpanel" class="tab-pane">
                                    <div class="col-md-12">
                                        <div class="panel panel-default panel-table">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class=" panel-heading">
                                                        <h3>{{ trans('app.StudentResultsMenu') }}</h3>
                                                        <p>
                                                            <i>{{ trans('app.StudentResultsDesc') }}
                                                            </i>
                                                        </p>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="input-group form-inline" style="padding:10px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <span class="fa fa-search"></span>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="searchKeyword" onkeyup="searchByKeyword()" id="searchKeyword" placeholder="{{ trans('app.SearchPlaceholder') }}"
                                                            aria-label="Search..." aria-describedby="basic-addon1">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-hover" id="studentResultTable">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ trans('app.StudentName') }}</th>
                                                            <th>{{ trans('app.QuizName') }}</th>
                                                            <th>{{ trans('app.TotalQuestions') }}</th>
                                                            <th>{{ trans('app.CorrectAnswers') }}</th>
                                                            <th>{{ trans('app.WrongAnswers') }}</th>
                                                            <th>{{ trans('app.PointsEarned') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbodyPanel">

                                                        @foreach($studentResults as $result)

                                                        <tr>

                                                            <td align="center">
                                                                <a href="#" onclick="viewStudentDetails('{{$result->user_id}}')">{{$result->name}}</a>
                                                            </td>
                                                            <td>{{$result->quizName}}</td>
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
                                <div id="createQuiz" role="tabpanel" class="tab-pane">
                                    <form id="storeQuizForm" name="storeQuizForm" onsubmit="return validateQuizForm();" method="POST" action="{{ route('quizNumber.store') }}">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="offset-md-2 col-md-8">
                                                <div class="form-group">
                                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.CreateQuizLabel') }}</label>
                                                    <select class="form-control input-sm" name="quizType" id="quizType" onchange="chooseQuizType()" required>
                                                        <option value="newQuiz">{{ trans('app.SelectWithNewQuestion') }}</option>
                                                        <option value="questionPool">{{ trans('app.SelectFromPool') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            @foreach($quizs as $quiz) @endforeach @if(!$quizs->isEmpty())
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="id" id="id" value="{{$quiz->quizNumber+1}}" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" style="font-weight:bold;">{{ trans('app.QuizNumber') }}</label>
                                                <input type="number" class="form-control" name="quizNumber" id="quizNumber" value="{{$quiz->quizNumber+1}}" readonly required>
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="id" id="id" value="1" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" style="font-weight:bold;">{{ trans('app.QuizNumber') }}</label>
                                                <input type="number" class="form-control" name="quizNumber" id="quizNumber" value="1" readonly required>
                                            </div>
                                            @endif

                                            <div class="form-group">
                                                <label for="" style="font-weight:bold;">{{ trans('app.QuizName') }}</label>
                                                <input type="text" class="form-control" name="quizName" id="quizName" required>
                                            </div>
                                            <div id="questionPoolPanel" style="display:none;">
                                                <div class="offset-md-8 col-md-4" style="padding:10px;">
                                                    <div class="input-group form-inline" style="padding:10px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <span class="fa fa-search"></span>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="questionSearch" onkeyup="searchQuestion()" id="questionSearch" placeholder="{{ trans('app.SearchPlaceholderPool') }}"
                                                            aria-label="Search..." aria-describedby="basic-addon1">
                                                    </div>

                                                </div>


                                                <table class="table table-striped table-hover" id="questionPoolTable">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:left; width:10%;">{{ trans('app.SelectHeader') }}</th>
                                                            <th style="text-align:center; width:90%;">{{ trans('app.QuestionsHeader') }}</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="tbodyPanel">

                                                        @forelse($questions as $question)

                                                        <tr>

                                                            <td style="text-align:left; width:8%;">
                                                                <input name="selected_questions[]" type="checkbox" value="{{$question->id}}" />
                                                            </td>
                                                            <td style="text-align:left; width:92%;">{{$question->question}}</td>

                                                        </tr>
                                                        @empty
                                                        <p style="text-align:center; color:red; font-weight:bold;">{{ trans('app.NoQuestionPoolMsg') }}</p>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div>

                                            <button class="buttonStyle" id="addQuizButton"  class="btn btn-xs btn-style">{{ trans('app.AddButton') }}</button>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background: #00b0f0">
                                    <b>{{ trans('app.StudentInfoHeader') }}</b>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <img src="" style="border:1px; width:180px; height:200px; float:left; border-radius:2%; margin-right:25px;">
                                            </div>
                                            <div class="offset-md-1 col-md-6">

                                                <table width:100%>
                                                    <tr>
                                                        <td width="15%">
                                                            <label>{{ trans('app.ID') }}</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" id="studentId" type="text" readonly/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%">
                                                            <label>{{ trans('app.Name') }}</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" id="studentName" type="text" readonly/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%">
                                                            <label>{{ trans('app.Email') }}</label>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" id="studentEmail" type="text" readonly/>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 48px;
        height: 22px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }



    .btn-style {
        color: #fff;
        background-color: 545454;
        border-color: 545454;
    }

    #questionsSearch {
        background-image: url('/img/search-icon.png');
        /* Add a search icon to input */
        background-position: 10px 12px;
        /* Position the search icon */
        background-repeat: no-repeat;
        /* Do not repeat the icon image */
        width: 100%;
        /* Full-width */
        font-size: 16px;
        /* Increase font-size */
        padding: 12px 20px 12px 40px;
        /* Add some padding */
        border: 1px solid #ddd;
        /* Add a grey border */
        margin-bottom: 12px;
        /* Add some space below the input */
    }

    #studentResultTable,
    #questionPoolTable,
    #adminHomeTable {
        background: radial-gradient(#e6e9f0, #eef1f5);
        border-collapse: collapse;
        /* Collapse borders */
        width: 100%;
        /* Full-width */
        border: 0px solid #ddd;
        /* Add a grey border */
        font-size: 18px;
        /* Increase font-size */
    }

    #studentResultTable th,
    #studentResultTable td,
    #adminHomeTable th,
    #adminHomeTable td {
        text-align: center;
        padding: 12px;

    }

    #questionPoolTable th,
    #questionPoolTable td {
        text-align: left;
        padding: 12px;
    }

    #studentResultTable tr,
    #questionPoolTable tr {
        border-bottom: 1px solid #ddd;
    }

    .tbodyPanel {
        display: block;
        height: 400px;
        width: 100%;
        overflow-y: scroll;
        overflow-x: hidden;

    }


    #studentResultTable tr.header,
    #studentResultTable tr:hover,
    #questionPoolTable tr.header,
    #questionPoolTable tr:hover {
        background-color: #f1f1f1;
    }

    thead,
    tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    thead {
        background: rgba(99, 109, 132, 0.34);
    }

    table {
        width: 400px;
    }
</style>

<script>

window.translations = {
    selectQuestionAlert: '{{ trans('app.SelectQuestionAlert') }}',
    addQuestionAlert: '{{ trans('app.AddQuestionAlert') }}',
    confirmAlert: '{{ trans('app.ConfirmAlert') }}',
    };
     translation = {
        selectQuestionAlert: window.translations.selectQuestionAlert,
        addQuestionAlert: window.translations.addQuestionAlert,
        confirmAlert: window.translations.confirmAlert,
};

    function viewStudentDetails(userID) {
        var token, url;
        token = '{{Session::token()}}';
        url = '{{route('student.details')}}';

        $.ajax({
            url: url,
            data: {
                _token: token,
                user_id: userID
            },
            method: 'POST',
            datatype: 'json',
            success: function (resp) {
                for (var i in resp) {
                    var studentId = resp[i].id;
                    var studentEmail = resp[i].email;
                    var studentName = resp[i].name;
                }
                $('#studentId').val('');
                $('#studentEmail').val('');
                $('#studentName').val('');
                $("#studentId").val(studentId);
                $("#studentEmail").val(studentEmail);
                $("#studentName").val(studentName);
                $("#yourModal").modal('show')
            }
        });
    }


    function validateQuizForm() {


        var quizTypes = document.getElementById("quizType");
        var SelectedQuizType = quizTypes.options[quizTypes.selectedIndex].value;
        if (SelectedQuizType == 'questionPool') {


                var check = $("input[name='selected_questions[]']:checked").length;
                if (check === 0) {
                    alert(translation.selectQuestionAlert);
                    return false;
                }else{
                    return true;
                }

        }
    }

    function searchQuestion() {

        var input, filter, table, tr, td, i;
        input = document.getElementById("questionSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("questionPoolTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchByKeyword() {

        var input, filter, table, tr, studentNametd, i;
        input = document.getElementById("searchKeyword");
        filter = input.value.toUpperCase();
        table = document.getElementById("studentResultTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            studentNametd = tr[i].getElementsByTagName("td")[0];
            quizNametd = tr[i].getElementsByTagName("td")[1];
            if (studentNametd || quizNametd) {
                if (studentNametd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else if (quizNametd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function chooseQuizType() {

        var selected_quiz_type = $('#quizType').val();

        if (selected_quiz_type == 'newQuiz') {

            $('#questionPoolPanel').hide();

        } else if (selected_quiz_type == 'questionPool') {

            $('#questionPoolPanel').show();

        }

    }

    function changeTimerStatus(quizNumber) {


        var isTimerOn = document.getElementById("timerSwitch" + quizNumber).checked;
        if (isTimerOn) {
            document.getElementById("timerSwitchStatus" + quizNumber).value = 'On';
        } else {
            document.getElementById("timerSwitchStatus" + quizNumber).value = 'Off';
        }

        document.getElementById("timerSwitchForm" + quizNumber).submit();



    }

    function submitForm(quizNumber, questionsAdded) {

        var selectedValue = document.getElementById("teacherQuizStatus" + quizNumber).value;

        var result = "";
        if (selectedValue == 'Finish' && questionsAdded == 0) {
            alert(translation.addQuestionAlert);
            $('select option:first-child').attr("selected", "selected");
        } else {
            var result = confirm(translation.confirmAlert);
            //alert(result);
            if (result) {
                document.getElementById("saveForm" + quizNumber).submit();
            }else{
                if(selectedValue == 'Finish'){
                    document.getElementById("teacherQuizStatus" + quizNumber).value = "InProgress";
                }else{
                    document.getElementById("teacherQuizStatus" + quizNumber).value = "Finish";
                }
            }
        }

    }

    function chooseQuizStatus(quizNumber, questionsAdded, noOfQuestions) {


        var selected_status = $('#teacherQuizStatus' + quizNumber).val();

        if (selected_status == 'InProgress') {

            $('#saveStatus' + quizNumber).hide();


        } else if (selected_status == 'Finish') {

            if (questionsAdded != noOfQuestions) {
                alert("Please add all " + noOfQuestions + " questions before you select finish");
                document.getElementById("teacherQuizStatus" + quizNumber).selectedIndex = 0;
            } else {
                $('#saveStatus' + quizNumber).show();
            }
        }


    }
</script>