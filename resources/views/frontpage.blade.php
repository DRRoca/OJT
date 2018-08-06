@extends('layouts.base')


@section('content')
        <!-- Main component for call to action -->
        <div class="jumbotron">
            
            <p>
                <a class="btn btn-lg btn-primary" href="{{route('notebooks.index')}}" role="button">
                    Click me!
                </a>
            </p>
        </div>
    </div>
    <!-- /container -->

@endsection
