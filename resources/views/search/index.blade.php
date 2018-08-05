@extends('layouts.base')

@section('content')

<div class="container box">
    <div class="panel panel-default">
        <div class="panel-heading">Search Customer Data</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
            </div>
            <div id="notebook-div" class="table-responsive">
                <h3 align="center">Notebook Found : <span id="total_notebooks"></span></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody id="notebooks">

                    </tbody>
                </table>
            </div>
            <div id="note-div" class="table-responsive">
                <h3 align="center">Notes Found : <span id="total_notes"></span></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Notebook</th>
                            <th>Date Created</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody id="notes">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        fetch_search_results();
        function fetch_search_results(query = ''){
            $.ajax({
                url:"{{ route('LiveSearch.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data){
                    console.log(data.table_notebook_data);
                    $('#notebooks').html(data.table_notebook_data);
                    $('#total_notebooks').text(data.total_notebook_data);
                    $('#notes').html(data.table_note_data);
                    $('#total_notes').text(data.total_note_data);
                }
            })
        }
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_search_results(query);
            console.log(query);
        });
    });
</script>

@endsection