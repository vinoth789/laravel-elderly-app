@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.AddQuestionHeader') }}</div>

                <div class="card-body">
                    <form id="addQuestionForm" onsubmit="return addQuestion();" method="POST" action="{{ route('question.store') }}">
                        @csrf @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif


                        <div class="form-group row">
                            <div class="offset-md-2 col-md-8">
                                @foreach($questions as $question) @endforeach @if (count($questions) == 0)
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">{{ trans('app.QuestionNumberLabel') }}</label>
                                    <input type="number" class="form-control" name="questionNumber" id="questionNumber" value="1" readonly required>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">{{ trans('app.QuestionNumberLabel') }}</label>
                                    <input type="number" class="form-control" name="questionNumber" id="questionNumber" value="{{$question->questionNumber+1}}"
                                        readonly required>
                                </div>
                                @endif


                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuestionLabel') }}</label>
                                    <textarea class="form-control" name="question" rows="7" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuestionTypeLabel') }}</label>
                                    <select class="form-control input-sm" name="questionType" id="questionType" onchange="chooseQuestionType()" required>
                                        <option value="MultipleChoice">{{ trans('app.MultipleChoiceQT') }}</option>
                                        <option value="TrueFalse">{{ trans('app.TrueOrFalseQT') }}</option>
                                        <option value="FillUp">{{ trans('app.FillupQT') }}</option>
                                        <option value="NumericQuestion">{{ trans('app.NumericQT') }}</option>
                                        <option value="OrderOptions">{{ trans('app.OrderOptionsQT') }}</option>
                                        <option value="MultipleAnswer">{{ trans('app.MultipleAnswerQT') }}</option>
                                    </select>
                                </div>

                                <div class="trueOrFalsePanel" id="trueOrFalsePanel" style="display:none;">
                                    <div class="form-group row">
                                        <div class="offset-md-2 col-md-8">

                                            <div class="form-group">
                                                <label for="">{{ trans('app.AnswerLabel') }}</label>
                                                <select class="form-control input-sm" name="trueOrFalse" id="trueOrFalse">
                                                    <option value="True">{{ trans('app.TrueLabel') }}</option>
                                                    <option value="False">{{ trans('app.FalseLabel') }}</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="fillupPanel" id="fillupPanel" style="display:none;">
                                    <div class="form-group row">
                                        <div class="offset-md-2 col-md-8">

                                            <div class="form-group">
                                                <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                                <input type="text" class="form-control" name="fillup" id="fillup">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="numericQuestionPanel" id="numericQuestionPanel" style="display:none;">
                                    <div class="form-group row">
                                        <div class="offset-md-2 col-md-8">

                                            <div class="form-group">
                                                <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                                <input type="number" class="form-control" name="numericQuestion" id="numericQuestion">
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ trans('app.RangeLabel') }}</label>
                                                <select class="form-control input-sm" name="isRangeAllowed" id="isRangeAllowed">
                                                    <option value="Yes">{{ trans('app.RangeYesLabel') }}</option>
                                                    <option value="No">{{ trans('app.RangeNoLabel') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="multipleAnswers" id="multipleAnswers" style="display:none;">
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
                                                            />
                                                        </td>
                                                        <td align="center">
                                                            <input name="selected_ids[]" type="checkbox" value="1" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice2Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice[2]" id="choice2"
                                                            />
                                                        </td>
                                                        <td align="center">
                                                            <input name="selected_ids[]" type="checkbox" value="2" />
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice3Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice[3]" id="choice3"
                                                            />
                                                        </td>
                                                        <td align="center">
                                                            <input name="selected_ids[]" type="checkbox" value="3" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice4Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice[4]" id="answer"
                                                            />
                                                        </td>
                                                        <td align="center">
                                                            <input name="selected_ids[]" type="checkbox" value="4" />
                                                        </td>

                                                    </tr>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="multipleChoice" id="multipleChoice">
                                    <div class="form-group row">
                                        <div class="offset-md-2 col-md-12">

                                            <div class="form-group">

                                                <table width="70%">
                                                    <tr>
                                                        <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%">
                                                            <label>{{ trans('app.Choice1Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice1" id="choice1"
                                                                required/>
                                                        </td>
                                                        <td align="center">
                                                            <input name="radio" type="radio" value="1" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice2Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice2" id="choice2"
                                                                required/>
                                                        </td>
                                                        <td align="center">
                                                            <input name="radio" type="radio" value="2" />
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice3Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice3" id="choice3"
                                                                required/>
                                                        </td>
                                                        <td align="center">
                                                            <input name="radio" type="radio" value="3" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice4Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="choice4" id="answer"
                                                                required/>
                                                        </td>
                                                        <td align="center">
                                                            <input name="radio" type="radio" value="4" />
                                                        </td>

                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.DifficultyLevelLabel') }}</label>
                                    <select class="form-control input-sm" name="difficultyLevel" id="difficultyLevel" required>
                                        <option value="Easy">{{ trans('app.EasyLabel') }}</option>
                                        <option value="Medium">{{ trans('app.MediumLabel') }}</option>
                                        <option value="Hard">{{ trans('app.HardLabel') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuizNumberLabel') }}</label>
                                    <input type="number" class="form-control" name="quizNumber" id="quizNumber" value="{{$quiz->quizNumber}}" required readonly>

                                </div>


                                <button  id="addQuestionBtn"  class="btn btn-xs btn-primary">{{ trans('app.AddButton') }}</button>
                                <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">
                                    {{ trans('app.BackButton') }}
                                </a>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>

window.translations = {
    selectAnswerAlert: '{{ trans('app.SelectAnswerAlert') }}',

    };
     translation = {
        selectAnswerAlert: window.translations.selectAnswerAlert,

};
    function addQuestion() {

        var selected_question_type = $('#questionType').val();
        var check;
            if (selected_question_type === 'MultipleChoice' || selected_question_type === 'OrderOptions') {

                check = $("input[name='radio']:checked").length;
            } else if (selected_question_type === 'MultipleAnswer') {
                check = $("input[name='selected_ids[]']:checked").length;
            }else{
                check = -1;
            }
            if (check === 0) {
                alert(translation.selectAnswerAlert);
                return false;
            } else {
                return true;
            }

    }

    function chooseQuestionType() {

        var selected_question_type = $('#questionType').val(); 
        if (selected_question_type == 'MultipleChoice' || selected_question_type == 'OrderOptions') {

            $('#multipleChoice').show();
            $('#trueOrFalsePanel').hide();
            $('#fillupPanel').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();

            $("[name='choice1']").attr("required", true);
            $("[name='choice2']").attr("required", true);
            $("[name='choice3']").attr("required", true);
            $("[name='choice4']").attr("required", true);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);


        } else if (selected_question_type == 'TrueFalse') {

            $('#trueOrFalsePanel').show();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();

            $("[name='trueOrFalse']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);
            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);

        } else if (selected_question_type == 'FillUp') {

            $('#fillupPanel').show();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();

            $("[name='fillup']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);
            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);

        } else if (selected_question_type == 'NumericQuestion') {

            $('#numericQuestionPanel').show();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#multipleAnswers').hide();
            $('#fillupPanel').hide();

            $("[name='numericQuestion']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);
            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'MultipleAnswer') {

            $('#multipleAnswers').show();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();

            $("[name='choice[1]']").attr("required", true);
            $("[name='choice[2]']").attr("required", true);
            $("[name='choice[3]']").attr("required", true);
            $("[name='choice[4]']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        }

    }
</script>