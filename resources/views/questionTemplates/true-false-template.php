@extends('add-quiz')

@section('content')

                        
                            <div class="form-group row">
                            <div class="offset-md-2 col-md-8">
                            
                                    <div class="form-group">
                                        <label for="add-question">Choic</label>
                                        <input type="text" class="form-control" name="choice1" id="choice1" required>
                                        <label for="add-question">Choice 2</label>
                                        <input type="text" class="form-control" name="choice2" id="choice2" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-xs btn-primary">Add</button>
                                    <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">
                                    {{ __('Back') }}
                                </a>
                                
                            </div>
                            </div>
                
@endsection
