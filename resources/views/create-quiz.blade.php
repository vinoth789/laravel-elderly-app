@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Quiz</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('quizNumber.store') }}">
                        @csrf @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif


                        <div class="form-group row">
                            <div class="offset-md-2 col-md-8">

                                @foreach($quizs as $quiz) @endforeach
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" id="id" value="{{$quiz->quizNumber+1}}" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">Quiz Number</label>
                                    <input type="number" class="form-control" name="quizNumber" id="quizNumber" value="{{$quiz->quizNumber+1}}" readonly required>
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">Quiz Name</label>
                                    <input type="text" class="form-control" name="quizName" id="quizName" required>
                                </div>

                                <button type="submit" class="btn btn-xs btn-primary">Add</button>

                                <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">
                                    {{ __('Back') }}
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