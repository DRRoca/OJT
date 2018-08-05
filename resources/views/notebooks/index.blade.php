@extends('layouts.base')


@section('content')     
        
<div>
    <a class="pull-md-right btn btn-primary" href="{{route('LiveSearch.index')}}" role="button">
        Search
    </a>
    <a class="pull-md-right btn btn-success" href="{{route('notebooks.create')}}" role="button">
        New Notebook +
    </a>
</div>

<div class="clearfix">
</div>
<br>

<!-- ================ Notebooks==================== -->
<!-- notebook1 -->
@foreach($notebooks as $notebook)
<div class="col-sm-6 col-md-3">
    <div class="card">
        <div class="card-block">
            
                <h3 class="card-title ">
                    {{$notebook->name}}
                </h3>
            </a>
        
        Created at: {{$notebook->created_at->todatestring()}}<div></div>
        Updated at: {{$notebook->updated_at->todatestring()}}</div>
        <a  href="{{route("notebooks.show",$notebook->id)}}">
                
            <img alt="Responsive image" class="img-fluid" src="dist/img/purple.png"/>
        </a>
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
    </div>
</div>

@endforeach

@endsection
