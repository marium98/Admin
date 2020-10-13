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
        <form action="/show/{{$question->id}}" method="POST">
                {{ csrf_field() }}
                @method('PATCH')
            <div class="card-body">
                <label>Question </label>
            <input name="question_text"  type="textarea" value="{{$question->question_text}}"> 
                 <div class="container"> 
                     <label>Add Options</label><br />
                     @php
                     $filtered = $options->where('question_id', $question->id);//oky?
                     @endphp
                     <?php foreach($filtered as $value) { ?>
                        <input name="options[<?= $value['id'] ?>]" type="text" value="<?=$value['option_text'];?>" />
                        {{-- <input name="options[]" type="hidden" value="<?= $value['id'] ?>" />  --}}
                        <br />
                    <?php } ?>
               
                  
                    <label>Correct Answer</label><br />
                 <input name="answer" type="textarea" value="{{$question->answer}}">
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