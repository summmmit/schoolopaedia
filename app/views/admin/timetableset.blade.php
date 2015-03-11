@extends('admin.layout.adminLayout')

@section('stylesheets')
@stop

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Time Table <small>Timining chart for teachers and classes.</small></h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        Time Table
    </li>
</ol>
@stop
@section('content')
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Session: <span class="text-bold">2015 - 2016</span></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-green show-sv" href="#subview-add-classes" data-startFrom="right">
                            Show Right Subview <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-green show-sv" href="#subview-add-streams" data-startFrom="right">
                            Add New Stream <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-orange add-row">
                            Add New Section<i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-orange add-row">
                            Add New Subject<i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- start: EXPORT DATA TABLE PANEL  -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Export <span class="text-bold">Data</span> Table</h4>
            </div>
            <div class="panel-body">
            </div>
        </div>
        <!-- end: EXPORT DATA TABLE PANEL -->
    </div>
</div>
<!-- end: PAGE CONTENT-->
@stop

@section('subview')
<div id="subview-add-classes" class="no-display">
    <div class="col-md-8 col-md-offset-2">
        <h3>Classes Present Now</h3>
        <div class="row">
            <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-full-width text-center" id="table-classes">
                                    <thead >
                                    <tr>
                                        <th class="text-center">Class Name</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classes as $class)
                                        <tr>
                                            <td>{{ $class->class }}</td>
                                            <td>
                                                <a href="#">Edit</a>
                                            </td>
                                            <td>
                                                <a href="#">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ URL::route('admin-time-table-add-classes'); }}" role="form" name="form-add-classes" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" placeholder="Add New Class Name" class="form-control" id="input-add-classes" name="class">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-yellow btn-block" type="submit">
                                Add New Class <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        <i class="fa fa-spinner fa-spin" style="display: none;" id="spinner-add-classes"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="subview-add-streams" class="no-display">
    <div class="col-md-8 col-md-offset-2">
        <h3>Infinite Subview Page 1</h3>
        <p>
            Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
        </p>
        <a class="btn btn-blue pull-right show-sv" href="#example-subview-3">
            Continue...
        </a>
    </div>
</div>
@stop

@section('scripts')
<!-- Scripts for This page only -->
<script src="{{ URL::asset('assets/js/ui-subview.js'); }}"></script>             <!-- For Subview -->
<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
    UISubview.init();

    $('form[name="form-add-classes"]').on('submit', function(e){
        e.preventDefault();

        var form = $(this);
        var url = form.prop('action');
        var data = form.serialize();

        $('#spinner-add-classes').show();

        $.ajax({
            url : url,
            async : true,
            data : data,
            method : 'POST',
            dataType : 'json',
            success : function(data, response){
                $('#input-add-classes').val('');
                $('#spinner-add-classes').hide();
                $('#table-classes').prepend("<tr><td>"+ data.data_send.class_name +"</td></tr>");
            }

        });
    });
});
</script>
@stop