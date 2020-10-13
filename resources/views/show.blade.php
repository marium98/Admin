@extends('layouts.auth')

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
                <div class="card-header">{{ __('Questions') }}</div>

                <div class="card-body">
                   
                    <table border="1" class="table table-hover" >
                        <thead>
                        <tr>
                        <td>Id</td>
                        <td>Question</td>
                    
                        <td>Option 1</td>
                        <td>Option 2</td>
                        <td>Option 3</td>
                        <td>Option 4</td>
                        <td>Correct Answer</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        </tr>
                        </thead>
                        @foreach ($questions as $question)
                        <tr class="table-warning">
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        @php
                        $filtered = $options->where('question_id', $question->id);
                            // print_r($filtered);exit;
                        @endphp
                            <?php foreach($filtered as $value) { ?>
                                <td> <?= $value['option_text']; ?></td>
                            <?php } ?>
                            <td>{{ $question->answer }}</td>
                        <td><a href="show/{{$question->id}}/edit" class="btn btn-primary">Edit</a></td>
                       <td> <form action="show/{{$question->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete" class="btn btn-danger"> </td>
                        </tr>
                        @endforeach
                        </table>
                      
                </div>
            
         
            </div>
            <br /> <br />

            <a href="{{ route('insert')}}" class="btn btn-danger">ADD QUESTIONS</a>
            <a href="/admin" class="btn btn-primary">Back To Dashboard</a>
        </div>
    </div>
</div>
@endsection
