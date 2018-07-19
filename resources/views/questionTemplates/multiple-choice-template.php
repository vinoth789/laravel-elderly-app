@extends('add-quiz')

@section('content')

                        
                            <div class="form-group row">
                            <div class="offset-md-2 col-md-8">
                            
                                    <div class="form-group">
                                        <label for="add-question">Choice 1</label>
                                        <input type="text" class="form-control" name="choice1" id="choice1" required>
                                        <label for="add-question">Choice 2</label>
                                        <input type="text" class="form-control" name="choice2" id="choice2" required>
                                        <label for="add-question">Choice 3</label>
                                        <input type="text" class="form-control" name="choice3" id="choice3" required>
                                        <label for="add-question">Answer</label>
                                        <input type="text" class="form-control" name="answer" id="answer" required>
                                    </div>
 
                            </div>
                        </div>
                
@endsection
