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


                                <div class="form-group">
                                    <label for="add-question" style="font-weight:bold;">{{ trans('app.QuestionLabel')
                                        }}</label>
                                    <textarea class="form-control" name="question" rows="7" required></textarea>
                                </div>



                                <!-- <h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3> -->

                                <!-- <div class="form-group">
                                <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <h2 class="page-heading">Upload your Images <span id="counter"></span></h2>
            <form method="post" action="{{ url('/images-save') }}"
                  enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                  @csrf
                <div class="dz-message">
                    <div class="col-xs-8">
                        <div class="message">
                            <p>Drop files here or Click to Upload</p>
                        </div>
                    </div>
                </div>
                <div class="fallback">
                    <input type="file" name="file" multiple>
                </div>
            </form>
        </div>
    </div>

    <div id="preview" style="display: none;">
 
 <div class="dz-preview dz-file-preview">
     <div class="dz-image"><img data-dz-thumbnail /></div>

     <div class="dz-details">
         <div class="dz-size"><span data-dz-size></span></div>
         <div class="dz-filename"><span data-dz-name></span></div>
     </div>
     <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
     <div class="dz-error-message"><span data-dz-errormessage></span></div>



     <div class="dz-success-mark">

         <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
             Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch
             <title>Check</title>
             <desc>Created with Sketch.</desc>
             <defs></defs>
             <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                 <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
             </g>
         </svg>

     </div>
     <div class="dz-error-mark">

         <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
             Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch
             <title>error</title>
             <desc>Created with Sketch.</desc>
             <defs></defs>
             <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                 <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                     <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                 </g>
             </g>
         </svg>
     </div>
 </div>
</div>
                                </div> -->


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
                                        <option value="ImageType">ImageType</option>
                                        <option value="VideoType">VideoType</option>
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

                                                    <h4 style="text-align: center;color:#428bca;">Drop images in this
                                                        area <span class="glyphicon glyphicon-hand-down"></span></h4>

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
                                                            <input type="text" class="form-control" name="uploadVideo0" id="uploadVideo0"
                                                            required />

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
                                                            <input type="text" class="form-control" name="uploadVideo1" id="uploadVideo1"
                                                            required />

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
                                                            <input type="text" class="form-control" name="uploadVideo2" id="uploadVideo2"
                                                            required />

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
                                                            <input type="text" class="form-control" name="uploadVideo3" id="uploadVideo3"
                                                            required />

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
                                                <div class="dropzone"  id="myImageDropzone">

                                                    <div class="dz-message">

                                                    </div>

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>

                                                    <!-- <div class="dropzone-previews" id="dropzonePreview"></div> -->

                                                    <h4 style="text-align: center;color:#428bca;">Drop images in this
                                                        area <span class="glyphicon glyphicon-hand-down"></span></h4>

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
                                                            <input type="hidden" class="form-control" name="uploadImage0" id="uploadImage0"
                                                                 />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="0" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice2Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage1" id="uploadImage1"
                                                                 />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="1" />
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice3Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage2" id="uploadImage2"
                                                                 />

                                                        </td>
                                                        <td align="center">
                                                            <input name="imageRadio" type="radio" value="2" />
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>{{ trans('app.Choice4Label') }}</label>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="uploadImage3" id="uploadImage3"
                                                                 />

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

<script type="text/javascript">
    // Dropzone.options.myImageDropzone = {
    //     maxFilesize: 15, // MB
    //     maxFiles: 2,
    //     dictDefaultMessage: "Upload Excel.",
    //     init: function () {
    //         var known = false;
    //         this.on("success", function (file, responseText) {
    //             alert("success");
    //         });
    //         this.on('error', function () {
    //             // aler stuff
    //         });
    //         this.on("addedfile", function () {
    //             if (this.files[10] != null) {
    //                 this.removeFile(this.files[0]);
    //                 if (known === false) {
    //                     alert('Max. 10 Uploads!')
    //                     known = true;
    //                 }
    //             }
    //         });
    //     }
    // }
    // $('#myImageDropzone').dropzone();
</script>

<script>
    // var myDropzone;
    // var token = "{{ csrf_token() }}";
    // var baseUrl = "{{ url('/') }}";
    // $(document).ready(function(){
    //     alert("aa");
    //       myDropzone = new Dropzone("div#myImageDropzone3", {
    //       url: "image/upload/store",
    //       params: {
    //          _token: token
    //          // other fields, here you can also pass a function and have the function return the fields
    //          //name: $("#name").val()
    //       },
    //       autoProcessQueue:false,
    //    });
    // })

    // $("#addQuestionBtn",function(e){
    //    e.preventDefault();
    //    myDropzone.processQueue();
    // });
</script>


<script>
    //     var photo_counter = 0;
    //     Dropzone.options.realDropzone = {

    //         uploadMultiple: false,
    //         parallelUploads: 100,
    //         maxFilesize: 8,
    //         previewsContainer: '#dropzonePreview',
    //         previewTemplate: document.querySelector('#preview-template').innerHTML,
    //         addRemoveLinks: true,
    //         dictRemoveFile: 'Remove',
    //         dictFileTooBig: 'Image is bigger than 8MB',

    //         // The setting up of the dropzone
    //         init: function () {

    //             this.on("removedfile", function (file) {

    //                 $.ajax({
    //                     type: 'POST',
    //                     url: 'upload/delete',
    //                     data: {
    //                         id: file.name,
    //                         _token: $('#csrf-token').val()
    //                     },
    //                     dataType: 'html',
    //                     success: function (data) {
    //                         var rep = JSON.parse(data);
    //                         if (rep.code == 200) {
    //                             photo_counter--;
    //                             $("#photoCounter").text("(" + photo_counter + ")");
    //                         }

    //                     }
    //                 });

    //             });
    //         },
    //         error: function (file, response) {
    //             if ($.type(response) === "string")
    //                 var message = response; //dropzone sends it's own error messages in string
    //             else
    //                 var message = response.message;
    //             file.previewElement.classList.add("dz-error");
    //             _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
    //             _results = [];
    //             for (_i = 0, _len = _ref.length; _i < _len; _i++) {
    //                 node = _ref[_i];
    //                 _results.push(node.textContent = message);
    //             }
    //             return _results;
    //         },
    //         success: function (file, done) {
    //             photo_counter++;
    //             $("#photoCounter").text("(" + photo_counter + ")");
    //         }
    //     }
</script>

<script>
    // Dropzone.autoDiscover = false;

    // $("#myImageDropzone").dropzone({
    //     alert("hellooo");
    //                 url: "http://examle.com/upload_video",
    //                 clickable: true,
    //                 uploadmultipe:true,
    //                 maxFilesize: 20,
    //                 init: function() {
    //     this.on("queuecomplete", function(file, serverresponse) { window.location.href="http://example.com/your_awesome_profile"; });               
    //   }
    //             });
    //     Dropzone.options.myImageDropzone4 = { // The camelized version of the ID of the form element
    // alert("hello");
    //         // The configuration we've talked about above
    //         autoProcessQueue: false,
    //         uploadMultiple: true,
    //         parallelUploads: 100,
    //         maxFiles: 3,

    //         // The setting up of the dropzone
    //         init: function () {
    //             var myDropzone = this;

    //             // First change the button to actually tell Dropzone to process the queue.
    //             // this.element.querySelector("button[type=submit]").addEventListener("click", function (e) {
    //             //     // Make sure that the form isn't actually being sent.
    //             //     e.preventDefault();
    //             //     e.stopPropagation();
    //             //     myDropzone.processQueue();
    //             // });

    //             // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    //             // of the sending event because uploadMultiple is set to true.
    //             this.on("sendingmultiple", function () {
    //                 // Gets triggered when the form is actually being sent.
    //                 // Hide the success button or the complete form.
    //             });
    //             this.on("successmultiple", function (files, response) {
    //                 alert("hi");
    //                 // Gets triggered when the files have successfully been sent.
    //                 // Redirect user or notify of success.
    //             });
    //             this.on("errormultiple", function (files, response) {
    //                 // Gets triggered when there was an error sending the files.
    //                 // Maybe show form again, and notify user of error
    //             });
    //         }

    //     }
