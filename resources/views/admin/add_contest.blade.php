@extends('layout.layout')


@section('content')
<div class="container" id="main-container" style="margin-top:50px;">
        
    <div class="page-header">
        <h2>New Contest</h2>
    </div>
    
    @if( Session::has('status') )
    <div class="alert bg-success notification">
        {{Session::get('status')}}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger notification">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div>
        <form class="form-horizontal" method="post" action="{{route('admin_do_add_contest')}}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Contest Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contest_name" name="contest_name" value="{{ old('name') }}" required/>
                </div>
            </div>       
            
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Start Date</label>
                <div class="col-sm-10">                    
                        <div class='input-group date' id='datetimepicker_start_date'>
                            <input type='text' class="form-control" name="start_date" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>                    
                </div>
            </div> 

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">End Date</label>
                <div class="col-sm-10">                    
                        <div class='input-group date' id='datetimepicker_end_date'>
                            <input type='text' class="form-control" name="end_date" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>                    
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker_start_date').datetimepicker();
        $('#datetimepicker_end_date').datetimepicker();
    });
</script>
@endsection