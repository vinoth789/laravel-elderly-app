<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digital School') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/language.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="assets/sass/app.scss" type="text/scss" /> -->

    <!-- <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script> -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <script type="text/javascript">
        var myImageDropzone;
        var myVideoDropzone;
        var imageAsOptionsDropzone;
        var token = "{{ csrf_token() }}";
        var photo_counter = 0;
        var imageFiles = [];
        var videoFiles = [];
        var imgName = [];
        var removeVideo = true;
        var removeImage = true;
        var videoName;
        var singleImageName;

        $(document).ready(function () {

            var page = $('#addEditPage').val();

            if (page == "editPage") {
                for (var i = 0; i < 4; i++) {
                    var image = $('#uploadImage' + i).val();
                    imgName.push(image);
                }
                videoName = $('#videoName').val();
                singleImageName = $('#imageName').val();

            }
            if (document.getElementById('imageAsOptionsDropzone')) {
                Dropzone.autoDiscover = false;
                imageAsOptionsDropzone = new Dropzone("div#imageAsOptionsDropzone", {
                    url: "image/upload/store",
                    params: {
                        _token: token
                    },
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + file.name;
                    },
                    maxFilesize: 500, // MB
                    //maxFiles: 4,
                    acceptedFiles: ".jpeg,.jpg,.png",
                    addRemoveLinks: true,
                    dictRemoveFile: 'Remove file',
                    autoProcessQueue: true,
                    uploadMultiple: false,
                    parallelUploads: 1,

                    init: function () {

                        var known = false;

                        var myDropzoneInstance = this;

                        if (page == "editPage") {

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': token
                                },
                                type: 'GET',
                                url: '{{ url("server/image") }}',
                                data: {
                                    filenames: imgName
                                },

                                success: function (data) {

                                    $.each(data.imageNameWithSize, function (key, value) {

                                        var mockFile = {
                                            filename: value.imageName,
                                            size: value.size,
                                            type: value.mimetype,
                                            accepted: true,
                                            acceptedFiles: ".png, .jpg, .jpeg",
                                        };


                                        myDropzoneInstance.emit("addedfile",
                                            mockFile);
                                        myDropzoneInstance.emit("thumbnail",
                                            mockFile, "/img/" + value.imageName
                                        );
                                        imageFiles.push(value.imageName);
                                        myDropzoneInstance.files.push(mockFile);
                                        myDropzoneInstance.emit("complete",
                                            mockFile);

                                    });

                                    photo_counter = 4;
                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });


                        }

                        this.on("success", function (file, responseText) {


                            imageFiles.push(responseText.imageName);

                            if (photo_counter < 4) {
                                document.getElementById("uploadImage" + photo_counter).value =
                                    responseText.imageName;
                                photo_counter++;
                            }
                            if (photo_counter > 3) {
                                photo_counter = 4;
                            }

                        });
                        this.on('error', function (response) {


                        });
                        this.on("processing", function (file) {
                            this.options.url = '/image/upload/store';
                            $.post({
                                url: '/image/upload/store',
                                headers: {
                                    'X-CSRF-TOKEN': token
                                },
                                data: {
                                    fileType: "image",
                                    _token: token
                                },
                                dataType: 'json',
                                success: function (data) {

                                }
                            });
                        });
                        this.on("complete", function (file) {

                            if (imageFiles.length > 4) {

                                this.removeFile(this.files[4]);
                                if (known === false) {
                                    alert('Max. 4 Uploads!')
                                    known = true;
                                }
                            }

                        });
                        this.on("removedfile", function (file) {

                            if (file.constructor.name == "File") {
                                var name = file.upload.filename;

                            } else {
                                var name = file.filename;

                            }

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': token
                                },
                                type: 'POST',
                                url: '{{ url("image/delete") }}',
                                data: {
                                    filename: name
                                },
                                success: function (data) {

                                    if (imageFiles.length > 0 && imageFiles.length <
                                        5) {
                                        for (var i = 0; i < 4; i++) {
                                            if (document.getElementById(
                                                    "uploadImage" + i).value ===
                                                data) {

                                                var index = imageFiles.indexOf(
                                                    data);
                                                imageFiles.splice(index, 1);
                                            }
                                            document.getElementById(
                                                "uploadImage" +
                                                i).value = "";
                                        }

                                        for (var i = 0; i < imageFiles.length; i++) {

                                            document.getElementById(
                                                "uploadImage" +
                                                i).value = imageFiles[i];
                                        }
                                        if (imageFiles.length < 5) {

                                            photo_counter--;
                                        }

                                        console.log(
                                            "File has been successfully removed!!"
                                        );
                                    }
                                    if (imageFiles.length > 4) {
                                        imageFiles.splice(4, imageFiles.length);

                                    }
                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });

                        });
                    }
                });
            }

            //************************************************************************ */

            if (document.getElementById('myImageDropzone')) {
                Dropzone.autoDiscover = false;
                myImageDropzone = new Dropzone("div#myImageDropzone", {
                    url: "image/upload/store",
                    params: {
                        _token: token
                    },
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + file.name;
                    },
                    maxFilesize: 500, // MB
                    maxFiles: 1,
                    acceptedFiles: ".jpeg,.jpg,.png",
                    addRemoveLinks: true,
                    dictRemoveFile: 'Remove file',
                    autoProcessQueue: true,
                    uploadMultiple: false,
                    parallelUploads: 1,

                    init: function () {

                        var known = false;

                        var singleImageDropzoneInstance = this;

                        if (page == "editPage") {

                            $.ajax({
                                headers: {
                                    _token: token
                                },
                                type: 'GET',
                                url: '{{ url("server/singleimage") }}',
                                data: {
                                    filename: singleImageName
                                },

                                success: function (data) {

                                    var singleImgMockFile = {
                                        filename: data.imageName,
                                        size: data.size,
                                        type: data.mimetype,
                                        accepted: true,
                                        acceptedFiles: ".png, .jpg, .jpeg",
                                    };

                                    singleImageDropzoneInstance.emit("addedfile",
                                        singleImgMockFile);
                                    singleImageDropzoneInstance.emit("thumbnail",
                                        singleImgMockFile, "/img/" + data.imageName
                                    );
                                    singleImageDropzoneInstance.files.push(
                                        singleImgMockFile);
                                    singleImageDropzoneInstance.emit("complete",
                                        singleImgMockFile);
                                    document.getElementById("uploadVideo").value =
                                        data.imageName;

                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });

                        }


                        this.on("success", function (file, responseText) {

                            document.getElementById("uploadSingleImage").value =
                                responseText.imageName;

                        });
                        this.on('error', function (response) {

                        });
                        this.on("processing", function (file) {
                            this.options.url = '/image/upload/store';
                            $.post({
                                url: '/image/upload/store',
                                headers: {
                                    'X-CSRF-TOKEN': token
                                },
                                data: {
                                    fileType: "image",
                                    _token: token
                                },
                                dataType: 'json',
                                success: function (data) {

                                }
                            });
                        });
                        this.on("complete", function (file) {

                            if (this.files[1] != null) {
                                removeImage = false;
                                this.removeFile(this.files[1]);
                                if (known === false) {
                                    alert('Max. 1 Uploads!')
                                    known = true;
                                }
                            }

                        });

                        this.on("removedfile", function (file) {

                            if (file.constructor.name == "File") {
                                var name = file.upload.filename;

                            } else {
                                var name = file.filename;

                            }

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': token
                                },
                                type: 'POST',
                                url: '{{ url("image/delete") }}',
                                data: {
                                    filename: name
                                },
                                success: function (data) {

                                    if (removeImage) {

                                        document.getElementById(
                                            "uploadSingleImage").value = "";

                                    }
                                    removeImage = true;
                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });

                        });

                    }
                });
            }


            //******************************************************************* */

            if (document.getElementById('myVideoDropzone')) {
                Dropzone.autoDiscover = false;
                var myVideoDropzone = new Dropzone("div#myVideoDropzone", {
                    url: "video/upload/store",
                    params: {
                        _token: token

                    },
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + file.name;
                    },
                    maxFilesize: 500, // MB
                    maxFiles: 1,
                    acceptedFiles: ".mp4,.mkv,.avi,.m4v,.mov",
                    addRemoveLinks: true,
                    dictRemoveFile: 'Remove file',
                    autoProcessQueue: true,
                    uploadMultiple: false,
                    parallelUploads: 1,



                    init: function () {


                        var myVideoDropzoneInstance = this;

                        if (page == "editPage") {

                            $.ajax({
                                headers: {
                                    _token: token
                                },
                                type: 'GET',
                                url: '{{ url("server/video") }}',
                                data: {
                                    filename: videoName
                                },

                                success: function (data) {

                                    var videoMockFile = {
                                        filename: data.videoName,
                                        size: data.size,
                                        type: data.mimetype,
                                        accepted: true,
                                        acceptedFiles: ".mp4,.mkv,.avi,.m4v,.mov",
                                    };

                                    myVideoDropzoneInstance.emit("addedfile",
                                        videoMockFile);
                                    myVideoDropzoneInstance.emit("thumbnail",
                                        videoMockFile, "/video/" + data.videoName);
                                    myVideoDropzoneInstance.files.push(videoMockFile);
                                    myVideoDropzoneInstance.emit("complete",
                                        videoMockFile);
                                    document.getElementById("uploadVideo").value =
                                        data.videoName;

                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });

                        }

                        this.on("success", function (file, responseText) {

                            videoFiles.push(responseText.videoName);
                            document.getElementById("uploadVideo").value =
                                responseText.videoName;
                             myVideoDropzone.emit("thumbnail", file, "/video/" +
                                 responseText.videoName);

                        });
                        this.on('error', function (file, responseText) {
                            console.log("File has been removed!!" + file + responseText);

                        });
                        this.on("processing", function (file) {

                            this.options.url = '/video/upload/store';
                            $.post({
                                url: '/video/upload/store',
                                data: {
                                    _token: token
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                dataType: 'json',
                                success: function (data) {

                                }
                            });
                        });


                        this.on("complete", function (file) {

                            if (this.files[1] != null) {
                                removeVideo = false;
                                this.removeFile(this.files[1]);
                                if (known === false) {
                                    alert('Max. 1 Uploads!')
                                    known = true;
                                }
                            }

                        });
                        this.on("removedfile", function (file) {

                            if (file.constructor.name == "File") {
                                var name = file.upload.filename;

                            } else {
                                var name = file.filename;

                            }

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': token
                                },
                                type: 'POST',
                                url: '{{ url("video/delete") }}',
                                data: {
                                    filename: name
                                },
                                success: function (data) {

                                    if (removeVideo) {
                                        document.getElementById("uploadVideo").value =
                                            "";

                                    }
                                    removeVideo = true;
                                },
                                error: function (e) {
                                    console.log(e);
                                }
                            });

                        });

                    }
                });
            }
        })


    </script>

    <style>
        .buttonStyle {
            background: #00b0f0;
            border: none;
            color: white;
            padding: 6px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .buttonStyle:hover {
            background: #2079b0;
            text-decoration: none;
        }

        .card-header {

            font-weight: bold;
        }
        .dz-image img{width: 100%;height: 100%;}
        video {
            width: 100%;
        }
    </style>
    @yield('head')
</head>

<body>
    <div id="app">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <nav class="navbar navbar-expand-md navbar-light" style="background: #00b0f0">
            <div class="container">
                <a class="navbar-brand" style="color:white;">
                    <img src="/img/quiz-icon2.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                    <span class="fab fa-accusoft"></span>
                    <b>DigiQuiz</b>
                </a>
                @if (session('locale') == 'en')
                <a class="nav-link" href="#" onclick="changeLanguage('de')" id="german">
                    <img src="/img/DE.png" width="30" height="15" class="d-inline-block" alt="">
                </a>
                @elseif (session('locale') == 'de')
                <a class="nav-link" href="#" onclick="changeLanguage('en')" id="english">
                    <img src="/img/GB.png" width="30" height="15" class="d-inline-block" alt="">
                </a>
                @else
                <a class="nav-link" href="#" onclick="changeLanguage('de')" id="german">
                    <img src="/img/DE.png" width="30" height="15" class="d-inline-block" alt="">
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li>
                            <a style="color:white;" class="nav-link" href="{{ route('login') }}">
                                <b>{{ trans('app.StudentLoginLabel') }}</b>
                            </a>
                        </li>
                        <li>
                            <a style="color:white;" class="nav-link" href="{{ route('admin.login') }}">
                                <b>{{ trans('app.TeacherLoginLabel') }}</b>
                            </a>
                        </li>
                        <li>
                            <a style="color:white;" class="nav-link" href="{{ route('register') }}">
                                <b>{{ trans('app.StudentRegisterLabel') }}</b>
                            </a>
                        </li>

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color:white;" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ trans('app.LogoutLabel') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
@yield('page-js-files')
@yield('page-js-script')

</html>