@extends('layouts.base')

@section('content')
<div class="container">
<h1>
    Edit Notebook
</h1>
<form action="{{route('notebooks.update',$notebooks->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}
        <div class="form-group">
            <label for="name">
                Previous ({{$notebooks->name}})
            </label>
            <input class="form-control" name="name" placeholder="New name" type="text" required>
            </input>
        </div>
        
        <input type="submit" class="btn btn-success" value="Done">
        
        </div>
@endsection
