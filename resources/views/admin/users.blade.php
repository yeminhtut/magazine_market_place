@extends('layout.layout')

@section('content')
        <div class="container" style="margin-top:50px;">
            <div class="content">                
                <div style="padding: 40px 0px;">
                	<button type="button" class="btn btn-default">Add New User</button>
                </div>
				<table class="table table-striped">
				    <thead>
				        <tr>
				            <th>Id</th>
				            <th>Name</th>
				            <th>Email</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($users as $user)
				    	<tr>
				            <th scope="row">{{$user->id}}</th>
				            <td>{{$user->name}}</td>
				            <td>{{$user->email}}</td>
				            <td></td>
				        </tr>
						@endforeach				        
				    </tbody>
				</table>

            </div>
        </div>
@endsection