</script>
<script type="text/javascript">
    //     Dropzone.options.myImageDropzonee = {
    //             maxFilesize: 12,
    //             renameFile: function (file) {
    //                 var dt = new Date();
    //                 var time = dt.getTime();
    //                 return time + file.name;
    //             },
    //             autoProcessQueue: false,
    //             uploadMultiple: true,
    //             acceptedFiles: ".jpeg,.jpg,.png,.gif",
    //             parallelUploads: 5,
    //             maxFiles: 5,
    //             addRemoveLinks: true,
    //             timeout: 50000,

    //             init: function () {
    //                 this.on('success', function( file, resp ){
    //                     alert(resp);
    //                     });
    //                     // var submitButton = document.querySelector("#addQuestionBtn")
    //                     // myDropzone = this; // closure

    //                     // submitButton.addEventListener("click", function () {
    //                     //     myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    //                     // });
    //                     this.on('addedfile', function (file) {
    //                         alert(renameFile);
    //                         if (this.files.length > 4) {
    //                             this.removeFile(this.files[0]);
    //                         }
    //                     });
    //                 },

    //                 removedfile: function (file) {
    //                     var name = file.upload.filename;
    //                     $.ajax({
    //                         headers: {
    //                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //                         },
    //                         type: 'POST',
    //                         url: '{{ url("image/delete") }}',
    //                         data: {
    //                             filename: name
    //                         },
    //                         success: function (data) {
    //                             console.log("File has been successfully removed!!");
    //                         },
    //                         error: function (e) {
    //                             console.log(e);
    //                         }
    //                     });
    //                     var fileRef;
    //                     return (fileRef = file.previewElement) != null ?
    //                         fileRef.parentNode.removeChild(file.previewElement) : void 0;
    //                 },

    //                 success: function (file, response) {
    //                     alert(response);
    //                     console.log(response);
    //                 },
    //                 error: function (file, response) {
    //                     return false;
    //                 }
    //             };
</script>

<script>
    window.translations = {selectAnswerAlert: '{{ trans('app.SelectAnswerAlert ') }}',};
    translation = {selectAnswerAlert: window.translations.selectAnswerAlert,};

    function addQuestion() {

        var selected_question_type = $('#questionType').val();
        var check;
        var val;
        var imageCheck;
        var videoCheck;
        if (selected_question_type === 'MultipleChoice' || selected_question_type === 'OrderOptions') {

            check = $("input[name='radio']:checked").length;
        } else if (selected_question_type === 'MultipleAnswer') {
            check = $("input[name='selected_ids[]']:checked").length;
        } else if (selected_question_type === 'ImageType') {
            check = $("input[name='imageRadio']:checked").length;
            for(i=0; i<4; i++){
                val = $('#uploadImage'+i).val();
                if(val == "" || val == "undefined"){
                    imageCheck = 0;
                }
            }
        } else if (selected_question_type === 'VideoType') {
            check = $("input[name='videoRadio']:checked").length;
                val = $('#uploadVideo').val();
                if(val == "" || val == "undefined"){
                    videoCheck = 0;
                }
        }else {
            check = -1;
            imageCheck = -1;
            videoCheck = -1;
        }
        if(imageCheck === 0){
            alert("Please add four images");
            return false;
        } else if(videoCheck === 0){
            alert("Please add atleast one video");
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

            $('#multipleChoice').show();
            $('#trueOrFalsePanel').hide();
            $('#fillupPanel').hide();
            $('#multipleAnswers').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').hide();

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
            $("[name='uploadVideo3']").attr("required", false)
            ;
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

            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'ImageType') {

            // var element = document.getElementById("addQuestionForm");
            //     element.classList.add("dropzone");
            //$( "#addQuestionForm" ).last().addClass( "dropzone" );


            $('#multipleAnswers').hide();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();
            $('#videoUploadPanel').hide();
            $('#imageUploadPanel').show();

            // $("[name='uploadImage0']").attr("required", true);
            // $("[name='uploadImage1']").attr("required", true);
            // $("[name='uploadImage2']").attr("required", true);
            // $("[name='uploadImage3']").attr("required", true);

            $("[name='choice[1]']").attr("required", false);
            $("[name='choice[2]']").attr("required", false);
            $("[name='choice[3]']").attr("required", false);
            $("[name='choice[4]']").attr("required", false);


            $("[name='uploadVideo0']").attr("required", false);
            $("[name='uploadVideo1']").attr("required", false);
            $("[name='uploadVideo2']").attr("required", false);
            $("[name='uploadVideo3']").attr("required", false);

            $("[name='choice1']").attr("required", false);
            $("[name='choice2']").attr("required", false);
            $("[name='choice3']").attr("required", false);
            $("[name='choice4']").attr("required", false);
            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

        } else if (selected_question_type == 'VideoType') {

            // var element = document.getElementById("addQuestionForm");
            //     element.classList.add("dropzone");
            //$( "#addQuestionForm" ).last().addClass( "dropzone" );


            $('#multipleAnswers').hide();
            $('#trueOrFalsePanel').hide();
            $('#multipleChoice').hide();
            $('#fillupPanel').hide();
            $('#numericQuestionPanel').hide();
            $('#imageUploadPanel').hide();
            $('#videoUploadPanel').show();

            
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
            $("[name='numericQuestion']").attr("required", false);
            $("[name='fillup']").attr("required", false);
            $("[name='trueOrFalse']").attr("required", false);

            }

    }
</script>