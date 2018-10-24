@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.AddQuestionHeader') }}</div>

                <div class="card-body">

                    <form onsubmit="return addQuestion();" method="POST" action="{{ route('question.store') }}">
                        @csrf @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <input type="hidden" name="addEditPage" id="addEditPage" value='addPage'>
                        <input type="hidden" name="uploadVideo" id="uploadVideo">
                        <input type="hidden" name="uploadSingleImage" id="uploadSingleImage">
                        <div class="form-group row">
                            <div class="offset-md-2 col-md-8">
                                @foreach($questions as $question) @endforeach @if (count($questions) == 0)
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">{{ trans('app.QuestionNumberLabel') }}</label>
                                    <input type="number" class="form-control" name="questionNumber" id="questionNumber"
                                        value="1" readonly required>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">{{ trans('app.QuestionNumberLabel') }}</label>
                                    <input type="number" class="form-control" name="questionNumber" id="questionNumber"
                                        value="{{$question->questionNumber+1}}" readonly required>
                                </div>
                                @endif


                                <div class="form-group" id="questionForm">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuestionLabel')
                                        }}</label>
                                    <textarea class="form-control" name="question" rows="7" required></textarea>
                                </div>

                                <div class="form-group" id="orderOptionsForm" style="display:none;">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuestionLabel')
                                        }}</label>
                                    <textarea class="form-control" col="10" id="orderOptionsQuestion" name="orderOptionsQuestion"
                                        rows="7" required>Description:&#13;&#10;&#13;&#10;Order 1. &#13;&#10;Order 2. &#13;&#10;Order 3. &#13;&#10;Order 4. &#13;&#10;</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{
                                        trans('app.QuestionTypeLabel') }}</label>
                                    <select class="form-control input-sm" name="questionType" id="questionType"
                                        onchange="chooseQuestionType()" required>
                                        <option value="MultipleChoice">{{ trans('app.MultipleChoiceQT') }}</option>
                                        <option value="TrueFalse">{{ trans('app.TrueOrFalseQT') }}</option>
                                        <option value="FillUp">{{ trans('app.FillupQT') }}</option>
                                        <option value="NumericQuestion">{{ trans('app.NumericQT') }}</option>
                                        <option value="OrderOptions">{{ trans('app.OrderOptionsQT') }}</option>
                                        <option value="MultipleAnswer">{{ trans('app.MultipleAnswerQT') }}</option>
                                        <option value="ImageAsOptions">{{ trans('app.ImageAsOptionsQT') }}</option>
                                        <option value="ImageType">{{ trans('app.ImageTypeQT') }}</option>
                                        <option value="VideoType">{{ trans('app.VideoTypeQT') }}</option>
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

                                <div class="videoUploadPanel" id="videoUploadPanel" style="display:none;">
                                    <div class="form-group row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="dropzone" id="myVideoDropzone">

                                                    <div class="dz-message">

                                                    </div>

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>

                                                    <div class="dropzone-previews" id="dropzonePreview"></div>

                                                    <h4 style="text-align: center;color:#428bca;">{{
                                                        trans('app.VideoTypeDZmsg') }}<span class="glyphicon glyphicon-hand-down"></span></h4>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <table id="videoAnswerTable" width="70%">
                                                    <tr>
                                                        <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%">
                                                            <label>{{ trans('app.Choice1Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadVideo0"
                                                                id="uploadVideo0" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="videoRadio" type="radio" value="0" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice2Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadVideo1"
                                                                id="uploadVideo1" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="videoRadio" type="radio" value="1" />
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice3Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadVideo2"
                                                                id="uploadVideo2" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="videoRadio" type="radio" value="2" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice4Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadVideo3"
                                                                id="uploadVideo3" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="videoRadio" type="radio" value="3" />
                                                        </td>

                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="imageUploadPanel" id="imageUploadPanel" style="display:none;">
                                    <div class="form-group row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="dropzone" id="myImageDropzone">

                                                    <div class="dz-message">

                                                    </div>

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>

                                                    <div class="dropzone-previews" id="dropzonePreview"></div>

                                                    <h4 style="text-align: center;color:#428bca;">{{
                                                        trans('app.ImageTypeDZmsg') }}<span class="glyphicon glyphicon-hand-down"></span></h4>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <table id="imageAnswerTable" width="70%">
                                                    <tr>
                                                        <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%">
                                                            <label>{{ trans('app.Choice1Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadSingleImage0"
                                                                id="uploadSingleImage0" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="singleImageRadio" type="radio" value="0" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice2Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadSingleImage1"
                                                                id="uploadSingleImage1" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="singleImageRadio" type="radio" value="1" />
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice3Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadSingleImage2"
                                                                id="uploadSingleImage2" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="singleImageRadio" type="radio" value="2" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice4Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="uploadSingleImage3"
                                                                id="uploadSingleImage3" required />

                                                        </td>
                                                        <td align="center">
                                                            <input name="singleImageRadio" type="radio" value="3" />
                                                        </td>

                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="imageAsOptionsPanel" id="imageAsOptionsPanel" style="display:none;">
                                    <div class="form-group row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <div class="dropzone" id="imageAsOptionsDropzone">

                                                    <div class="dz-message">

                                                    </div>

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>

                                                    <!-- <div class="dropzone-previews" id="dropzonePreview"></div> -->

                                                    <h4 style="text-align: center;color:#428bca;">{{
                                                        trans('app.ImageAsOptionsDZmsg') }}<span class="glyphicon glyphicon-hand-down"></span></h4>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <table id="imageAsOptionTable" width="70%">
                                                    <tr>
                                                        <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%">
                                                            <!-- <label>{{ trans('app.Choice1Label') }}</label> -->
                                                            <label>{{ trans('app.Image1Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage0"
                                                                id="uploadImage0" />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="0" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!-- <label>{{ trans('app.Choice2Label') }}</label> -->
                                                            <label>{{ trans('app.Image2Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage1"
                                                                id="uploadImage1" />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="1" />
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <!-- <label>{{ trans('app.Choice3Label') }}</label> -->
                                                            <label>{{ trans('app.Image3Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage2"
                                                                id="uploadImage2" />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="2" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!-- <label>{{ trans('app.Choice4Label') }}</label> -->
                                                            <label>{{ trans('app.Image4Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage3"
                                                                id="uploadImage3" />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="3" />
                                                        </td>

                                                    </tr>
                                                </table>
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
                                                            <input type="text" class="form-control" name="choice[1]" id="choice1" />
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
                                                            <input type="text" class="form-control" name="choice[2]" id="choice2" />
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
                                                            <input type="text" class="form-control" name="choice[3]" id="choice3" />
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
                                                            <input type="text" class="form-control" name="choice[4]" id="answer" />
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
                                                                required />
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
                                                                required />
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
                                                                required />
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
                                                                required />
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
                                    <label for="add-question" style="font-weight:bold;">{{
                                        trans('app.DifficultyLevelLabel') }}</label>
                                    <select class="form-control input-sm" name="difficultyLevel" id="difficultyLevel"
                                        required>
                                        <option value="Easy">{{ trans('app.EasyLabel') }}</option>
                                        <option value="Medium">{{ trans('app.MediumLabel') }}</option>
                                        <option value="Hard">{{ trans('app.HardLabel') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuizNumberLabel')
                                        }}</label>
                                    <input type="number" class="form-control" name="quizNumber" id="quizNumber" value="{{$quiz->quizNumber}}"
                                        required readonly>

                                </div>


                                <button class="buttonStyle" id="addQuestionBtn" class="btn btn-xs btn-primary">{{
                                    trans('app.AddButton') }}</button>
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
        oneImageAlert: '{{ trans('app.AddOneImageAlert') }}',
        fourImageAlert: '{{ trans('app.AddFourImageAlert') }}',
        oneVideoAlert: '{{ trans('app.AddOneVideoAlert') }}',
    };
    translation = {
        selectAnswerAlert: window.translations.selectAnswerAlert,
        oneImageAlert: window.translations.oneImageAlert,
        fourImageAlert: window.translations.fourImageAlert,
        oneVideoAlert: window.translations.oneVideoAlert,
    };


    function addQuestion() {

        var selected_question_type = $('#questionType').val();
        var check;
        var val;
        var imageCheck;
        var singleImageCheck;
        var videoCheck;
        if (selected_question_type === 'MultipleChoice' || selected_question_type === 'OrderOptions') {

            check = $("input[name='radio']:checked").length;
        } else if (selected_question_type === 'MultipleAnswer') {
            check = $("input[name='selected_ids[]']:checked").length;
        } else if (selected_question_type === 'ImageAsOptions') {
            check = $("input[name='imageRadio']:checked").length;
            for (i = 0; i < 4; i++) {
                val = $('#uploadImage' + i).val();
                if (val == "" || val == "undefined") {
                    imageCheck = 0;
                }
            }
        } else if (selected_question_type === 'VideoType') {
            check = $("input[name='videoRadio']:checked").length;
            val = $('#uploadVideo').val();
            if (val == "" || val == "undefined") {
                videoCheck = 0;
            }
        } else if (selected_question_type === 'ImageType') {
            check = $("input[name='singleImageRadio']:checked").length;
            val = $('#uploadSingleImage').val();
            if (val == "" || val == "undefined") {
                singleImageCheck = 0;
            }
        } else {
            check = -1;
            imageCheck = -1;
            videoCheck = -1;
            singleImageCheck = -1;
        }
        if (imageCheck === 0) {
            alert(translation.fourImageAlert);
            return false;
        } else if (videoCheck === 0) {
            alert(translation.oneVideoAlert);
            return false;
        } else if (singleImageCheck === 0) {
            alert(translation.oneImageAlert);
            return false;
        } else if (check === 0) {

            alert(translation.selectAnswerAlert);

            return false;
        } else {
            return true;
        }

    }

    function chooseQuestionType() {

        var selected_question_type = $('#questionType').val();

        if (selected_question_type == 'MultipleChoice' || selected_question_type == 'OrderOptions') {

            if (selected_question_type == 'OrderOptions') {
                $('#orderOptionsForm').show();
                $('#questionForm').hide();
                $("[name='question']").attr("required", false);

                var readOnlyLength = $('#orderOptionsQuestion').val().length;


                $('#orderOptionsQuestion').on('keypress, keydown', function (event) {

                    var $field = $(this);

                    if ((event.which != 37 && (event.which != 39)) &&
                        ((this.selectionStart < readOnlyLength) ||
                            ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
                        return false;
                    }
                });

            }


            $('#multipleChoice').show();
            $('#trueOrFalsePanel').hide();
            $('#fillupPanel').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageAsOptionsPanel').hide();

            $("[name='choice1']").attr("required", true);
            $("[name='choice2']").attr("required", true);
            $("[name='choice3']").attr("required", true);
            $("[name='choice4']").attr("required", true);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);

            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);


        } else if (selected_question_type == 'TrueFalse') {

            $('#trueOrFalsePanel').show();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageAsOptionsPanel').hide();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);

            $("[name='trueOrFalse']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);

            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='fillup']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);

        } else if (selected_question_type == 'FillUp') {

            $('#fillupPanel').show();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageAsOptionsPanel').hide();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);

            $("[name='fillup']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);

            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='trueOrFalse']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);

        } else if (selected_question_type == 'NumericQuestion') {

            $('#numericQuestionPanel').show();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#multipleAnswers').hide();
            $('#fillupPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageAsOptionsPanel').hide();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);

            $("[name='numericQuestion']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);

            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'MultipleAnswer') {

            $('#multipleAnswers').show();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageAsOptionsPanel').hide();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);

            $("[name='choice[1]']").attr("required", true);
            $("[name='choice[2]']").attr("required", true);
            $("[name='choice[3]']").attr("required", true);
            $("[name='choice[4]']").attr("required", true);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);

            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'ImageAsOptions') {

            $('#multipleAnswers').hide();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageUploadPanel').hide();
            $('#imageAsOptionsPanel').show();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);


            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'VideoType') {


            $('#multipleAnswers').hide();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').show();
            $('#imageAsOptionsPanel').hide();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);


            $("[name='uploadVideo0']").attr("required", true);
            $("[name='uploadVideo1']").attr("required", true);
            $("[name='uploadVideo2']").attr("required", true);
            $("[name='uploadVideo3']").attr("required", true);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", false);
            $("[name='uploadSingleImage1']").attr("required", false);
            $("[name='uploadSingleImage2']").attr("required", false);
            $("[name='uploadSingleImage3']").attr("required", false);

            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'ImageType') {

            $('#multipleAnswers').hide();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').show();
            $('#videoUploadPanel').hide();
            $('#imageAsOptionsPanel').hide();
            $('#orderOptionsForm').hide();

            $("[name='orderOptionsQuestion']").attr("required", false);


            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);

            $("[name='uploadSingleImage0']").attr("required", true);
            $("[name='uploadSingleImage1']").attr("required", true);
            $("[name='uploadSingleImage2']").attr("required", true);
            $("[name='uploadSingleImage3']").attr("required", true);

            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        }

    }
</script>