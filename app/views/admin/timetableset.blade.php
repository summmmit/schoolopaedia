@extends('admin.layout.adminLayout')

@section('stylesheets')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/select2/select2.css'); }}" />
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
        <!-- start: EXPORT DATA TABLE PANEL  -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Export <span class="text-bold">Data</span> Table</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 space20">
                        <button class="btn btn-orange add-row">
                            Add New <i class="fa fa-plus"></i>
                        </button>
                        <div class="btn-group pull-right">
                            <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                Export <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-light pull-right">
                                <li>
                                    <a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as PDF
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as PNG
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-csv" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as CSV
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as TXT
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as XML
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as SQL
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Save as JSON
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Export to Excel
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Export to Word
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="3,4">
                                        Export to PowerPoint
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="sample-table-2">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Peter Clark</td>
                                <td>UI Designer</td>
                                <td>(641)-734-4763</td>
                                <td>
                                    <a href="#" class="edit-row">
                                        Edit
                                    </a></td>
                                <td>
                                    <a href="#" class="delete-row">
                                        Delete
                                    </a></td>
                            </tr>
                            <tr>
                                <td>Nicole Bell</td>
                                <td>Content Designer</td>
                                <td>(741)-034-4573</td>
                                <td>
                                    <a href="#" class="edit-row">
                                        Edit
                                    </a></td>
                                <td>
                                    <a href="#" class="delete-row">
                                        Delete
                                    </a></td>
                            </tr>
                            <tr>
                                <td>Steven Thompson</td>
                                <td>Visual Designer</td>
                                <td>(471)-543-4073</td>
                                <td>
                                    <a href="#" class="edit-row">
                                        Edit
                                    </a></td>
                                <td>
                                    <a href="#" class="delete-row">
                                        Delete
                                    </a></td>
                            </tr>
                            <tr>
                                <td>Ella Patterson</td>
                                <td>Web Editor</td>
                                <td>(799)-994-9999</td>
                                <td>
                                    <a href="#" class="edit-row">
                                        Edit
                                    </a></td>
                                <td>
                                    <a href="#" class="delete-row">
                                        Delete
                                    </a></td>
                            </tr>
                            <tr>
                                <td>Kenneth Ross</td>
                                <td>Senior Designer</td>
                                <td>(111)-114-1173</td>
                                <td>
                                    <a href="#" class="edit-row">
                                        Edit
                                    </a></td>
                                <td>
                                    <a href="#" class="delete-row">
                                        Delete
                                    </a></td>
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
<script type="text/javascript" src="{{ URL::asset('assets/plugins/select2/select2.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/tableExport/tableExport.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/tableExport/jquery.base64.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/tableExport/html2canvas.js'); }}"></script>
<script type="text/javascript" src=""></script>
<script src="{{ URL::asset('assets/plugins/tableExport/jquery.base64.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/tableExport/jspdf/libs/sprintf.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/tableExport/jspdf/jspdf.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/tableExport/jspdf/libs/base64.js'); }}"></script>
<script src="{{ URL::asset('assets/js/table-export.js'); }}"></script>
<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
    TableExport.init();
});
</script>
@stop