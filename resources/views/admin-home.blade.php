@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('app.adminHeader') }}</div>

                <div class="card-body">


                    <div class="col-md-12">
                        <div class="tab-container mb-5">
                            <ul role="tablist" class="nav nav-tabs nav-tabs-primary">
                                <li class="nav-item">
                                    <a href="#userProfile" data-toggle="tab" role="tab" class="nav-link active">
                                        <b>{{ trans('app.listOfUsers') }}</b>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#registerUsers" data-toggle="tab" role="tab" class="nav-link">
                                        <b>{{ trans('app.registerUser') }}</b>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" style="padding:20px;">
                                <div id="userProfile" role="tabpanel" class="tab-pane active">
                                    <div class="col-md-12">
                                        <div class="panel panel-default panel-table">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class=" panel-heading">
                                                        <h3>{{ trans('app.UserProfileLabel') }}</h3>
                                                        <p>
                                                            <i>{{ trans('app.UserProfileDesc') }}
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
                                                        <input type="text" class="form-control" name="searchKeyword"
                                                            onkeyup="searchByKeyword()" id="searchKeyword"
                                                            placeholder="{{ trans('app.SearchPlaceholder') }}"
                                                            aria-label="Search..." aria-describedby="basic-addon1">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-hover" id="studentResultTable">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ trans('app.UserIDLabel') }}</th>
                                                            <th>{{ trans('app.NameLabel') }}</th>
                                                            <th>{{ trans('app.EmailLabel') }}</th>
                                                            <th>{{ trans('app.AgeLabel') }}</th>
                                                            <th>{{ trans('app.SexLabel') }}</th>
                                                            <th>{{ trans('app.DiseaseLabel') }}</th>
                                                            <th>{{ trans('app.JoiningDateLabel') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbodyPanel">

                                                        @foreach ($user as $userDetail)

                                                        <tr>

                                                            <td>{{$userDetail->id}}</td>
                                                            <td>{{$userDetail->name}}</td>
                                                            <td>{{$userDetail->email}}</td>
                                                            <td>{{$userDetail->age}}</td>
                                                            <td>{{$userDetail->sex}}</td>
                                                            <td>{{$userDetail->disease}}</td>
                                                            <td>{{$userDetail->date_of_joining}}</td>

                                                        </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="registerUsers" role="tabpanel" class="tab-pane">
                                    <div class="col-md-12">
                                        <div class="panel panel-default panel-table">
                                            
                                            <div class="panel-body">

                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.StudentNameLabel') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="name" type="text"
                                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                                name="name" value="{{ old('name') }}" required
                                                                autofocus>

                                                            @if ($errors->has('name'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.StudentVorNameLabel') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="vorname" type="text"
                                                                class="form-control{{ $errors->has('vorname') ? ' is-invalid' : '' }}"
                                                                name="vorname" value="{{ old('vorname') }}" required
                                                                autofocus>

                                                            @if ($errors->has('vorname'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('vorname') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.EmailAddress') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email"
                                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                name="email" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.PasswordLabel') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password"
                                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                name="password" required>

                                                            @if ($errors->has('password'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password-confirm"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.ConfirmPasswordLablel') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password-confirm" type="password"
                                                                class="form-control" name="password_confirmation"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="sex"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.SexLabel') }}</label>

                                                        <div class="col-md-2">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="sexRadio" id="male"
                                                                        value="Male">
                                                                        {{ trans('app.SexMaleLabel') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="sexRadio" id="female"
                                                                        value="Female">
                                                                        {{ trans('app.SexFemaleLabel') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="age"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.AgeLablel') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="age" type="number" class="form-control"
                                                                name="age" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Disease"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.DiseaseLabel') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="disease" type="text" class="form-control"
                                                                name="disease" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="dateOfJoining"
                                                            class="col-md-4 col-form-label text-md-right">{{ trans('app.DateOfJoiningLabel') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="date" id="joiningDate" name="joiningDate"
                                                                value="2018-07-22" min="2018-01-01" max="2018-12-31">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button class="buttonStyle" type="submit"
                                                                class="btn btn-primary">
                                                                {{ trans('app.RegisterButton') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>


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