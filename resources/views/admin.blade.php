@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss!
                </div>

                <div class="card-body">
                    <a href="{{ route('insert')}}" class="btn btn-danger">ADD QUESTIONS</a>
                    <a href="/show" class="btn btn-secondary">DISPLAY QUESTIONS</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection