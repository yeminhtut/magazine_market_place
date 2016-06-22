@extends('layout.layout')

@section('content')
        <div class="container" style="margin-top:100px;">
            <div class="content">                
                <div style="margin-bottom: 15px;">
			        <a href="{{route('admin_add_contest')}}" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Contest</a>
			    </div>
				<table class="table table-striped">
				    <thead>
				        <tr>				            
				            <th>Name</th>
				            <th>Start Date</th>
				            <th>End Date</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($contests as $contest)
				    	<tr>
				            <th scope="row">{{$contest->contest_name}}</th>
				            <td>{{$contest->start_date}}</td>
				            <td>{{$contest->end_date}}</td>
				            <td></td>
				        </tr>
						@endforeach				        
				    </tbody>
				</table>

            </div>
        </div>
@endsection