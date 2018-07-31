@extends('layouts.base')

@section('content')
<div class="container">
    <h1 class="pull-xs-left">
        Notes
    </h1>
    <div class="pull-xs-right">
    <a class="btn btn-success" href="{{route('notes.createNote',$notebook->id)}}" role="button">
            New Note +
        </a>
        <a class="btn btn-primary" href="../notebooks" role="button">
            Back 
        </a>
    </div>
    <div class="clearfix">
    </div>
    <!-- notes -->
    <div class="list-group notes-group">
        @foreach($notes as $note)
        
        <div class="card card-block">
            <h4 class="card-title">
                {{ucfirst($note->title)}}
                
            </h4></a>
            <form class="pull-sm-right">
            Created at: {{$note->created_at->todatestring()}}<div></div>
                Last Updated: {{$note->updated_at->todatestring()}}</br></form>
            <p class="card-text">
                {{($note->body)}}<br></br>
                
            </p>
           

            <a class="btn btn-sm btn-success pull-xs-left" href="{{route('notes.edit',$note->id)}}">
                Update
            </a>
            <form class="pull-xs-right" action="{{route('notes.destroy',$note->id)}}" method="POST">
                {{csrf_field()}}
            {{method_field('DELETE')}}
                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
