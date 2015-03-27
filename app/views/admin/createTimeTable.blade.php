@extends('admin.layout.adminLayout')

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Your Details<small>These are the details of you as per our database.</small></h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        User Profile
    </li>
</ol>
@stop

@section('content')
<!-- Start: PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- start: EXPORT DATA TABLE PANEL  -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Crete<span class="text-bold">TimeTable</span></h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-add-classes">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="edit-row-classes">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="delete-row-classes">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: EXPORT DATA TABLE PANEL -->
    </div>
</div>
<!-- end: PAGE CONTENT-->
@stop
@section('scripts')

<!-- Scripts for This page only -->
<script>
    jQuery(document).ready(function() {
        Main.init();
        SVExamples.init();
    });
</script>

@stop
