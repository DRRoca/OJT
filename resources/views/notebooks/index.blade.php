@extends('layouts.base')

@section('nav')
<li>
    <a class="btn btn-primary navbar-btn" href="{{route('LiveSearch.index')}}" role="button">
        Search
    </a>
</li>
<li>
    <a class="btn btn-success navbar-btn" href="{{route('notebooks.create')}}" role="button">
        New Notebook +
    </a>
</li>
@endsection






@section('content')     

<br>

<!-- ================ Notebooks==================== -->
<!-- notebook1 -->
@foreach($notebooks as $notebook)
<div class="col-sm-6 col-md-3">
    <div class="card">
        <a class="btn btn-outline-dark" role="button" aria-pressed="true" href="{{route("notebooks.show",$notebook->id)}}" style="text-align:left">
            <div class="card-block">
                
                    <h3 class="card-title ">    
                        {{$notebook->name}}
                    </h3>
            
                <p class="card-text"> Created at: {{$notebook->created_at->todatestring()}} <br>
                Updated at: {{$notebook->updated_at->todatestring()}} </p>
            </div>
            <div class="card-block">
                <img alt="Responsive image" class="img-fluid" src="dist/img/purple.png"/>
            </div>
            <div class="card-block">
                <a class="card-link" href="{{route("notebooks.edit",$notebook->id)}}">
                    
                    <input class="btn btn-sm btn-success" type="submit" value="Update">
                </a>
                <form action="../public/notebooks/{{$notebook->id}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                </form>
            </div>
        </a>
    </div>
</div>

@endforeach

@endsection
