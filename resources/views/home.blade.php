@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <b>{{ trans('app.UserDashboard') }}</b>
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
                                        <a href="#userProfile" data-toggle="tab" role="tab" class="nav-link active">
                                            <b>{{ trans('app.UserProfileTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#movementData" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.MovementDataTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#physicalFunctions" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.PhysicalFunctionsTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#cognitiveFunctions" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.CognitiveFunctionsTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#relationships" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.RelationshipsTab') }}</b>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#emotions" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.EmotionsTab') }}</b>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="#participation" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.ParticipationTab') }}</b>
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="#results" data-toggle="tab" role="tab" class="nav-link">
                                            <b>{{ trans('app.ResultsTab') }}</b>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="padding:20px;">

                                    <div id="userProfile" role="tabpanel" class="tab-pane active">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.UserProfileLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">
                                                    <div class="card-body">
                                                        <div class="row justify-content-center">

                                                            <div class="offset-md-1 col-md-6">
                                                                @foreach ($user as $userDetail)
                                                                @endforeach
                                                                <table width:100%>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.UserIDLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value="{{$userDetail->id}}" type="text"
                                                                                readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.FirstNameLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value="{{$userDetail->name}}"
                                                                                type="text" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.LastNameLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value="{{$userDetail->vorname}}"
                                                                                type="text" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.EmailLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value=""
                                                                                type="text" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.SexLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value="{{$userDetail->sex}}" type="text"
                                                                                readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.AgeLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value="{{$userDetail->age}}" type="text"
                                                                                readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.DiseaseLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value=""
                                                                                type="text" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%">
                                                                            <label>{{ trans('app.JoiningDateLabel') }}</label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control"
                                                                                value="{{$userDetail->date_of_joining}}"
                                                                                type="text" readonly />
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

                                    <div id="movementData" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.MovementDataLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">
                                                    <form id="submitCognitiveFunctions" method="POST"
                                                        action="{{ route('submitMovementData.store') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for=""
                                                                    style="">{{ trans('app.CurrentDateLabel') }}</label>
                                                                <input class="form-control" type="text" name="currentDate"
                                                                    id="currentDate" />
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for=""
                                                                    style="">{{ trans('app.wellbeingQtn') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="offset-md-2 col-md-10">

                                                                <div class="range">
                                                                    <input type="range" id="wellBeing" min="0"
                                                                        max="1" step="0.33" name="wellBeing">
                                                                </div>
                                                                <ul class="range-labels">
                                                                    <li class="active selected">
                                                                        {{ trans('app.notSoWell') }}</li>
                                                                    <li>{{ trans('app.notWell') }}
                                                                    </li>
                                                                    <li>{{ trans('app.well') }}
                                                                    </li>
                                                                    <li>{{ trans('app.veryWell') }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-10">
                                                                <label for=""
                                                                    style="">{{ trans('app.happeningQtn') }}</label>
                                                                <input class="form-control" type="text"
                                                                    id="happening" name="happening"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="offset-md-5 col-md-8">
                                                                    <button class="buttonStyle" type="submit"
                                                                        id="physicalFunctionsBtn"
                                                                        class="btn btn-xs btn-primary">{{
                                                                trans('app.AddButton') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="physicalFunctions" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.PhysicalFunctionsLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">
                                                    <form id="submitPhysicalFunctions" method="POST"
                                                        action="{{ route('submitPhysicalFunctions.store') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-12">

                                                                <div class="form-group">


                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.MovementHeader') }}</label>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.holdPositionQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range"
                                                                                    id="holdingPositions" min="0"
                                                                                    max="1" step="0.33"
                                                                                    name="holdingPositions">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleM') }}</li>
                                                                                <li>{{ trans('app.withMoreEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsM') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.changePositionQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range"
                                                                                    id="changingPositions" min="0"
                                                                                    max="1" step="0.33"
                                                                                    name="changingPositions">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleM') }}</li>
                                                                                <li>{{ trans('app.withMoreEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsM') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.walkQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="walking" min="0"
                                                                                    max="1" step="0.33" name="walking">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleM') }}</li>
                                                                                <li>{{ trans('app.withMoreEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsM') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.climbStairsQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="climbingStairs"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="climbingStairs">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleM') }}</li>
                                                                                <li>{{ trans('app.withMoreEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsM') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsM') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.PainHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.knownPainQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="knownPain"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="knownPain">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.intensePain') }}</li>
                                                                                <li>{{ trans('app.morePain') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessPain') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noPain') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.unknownPainQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="unknownPain"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="unknownPain">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.intensePain') }}</li>
                                                                                <li>{{ trans('app.morePain') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessPain') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noPain') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.SleepingBehaviour') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.fallAsleepQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="fallAsleep"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="fallAsleep">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleSlp') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsSlp') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsSlp') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsSlp') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.sleepingDurationQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range"
                                                                                    id="sleepingDuration" min="0"
                                                                                    max="1" step="0.33"
                                                                                    name="sleepingDuration">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleSlp') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsSlp') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsSlp') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsSlp') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.Senses') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.seeingQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="seeing" min="0"
                                                                                    max="1" step="0.33" name="seeing">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleSenses') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsSenses') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsSenses') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsSenses') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.hearingQtn') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="hearing" min="0"
                                                                                    max="1" step="0.33" name="hearing">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleSenses') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsSenses') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsSenses') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsSenses') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="offset-md-5 col-md-8">
                                                                            <button class="buttonStyle" type="submit"
                                                                                id="physicalFunctionsBtn"
                                                                                class="btn btn-xs btn-primary">{{
                                                                trans('app.AddButton') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="cognitiveFunctions" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.CognitiveFunctionsLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">

                                                    <form id="submitCognitiveFunctions" method="POST"
                                                        action="{{ route('submitCognitiveFunctions.store') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-12">

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.CommunicativeSkillsHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.expressionQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="expression"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="expression">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleComm') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsComm') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsComm') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsComm') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.understandQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="understanding"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="understanding">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleComm') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsComm') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsComm') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsComm') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.ControlHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.concentrateQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="concentration"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="concentration">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsCon') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.memoryQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="memory" min="0"
                                                                                    max="1" step="0.33" name="memory">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsCon') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.orientationQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="orientation"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="orientation">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notPossibleCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withMoreEffortsCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.withLessEffortsCon') }}
                                                                                </li>
                                                                                <li>{{ trans('app.noEffortsCon') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="offset-md-5 col-md-8">
                                                                            <button class="buttonStyle" type="submit"
                                                                                id="cognitiveFunctionsBtn"
                                                                                class="btn btn-xs btn-primary">{{
                                                                trans('app.AddButton') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>



                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="relationships" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.RelationshipsLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">

                                                    <form id="submitRelationships" method="POST"
                                                        action="{{ route('submitRelationships.store') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-12">

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.FunctionalValueHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.fFamilyQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="family" min="0"
                                                                                    max="1" step="0.33" name="family">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.importantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.veryImportantFV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.fFriendsQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="friends" min="0"
                                                                                    max="1" step="0.33" name="friends">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.importantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.veryImportantFV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.fPartnershipQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="partnership"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="partnership">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.importantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.veryImportantFV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.fAcquaintancesQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="acquaintances"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="acquaintances">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessImportantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.importantFV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.veryImportantFV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.EmotionalValueHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.eFamilyQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="eFamily" min="0"
                                                                                    max="1" step="0.33" name="eFamily">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.satisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.verySatisfiedEV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.eFriendsQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="eFriends"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="eFriends">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.satisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.verySatisfiedEV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.ePartnershipQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="ePartnership"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="ePartnership">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.satisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.verySatisfiedEV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.eAcquaintancesQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="eAcquaintances"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="eAcquaintances">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.notSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.lessSatisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.satisfiedEV') }}
                                                                                </li>
                                                                                <li>{{ trans('app.verySatisfiedEV') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="offset-md-5 col-md-8">
                                                                            <button class="buttonStyle" type="submit"
                                                                                id="relationshipsBtn"
                                                                                class="btn btn-xs btn-primary">{{
                                                                trans('app.AddButton') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="emotions" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.EmotionsLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">

                                                    <form id="submitEmotions" method="POST"
                                                        action="{{ route('submitEmotions.store') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-12">

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.PositiveEffectsHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.motivationQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="motivation"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="motivation">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.neverPE') }}</li>
                                                                                <li>{{ trans('app.lessOftenPE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.moreOftenPE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.alwaysPE') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.highMoodQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="highMood"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="highMood">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.neverPE') }}</li>
                                                                                <li>{{ trans('app.lessOftenPE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.moreOftenPE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.alwaysPE') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.relaxationQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="relaxation"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="relaxation">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.neverPE') }}</li>
                                                                                <li>{{ trans('app.lessOftenPE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.moreOftenPE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.alwaysPE') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for=""
                                                                            style="font-weight:bold; font-size:13pt;">{{ trans('app.NegativeEffectsHeader') }}</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.indifferenceQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="indifference"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="indifference">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.neverNE') }}</li>
                                                                                <li>{{ trans('app.lessOftenNE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.moreOftenNE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.alwaysNE') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.sadnessQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="sadness" min="0"
                                                                                    max="1" step="0.33" name="sadness">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.neverNE') }}</li>
                                                                                <li>{{ trans('app.lessOftenNE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.moreOftenNE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.alwaysNE') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <label for=""
                                                                                style="">{{ trans('app.frustrationQtn') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-2 col-md-10">

                                                                            <div class="range">
                                                                                <input type="range" id="frustration"
                                                                                    min="0" max="1" step="0.33"
                                                                                    name="frustration">
                                                                            </div>
                                                                            <ul class="range-labels">
                                                                                <li class="active selected">
                                                                                    {{ trans('app.neverNE') }}</li>
                                                                                <li>{{ trans('app.lessOftenNE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.moreOftenNE') }}
                                                                                </li>
                                                                                <li>{{ trans('app.alwaysNE') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="offset-md-5 col-md-8">
                                                                            <button class="buttonStyle" type="submit"
                                                                                id="emotionsBtn"
                                                                                class="btn btn-xs btn-primary">{{
                                                                trans('app.AddButton') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="participation" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.ParticipationLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">

                                                    <table class="table table-striped table-hover"
                                                        id="participationResultTable">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('app.userIdHeader') }}</th>
                                                                <th>{{ trans('app.NutritionHeader') }}</th>
                                                                <th>{{ trans('app.hygieneHeader') }}</th>
                                                                <th>{{ trans('app.householdHeader') }}</th>
                                                                <th>{{ trans('app.selfcareHeader') }}</th>
                                                                <th>{{ trans('app.self-determinationHeader') }}</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbodyPanel">

                                                            @foreach ($participation as $participationResults)

                                                            <tr>
                                                                <td>{{$participationResults->id}}</td>
                                                                <td>{{(0.40*$participationResults->pf_results)+(0.10*$participationResults->cf_results)+(0.20*$participationResults->r_results)+(0.30*$participationResults->e_results)}}
                                                                </td>
                                                                <td>{{(0.40*$participationResults->pf_results)+(0.40*$participationResults->cf_results)+(0.20*$participationResults->e_results)}}
                                                                </td>
                                                                <td>{{(0.40*$participationResults->pf_results)+(0.30*$participationResults->cf_results)+(0.30*$participationResults->e_results)}}
                                                                </td>
                                                                <td>{{(0.25*$participationResults->pf_results)+(0.25*$participationResults->cf_results)+(0.25*$participationResults->r_results)+(0.25*$participationResults->e_results)}}
                                                                </td>
                                                                <td>{{(0.30*$participationResults->pf_results)+(0.30*$participationResults->cf_results)+(0.10*$participationResults->r_results)+(0.30*$participationResults->e_results)}}
                                                                </td>

                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="results" role="tabpanel" class="tab-pane">
                                        <div class="col-sm-12">
                                            <div class="panel panel-default panel-table">
                                                <div class="panel-heading">
                                                    <h3>{{ trans('app.ResultsLabel') }}</h3>


                                                </div>
                                                <div class="panel-body">

                                                    <table class="table table-striped table-hover"
                                                        id="participationResultTable">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:33px">{{ trans('app.userIdHeader') }}</th>
                                                                <th style="width:35px">{{ trans('app.physicalFunctionsResultsHeader') }}
                                                                </th>
                                                                <th style="width:35px">{{ trans('app.cognitiveFunctionsResultsHeader') }}
                                                                </th>
                                                                <th style="width:40px">{{ trans('app.relationshipResultsHeader') }}</th>
                                                                <th style="width:35px">{{ trans('app.emotionsResultsHeader') }}</th>
                                                                <th style="width:50px">{{ trans('app.participationResultsHeader') }}</th>
                                                                <th style="width:42px">{{ trans('app.wellbeingResultsHeader') }}</th>
                                                                <th style="width:35px">{{ trans('app.accidentResultsHeader') }}</th>
                                                                <!-- <th>{{ trans('app.qualityOfLifeResultsHeader') }}</th>  -->

                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbodyPanel">

                                                            @foreach ($participation as $participationResults)
                                                             <tr>
                                                                <td style="width:33px; text-align:center;">{{$participationResults->id}}</td>
                                                                <td style="width:35px; text-align:center;">{{$participationResults->pf_results}}</td>
                                                                <td style="width:35px; text-align:center;">{{$participationResults->cf_results}}</td>
                                                                <td style="width:40px; text-align:center;">{{$participationResults->r_results}}</td>
                                                                <td style="width:35px; text-align:center;">{{$participationResults->e_results}}</td>
                                                                <td style="width:50px; text-align:center;">{{0.70*(0.2*((0.40*$participationResults->pf_results)+(0.10*$participationResults->cf_results)+(0.20*$participationResults->r_results)+(0.30*$participationResults->e_results))+
                                                            0.2*((0.40*$participationResults->pf_results)+(0.40*$participationResults->cf_results)+(0.20*$participationResults->e_results))+
                                                            0.2*((0.40*$participationResults->pf_results)+(0.30*$participationResults->cf_results)+(0.30*$participationResults->e_results))+
                                                            0.2*((0.25*$participationResults->pf_results)+(0.25*$participationResults->cf_results)+(0.25*$participationResults->r_results)+(0.25*$participationResults->e_results))+
                                                            0.2*((0.30*$participationResults->pf_results)+(0.30*$participationResults->cf_results)+(0.10*$participationResults->r_results)+(0.30*$participationResults->e_results)))+0.30*($participationResults->e_results)}}
                                                            <td style="width:42px; text-align:center;">{{0.50*(0.70*(0.2*((0.40*$participationResults->pf_results)+(0.10*$participationResults->cf_results)+(0.20*$participationResults->r_results)+(0.30*$participationResults->e_results))+
                                                            0.2*((0.40*$participationResults->pf_results)+(0.40*$participationResults->cf_results)+(0.20*$participationResults->e_results))+
                                                            0.2*((0.40*$participationResults->pf_results)+(0.30*$participationResults->cf_results)+(0.30*$participationResults->e_results))+
                                                            0.2*((0.25*$participationResults->pf_results)+(0.25*$participationResults->cf_results)+(0.25*$participationResults->r_results)+(0.25*$participationResults->e_results))+
                                                            0.2*((0.30*$participationResults->pf_results)+(0.30*$participationResults->cf_results)+(0.10*$participationResults->r_results)+(0.30*$participationResults->e_results)))+0.30*($participationResults->e_results))+0.50*($participationResults->e_results)}}</td>
                                                            <td style="width:35px; text-align:center;">{{$participationResults->accident}}</td>
                                                            
                                                                    <!-- <td>{{$participationResults->pf_results}}</td> -->
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
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
                @endsection

                <head>

                    <style>
                        .range {
                            position: relative;
                            width: 59%;
                            height: 5px;
                        }

                        .range input {
                            margin: 0px 0px 0px 0px;
                            width: 100%;
                            position: absolute;
                            top: 2px;
                            height: 0;
                            -webkit-appearance: progress-bar;
                        }

                        .range input::-webkit-slider-thumb {
                            -webkit-appearance: none;
                            width: 18px;
                            height: 18px;
                            margin: -8px 0 0;
                            border-radius: 50%;
                            background: #37adbf;
                            cursor: pointer;
                            border: 0 !important;
                        }

                        .range input::-moz-range-thumb {
                            width: 18px;
                            height: 28px;
                            margin: -8px 0 0;
                            border-radius: 10%;
                            background: #37adbf;
                            cursor: pointer;
                            border: 0 !important;
                        }

                        .range input::-ms-thumb {
                            width: 18px;
                            height: 18px;
                            margin: -8px 0 0;
                            border-radius: 50%;
                            background: #37adbf;
                            cursor: pointer;
                            border: 0 !important;
                        }

                        .range input::-webkit-slider-runnable-track {
                            width: 100%;
                            height: 2px;
                            cursor: pointer;
                            background: #b2b2b2;
                        }

                        .range input::-moz-range-track {
                            width: 100%;
                            height: 2px;
                            cursor: pointer;
                            background: #b2b2b2;
                        }

                        .range input::-ms-track {
                            width: 100%;
                            height: 2px;
                            cursor: pointer;
                            background: #b2b2b2;
                        }

                        .range input:focus {
                            background: none;
                            outline: none;
                        }

                        .range input::-ms-track {
                            width: 100%;
                            cursor: pointer;
                            background: transparent;
                            border-color: transparent;
                            color: transparent;
                        }

                        .range-labels {
                            margin: 18px -50px 0px;
                            padding: 0;
                            list-style: none;
                        }

                        .range-labels li {
                            position: relative;
                            float: left;
                            width: 17%;
                            text-align: center;
                            color: #b2b2b2;
                            font-size: 14px;
                            cursor: pointer;
                            padding: 0px 0px 20px 0px;
                        }

                        .range-labels li::before {
                            position: absolute;
                            top: -25px;
                            right: 0;
                            left: 0;
                            content: "";
                            margin: 1px auto;
                            width: 0px;
                            height: 9px;
                            background: #b2b2b2;
                            border-radius: 50%;
                        }

                        .range-labels .active {
                            color: #37adbf;
                        }

                        .range-labels .selected::before {
                            background: #37adbf;
                        }

                        .range-labels .active.selected::before {
                            display: none;
                        }



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
                            padding: 12px;
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
                            padding: 12px;
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
                        // var slider = document.getElementById("myRange");
                        // var output = document.getElementById("demo");
                        // output.innerHTML = slider.value; // Display the default slider value

                        // // Update the current slider value (each time you drag the slider handle)
                        // slider.oninput = function() {
                        //   output.innerHTML = this.value;
                        // }

                        function onloadFunction() {
                            document.getElementById('currentDate').value = Date();
                        }

                        function getRange() {
                            //alert("ho");
                            var slider = document.getElementById("slider1");
                            slider.oninput = function () {
                                //var out= this.value;
                                alert(this.value);
                            }
                        }



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
                            var actualAnswer = document.getElementById("questionAnswer").value;
                            var min, max;
                            if (questionType == 'MultipleChoice' || questionType == 'OrderOptions' || questionType ==
                                'TrueFalse' ||
                                questionType == 'ImageAsOptions' || questionType == 'ImageType' || questionType ==
                                'VideoType') {
                                enteredAnswer = $('input[name=radio]:checked').val();
                                imgCount = 0;
                                $('input:radio').each(function () {
                                    imgCount++;
                                    if (actualAnswer == this.value) {
                                        correctImgCount = imgCount;
                                    }
                                });

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


                            if (questionType == 'NumericQuestion') {
                                if (isRangeAllowed == 'Yes') {
                                    range = actualAnswer * 0.1;
                                    min = parseInt(actualAnswer) - range;
                                    max = parseInt(actualAnswer) + range;

                                    if ((min < enteredAnswer) && (enteredAnswer < max)) {
                                        if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {
                                            $('#correctAnswer').show();
                                            $('#wrongAnswer').hide();
                                            $('#wrongAnswerImgVid').hide();
                                        } else {
                                            $('#exactAnswer').show();
                                            $('#correctAnswer').hide();
                                            $('#wrongAnswer').hide();
                                            $('#wrongAnswerImgVid').hide();
                                        }
                                    } else {
                                        $('#wrongAnswer').show();
                                        $('#correctAnswer').hide();
                                        $('#wrongAnswerImgVid').hide();
                                    }
                                } else if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {
                                    $('#correctAnswer').show();
                                    $('#wrongAnswer').hide();
                                    $('#wrongAnswerImgVid').hide();
                                } else {
                                    $('#wrongAnswer').show();
                                    $('#correctAnswer').hide();
                                    $('#wrongAnswerImgVid').hide();
                                }
                            } else if (questionType == 'ImageAsOptions') {
                                if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {

                                    $('#correctAnswer').show();
                                    $('#wrongAnswer').hide();
                                    $('#wrongAnswerImgVid').hide();
                                } else {
                                    $('#correctAnswer').hide();
                                    $('#wrongAnswer').hide();
                                    $('#wrongAnswerImgVid').show();
                                    $('#wrongAnsMsg').html("image" + correctImgCount);
                                }
                            } else if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {

                                $('#correctAnswer').show();
                                $('#wrongAnswer').hide();
                                $('#wrongAnswerImgVid').hide();
                            } else {

                                $('#wrongAnswer').show();
                                $('#correctAnswer').hide();
                                $('#wrongAnswerImgVid').hide();
                            }

                            setTimeout("submitAnswerForm()", 2500);
                        }

                        function submitAnswerForm() {

                            document.getElementById("submitQuiz").submit();
                        }
                    </script>

                </head>