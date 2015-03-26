var TableDataSections = function() {
    "use strict";
    //function to initiate DataTable
    //DataTable is a highly flexible tool, based upon the foundations of progressive enhancement,
    //which will add advanced interaction controls to any HTML table
    //For more information, please visit https://datatables.net/
    var runDataTable_AddSections = function() {
        var newRow = false;
        var actualEditingRow = null;

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control" id="new-input" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<a class="save-row-sections" href="">Save</a>';
            jqTds[2].innerHTML = '<a class="cancel-row-sections" href="">Cancel</a>';

        }

        function saveRow(oTable, nRow, dataId) {
            var jqInputs = $('input', nRow);
            var isExistsId = nRow.getAttribute('id');
            if (isExistsId === null) {
                nRow = nRow.setAttribute('id', dataId);
            }
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate('<a class="edit-row-sections" href="">Edit</a>', nRow, 1, false);
            oTable.fnUpdate('<a class="delete-row-sections" href="">Delete</a>', nRow, 2, false);
            oTable.fnDraw();
            newRow = false;
            actualEditingRow = null;
        }

        $('body').on('click', '.add-row-sections', function(e) {
            e.preventDefault();
            if (newRow == false) {
                if (actualEditingRow) {
                    restoreRow(oTable, actualEditingRow);
                }
                newRow = true;
                var aiNew = oTable.fnAddData(['', '', '']);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                actualEditingRow = nRow;
            }
        });
        $('#table-add-sections').on('click', '.cancel-row-sections', function(e) {
            e.preventDefault();
            if (newRow) {
                newRow = false;
                actualEditingRow = null;
                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);

            } else {
                restoreRow(oTable, actualEditingRow);
                actualEditingRow = null;
            }
            oTable.parentsUntil(".panel").find(".errorHandler").addClass("no-display");
        });
        $('#table-add-sections').on('click', '.delete-row-sections', function(e) {
            e.preventDefault();
            if (newRow && actualEditingRow) {
                oTable.fnDeleteRow(actualEditingRow);
                newRow = false;

            }
            var nRow = $(this).parents('tr')[0];
            var id = $(this).parents('tr').attr('id');
            var stream_name = $(this).parent().prev().prev().text();

            var data = {
                stream_id: id,
                stream_name: stream_name
            };

            bootbox.confirm("Are you sure to delete this row?", function(result) {
                if (result) {
                    $.blockUI({
                        message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
                    });
                    $.ajax({
                        url: 'http://localhost/projects/schools/public/administrator/admin/time/table/delete/stream',
                        dataType: 'json',
                        method: 'POST',
                        data: data,
                        success: function(data, response) {
                            $.unblockUI();
                            oTable.fnDeleteRow(nRow);
                            var cTableRows = $('#table-add-classes').find(".sorting_1").parent().parent().find('td[id="' + data.deleted_item_id + '"]').parent();
                            var i;
                            for (i = 0; i < cTableRows.length; i++) {
                                cTableRows[i].remove();
                            }
                        }
                    });

                }
            });



        });
        $('#table-add-sections').on('click', '.save-row-sections', function(e) {
            e.preventDefault();

            var nRow = $(this).parents('tr')[0];
            var input = $(this).parents('tr').find('#new-input').val();
            var id = $(this).parents('tr').attr('id');
            var data = {
                stream_name: input,
                stream_id: id
            };
            $.blockUI({
                message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
            });
            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/add/stream',
                dataType: 'json',
                method: 'POST',
                data: data,
                success: function(data, response) {
                    $.unblockUI();
                    if (data.status == "success") {
                        saveRow(oTable, nRow, data.data_send.id);
                    } else if (data.status == "failed") {
                        oTable.parentsUntil(".panel").find(".errorHandler").removeClass("no-display").html('<p class="help-block alert-danger">' + data.error_messages.stream_name + '</p>');
                    }
                }
            });
        });
        $('#table-add-sections').on('click', '.edit-row-sections', function(e) {
            e.preventDefault();
            if (actualEditingRow) {
                if (newRow) {
                    oTable.fnDeleteRow(actualEditingRow);
                    newRow = false;
                } else {
                    restoreRow(oTable, actualEditingRow);

                }
            }
            var nRow = $(this).parents('tr')[0];

            editRow(oTable, nRow);
            actualEditingRow = nRow;

        });
        var oTable = $('#table-add-sections').dataTable({
            "aoColumnDefs": [{
                    "aTargets": [0]
                }],
            "oLanguage": {
                "sLengthMenu": "Show _MENU_ Rows",
                "sSearch": "",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "aaSorting": [[1, 'asc']],
            "aLengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
        });
        $('#table-add-sections_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('#table-add-sections_wrapper .dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('#table-add-sections_wrapper .dataTables_length select').select2();
        // initialzie select2 dropdown
        $('#table-add-sections_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
        $('#form-field-select-classes').on('change', function() {
            var optionValue = $(this).val();

            if (optionValue !== "" && optionValue !== "undefined" && optionValue !== null) {
                $('#subview-add-sections').find('#add-section-button').removeClass("no-display");
            } else {
                $('#subview-add-sections').find('#add-section-button').addClass("no-display");
            }
            $.blockUI({
                message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
            });

            var data = {
                class_id: optionValue
            };

            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/get/sections',
                dataType: 'json',
                method: 'POST',
                data: data,
                success: function(data, response) {
                    $('#table-add-sections').find('tbody').find('tr').remove();
                    $.unblockUI();
                    var i;
                    for (i = 0; i < data.sections.length; i++) {
                        $('#table-add-sections').find('tbody').append('<tr><td>' + data.sections[i].section_name + '</td><td><a class="edit-row-sections" href="#">Edit</a></td><td><a class="delete-row-sections" href="#">Delete</a></td></tr>');
                    }
                }
            });

        });
    };

    var fetchClasses = function() {

        $.ajax({
            url: 'http://localhost/projects/schools/public/administrator/admin/time/table/get/classes',
            dataType: 'json',
            method: 'POST',
            success: function(data, response) {
                var i;
                for (i = 0; i < data.classes.length; i++) {
                    $('#form-field-select-classes').append('<option value=' + data.classes[i].id + '>' + data.classes[i].class + '</option>');
                }
            }
        });
    };
    return {
        //main function to initiate template pages
        init: function() {
            runDataTable_AddSections();
            fetchClasses();
        }
    };
}();
