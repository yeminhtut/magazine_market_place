@extends('layout.layout')

@section('content')
	<div class="container" style="margin-top:100px;">
            <div class="content">              


            </div>
            <table class="table table-striped" id="contestant_tbl">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Email</th>
			            <th>Source</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($contestants as $contestant)
			    	<tr>
			            <th scope="row">{{$contestant->name}}</th>
			            <td>{{$contestant->email}}</td>
			            <td>{{$contestant->source}}</td>
			            <td></td>
			        </tr>
					@endforeach			
			    </tbody>
			</table>
        </div>
@endsection
@section('footer')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#contestant_tbl').DataTable();
} );
</script>
@endsection
