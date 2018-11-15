@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.EditQuestionHeader') }}</div>

                <div class="card-body">
                    <form onsubmit="return editQuestion();" method="POST" action="{{route('update.question', $question->id)}}">
                        @csrf
                        <input type="hidden" name="addEditPage" id="addEditPage" value='editPage'>
                        <input type="hidden" name="questionType" id="questionType" value='{{$question->questionType}}'>
                        <input type="hidden" name="imageChoice0" id="imageChoice0" value='{{$question->choice1}}'>
                        <input type="hidden" name="imageChoice1" id="imageChoice1" value='{{$question->choice2}}'>
                        <input type="hidden" name="imageChoice2" id="imageChoice2" value='{{$question->choice3}}'>
                        <input type="hidden" name="imageChoice3" id="imageChoice3" value='{{$question->choice4}}'>
                        <input type="hidden" name="videoName" id="videoName" value='{{$question->imgFileName}}'>
                        <input type="hidden" name="imageName" id="imageName" value='{{$question->imgFileName}}'>
                        <input type="hidden" name="uploadVideo" id="uploadVideo" value='{{$question->imgFileName}}'>
                        <input type="hidden" name="uploadSingleImage" id="uploadSingleImage" value='{{$question->imgFileName}}'>
                        <input type="hidden" name="redirects_to" id="redirects_to" value='{{URL::previous()}}'>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif


                        <div class="form-group row">
                            <div class="offset-md-2 col-md-8">

                                <div class="form-group">
                                    <label for="add-question">{{ trans('app.QuestionLabel') }}</label>
                                    <textarea class="form-control" name="question" rows="10" required>{{$question->question}}</textarea>
                                </div>

                                @if ($question->questionType == 'MultipleChoice' || $question->questionType ==
                                'OrderOptions')
                                <div class="form-group">

                                    <table width="70%">
                                        <tr>
                                            <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                        </tr>
                                        <tr>
                                            <td width="15%">
                                                <label><label>{{ trans('app.Choice1Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice1}}'
                                                    name="choice1" id="choice1" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="1" <?php echo ($question->answer
                                                == $question->choice1)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice2Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice2}}'
                                                    name="choice2" id="choice2" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="2" <?php echo ($question->answer
                                                == $question->choice2)?'checked':'' ?>/></td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice3Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice3}}'
                                                    name="choice3" id="choice3" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="3" <?php echo ($question->answer
                                                == $question->choice3)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice4Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice4}}'
                                                    name="choice4" id="answer" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="4" <?php echo ($question->answer
                                                == $question->choice4)?'checked':'' ?>/></td>

                                        </tr>
                                    </table>

                                </div>
                                @endif
                                @if ($question->questionType == 'ImageAsOptions')

                                <div class="form-group">
                                    <div class="dropzone" id="imageAsOptionsDropzone">

                                        <div class="dz-message">

                                        </div>

                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>

                                        <div class="dropzone-previews" id="dropzonePreview"></div>

                                        <h4 style="text-align: center;color:#428bca;">{{
                                            trans('app.ImageAsOptionsDZmsg') }}<span class="glyphicon glyphicon-hand-down"></span></h4>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <table width="70%">
                                        <tr>
                                            <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                        </tr>
                                        <tr>
                                            <td width="15%">
                                                <label>{{ trans('app.Image1Label') }}</label>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" value='{{$question->choice1}}'
                                                    name="choice1" id="uploadImage0" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="1" <?php echo ($question->answer
                                                == $question->choice1)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label>{{ trans('app.Image2Label') }}</label>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" value='{{$question->choice2}}'
                                                    name="choice2" id="uploadImage1" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="2" <?php echo ($question->answer
                                                == $question->choice2)?'checked':'' ?>/></td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <label>{{ trans('app.Image3Label') }}</label>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" value='{{$question->choice3}}'
                                                    name="choice3" id="uploadImage2" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="3" <?php echo ($question->answer
                                                == $question->choice3)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label>{{ trans('app.Image4Label') }}</label>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" value='{{$question->choice4}}'
                                                    name="choice4" id="uploadImage3" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="4" <?php echo ($question->answer
                                                == $question->choice4)?'checked':'' ?>/></td>

                                        </tr>
                                    </table>

                                </div>
                                @endif
                                @if ($question->questionType == 'ImageType')

                                <div class="form-group">
                                    <div class="dropzone" id="myImageDropzone">

                                        <div class="dz-message">

                                        </div>

                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>

                                        <div class="dropzone-previews" id="dropzonePreview"></div>

                                        <h4 style="text-align: center;color:#428bca;">{{ trans('app.ImageTypeDZmsg') }}<span
                                                class="glyphicon glyphicon-hand-down"></span></h4>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <table width="70%">
                                        <tr>
                                            <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                        </tr>
                                        <tr>
                                            <td width="15%">
                                                <label><label>{{ trans('app.Choice1Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice1}}'
                                                    name="choice1" id="uploadSingleImage0" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="1" <?php echo ($question->answer
                                                == $question->choice1)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice2Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice2}}'
                                                    name="choice2" id="uploadSingleImage1" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="2" <?php echo ($question->answer
                                                == $question->choice2)?'checked':'' ?>/></td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice3Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice3}}'
                                                    name="choice3" id="uploadSingleImage2" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="3" <?php echo ($question->answer
                                                == $question->choice3)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice4Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice4}}'
                                                    name="choice4" id="uploadSingleImage3" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="4" <?php echo ($question->answer
                                                == $question->choice4)?'checked':'' ?>/></td>

                                        </tr>
                                    </table>

                                </div>
                                @endif
                                @if ($question->questionType == 'VideoType')

                                <div class="form-group">
                                    <div class="dropzone" id="myVideoDropzone">

                                        <div class="dz-message">

                                        </div>

                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>

                                        <div class="dropzone-previews" id="dropzonePreview"></div>

                                        <h4 style="text-align: center;color:#428bca;">{{ trans('app.VideoTypeDZmsg') }}<span
                                                class="glyphicon glyphicon-hand-down"></span></h4>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <table width="70%">
                                        <tr>
                                            <label>{{ trans('app.MultipleChoiceDesc') }}</label>
                                        </tr>
                                        <tr>
                                            <td width="15%">
                                                <label><label>{{ trans('app.Choice1Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice1}}'
                                                    name="choice1" id="uploadVideo0" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="1" <?php echo ($question->answer
                                                == $question->choice1)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice2Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice2}}'
                                                    name="choice2" id="uploadVideo1" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="2" <?php echo ($question->answer
                                                == $question->choice2)?'checked':'' ?>/></td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice3Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice3}}'
                                                    name="choice3" id="uploadVideo2" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="3" <?php echo ($question->answer
                                                == $question->choice3)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice4Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice4}}'
                                                    name="choice4" id="uploadVideo3" />
                                            </td>
                                            <td align="center">
                                                <input name="radio" type="radio" value="4" <?php echo ($question->answer
                                                == $question->choice4)?'checked':'' ?>/></td>

                                        </tr>
                                    </table>

                                </div>
                                @endif @if ($question->questionType == 'MultipleAnswer')
                                <div class="form-group">

                                    <table width="70%">
                                        <tr>
                                            <label>{{ trans('app.MultipleAnswersDesc') }}</label>
                                        </tr>
                                        <tr>
                                            <td width="15%">
                                                <label><label>{{ trans('app.Choice1Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice1}}'
                                                    name="choice[1]" id="choice1" />
                                            </td>
                                            <td align="center">
                                                <input name="selected_ids[]" <?php echo (strpos($question->answer,
                                                $question->choice1) !== false)?'checked':'' ?> type="checkbox"
                                                value="1"/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice2Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice2}}'
                                                    name="choice[2]" id="choice2" />
                                            </td>
                                            <td align="center">
                                                <input name="selected_ids[]" type="checkbox" value="2" <?php echo
                                                    (strpos($question->answer, $question->choice2) !==
                                                false)?'checked':'' ?>/></td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice3Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice3}}'
                                                    name="choice[3]" id="choice3" />
                                            </td>
                                            <td align="center">
                                                <input name="selected_ids[]" type="checkbox" value="3" <?php echo
                                                    (strpos($question->answer, $question->choice3) !==
                                                false)?'checked':'' ?>/></td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><label>{{ trans('app.Choice4Label') }}</label></label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value='{{$question->choice4}}'
                                                    name="choice[4]" id="answer" />
                                            </td>
                                            <td align="center">
                                                <input name="selected_ids[]" type="checkbox" value="4" <?php echo
                                                    (strpos($question->answer, $question->choice4) !==
                                                false)?'checked':'' ?>/></td>

                                        </tr>
                                    </table>

                                </div>
                                @endif @if ($question->questionType == 'TrueFalse')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="form-group">
                                            <label for="">{{ trans('app.AnswerLabel') }}</label>
                                            <select class="form-control input-sm" name="trueOrFalse" id="trueOrFalse">
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
                                            <input type="text" class="form-control" name="fillup" id="fillup" value='{{$question->answer}}'>
                                        </div>
                                    </div>
                                </div>
                                @endif @if ($question->questionType == 'NumericQuestion')
                                <div class="form-group row">
                                    <div class="col-md-7 offset-md-2">
                                        <div class="form-group">
                                            <label for="add-question">{{ trans('app.AnswerLabel') }}</label>
                                            <input type="number" class="form-control" name="numericQuestion" id="numericQuestion"
                                                value='{{$question->answer}}'>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ trans('app.RangeLabel') }}</label>
                                            <select class="form-control input-sm" name="isRangeAllowed" id="isRangeAllowed">
                                                @if ($question->isRangeAllowed == 'Yes')
                                                <option value="Yes" selected="selected">{{ trans('app.RangeYesLabel')
                                                    }}</option>
                                                <option value="No">{{ trans('app.RangeNoLabel') }}</option>
                                                @endif @if ($question->isRangeAllowed == 'No')
                                                <option value="Yes">{{ trans('app.RangeYesLabel') }}</option>
                                                <option value="No" selected="selected">{{ trans('app.RangeNoLabel') }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{
                                        trans('app.DifficultyLevelLabel') }}</label>
                                    <select class="form-control input-sm" name="difficultyLevel" id="difficultyLevel"
                                        selected='{{$question->difficultyLevel}}' required>
                                        @if ($question->difficultyLevel == 'Easy')
                                        <option value="Easy" selected="selected">{{ trans('app.EasyLabel') }}</option>
                                        <option value="Medium">{{ trans('app.MediumLabel') }}</option>
                                        <option value="Hard">{{ trans('app.HardLabel') }}</option>
                                        @elseif ($question->difficultyLevel == 'Medium')
                                        <option value="Easy">{{ trans('app.EasyLabel') }}</option>
                                        <option value="Medium" selected="selected">{{ trans('app.MediumLabel') }}</option>
                                        <option value="Hard">{{ trans('app.HardLabel') }}</option>
                                        @elseif ($question->difficultyLevel == 'Hard')
                                        <option value="Easy">{{ trans('app.EasyLabel') }}</option>
                                        <option value="Medium">{{ trans('app.MediumLabel') }}</option>
                                        <option value="Hard" selected="selected">{{ trans('app.HardLabel') }}</option>
                                        @endif
                                    </select>
                                </div>

                                <input type="hidden" name="quizNumber" id="quizNumber" value='{{$question->quizNumber}}'>

                                <button type="submit" class="btn btn-xs btn-primary">{{ trans('app.UpdateButton') }}</button>
                                <a class="btn btn-danger" onclick='return backClicked()' href="{{ route('view.questions',$question->quizNumber) }}">
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

