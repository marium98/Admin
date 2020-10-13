@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Questions For The Quiz') }}</div>

               
            </div>
            <form action="/create" method="POST">
                {{ csrf_field() }}
            <div class="card-body">
                <label>Question </label>
                <input name="question_text"  type="textarea"> 
                 <div class="container"> 
                     <label>Add Options</label><br />
                    <input name="option_text[]" type="textarea" placeholder="option1"><br />
                    <input name="option_text[]" type="textarea" placeholder="option2"> <br /><br />
                    <input name="option_text[]" type="textarea" placeholder="option3"><br />
                    <input name="option_text[]" type="textarea" placeholder="option4"> <br>
                   
                    <label>Correct Answer</label><br />
                    <input name="answer" type="textarea" placeholder="answer">
                </div>  <br/><br />
                <hr>
                <div class="container">
                    {{-- <a href="{{ route('home') }}" class="text-sm text-gray-700 underline">Submit</a> --}}
                 <input type="submit" class="btn btn-warning" value="Submit">
                <a href="{{route('home')}}" class="btn btn-primary">Back To Dashboard</a>
                
                
                
                </div> 

                
              </div>
        </div>
    </form>
    </div>
</div>
@endsection
