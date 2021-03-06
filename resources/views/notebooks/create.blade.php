@extends('layouts.base')

@section('nav')
<li class="nav-item">
    <a class="btn btn-primary" href="{{route('notebooks.index')}}" role="button">
        Back 
    </a>
</li>
@endsection

@section('content')
<div class="container">
<h1>
    Create Notebook
</h1>
    <form action="{{route('notebooks.store')}}" method="POST">
    {{csrf_field()}}
        <div class="form-group">
            <label for="name">
                Notebook Name
            </label>
            <input class="form-control" name="name" type="text" required>
            </input>
        </div>
        <input class="btn btn-success" type="submit" value="Done">
        </input
    </form>
</div>
@endsection