<script type="text/javascript">
    window.translations = {
        selectAnswerAlert: '{{ trans('app.SelectAnswerAlert') }}',
        oneImageAlert: '{{ trans('app.AddOneImageAlert') }}',
        fourImageAlert: '{{ trans('app.AddFourImageAlert') }}',
        oneVideoAlert: '{{ trans('app.AddOneVideoAlert') }}',
        imageChangedAlert: '{{ trans('app.ImageChangedAlert') }}',
        videoChangedAlert: '{{ trans('app.VideoChangedAlert') }}',
    };
    translation = {
        selectAnswerAlert: window.translations.selectAnswerAlert,
        oneImageAlert: window.translations.oneImageAlert,
        fourImageAlert: window.translations.fourImageAlert,
        oneVideoAlert: window.translations.oneVideoAlert,
        imageChangedAlert: window.translations.imageChangedAlert,
        videoChangedAlert: window.translations.videoChangedAlert,
    };

    function backClicked() {
        var dbVal;
        var val;
        var check;
        var selected_question_type = $('#questionType').val();
        if (selected_question_type === 'ImageAsOptions') {
            for (i = 0; i < 4; i++) {
                val = $('#uploadImage' + i).val();
                dbVal = $('#imageChoice' + i).val();
                if (val != dbVal) {
                    alert(translation.imageChangedAlert);
                    return false
                }
            }
        } else if (selected_question_type === 'VideoType') {
            val = $('#uploadVideo').val();
            dbVal = $('#videoName').val();
            if (val != dbVal) {
                alert(translation.videoChangedAlert);
                return false
            }
        } else if (selected_question_type === 'ImageType') {
            val = $('#uploadSingleImage').val();
            dbVal = $('#imageName').val();
            if (val != dbVal) {
                alert(translation.imageChangedAlert);
                return false
            }
        }

    }

    function editQuestion() {


        var selected_question_type = $('#questionType').val();

        var check;
        var val;

        if (selected_question_type === 'MultipleChoice' || selected_question_type === 'OrderOptions') {

            check = $("input[name='radio']:checked").length;
        } else if (selected_question_type === 'MultipleAnswer') {
            check = $("input[name='selected_ids[]']:checked").length;
        } else if (selected_question_type === 'ImageAsOptions') {
            for (i = 0; i < 4; i++) {
                val = $('#uploadImage' + i).val();
                if (val == "" || val == "undefined") {
                    check = 0;
                }
            }
        } else if (selected_question_type === 'VideoType') {

            val = $('#uploadVideo').val();

            if (val == "" || val == "undefined") {
                check = 0;
            }

        } else if (selected_question_type === 'ImageType') {

            val = $('#uploadSingleImage').val();

            if (val == "" || val == "undefined") {
                check = 0;
            }

        } else {
            check = -1;
        }
        if (check === 0) {
            if (selected_question_type === 'ImageAsOptions') {
                alert(translation.fourImageAlert);
            } else if (selected_question_type === 'ImageType') {
                alert(translation.oneImageAlert);
            } else if (selected_question_type === 'VideoType') {
                alert(translation.oneVideoAlert);
            } else {
                alert(translation.selectAnswerAlert);
            }
            return false;
        } else {
            return true;
        }

    }

    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
