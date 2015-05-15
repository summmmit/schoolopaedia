var TableDataPeriods = function() {
    "use strict";

    var periods = function() {
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
            jqTds[0].innerHTML = '<input type="text" id="period_name" class="form-control" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control" value="' + aData[1] + '" id="start_time" data-format="HH:mm" data-template="HH : mm">';
            jqTds[2].innerHTML = '<input type="text" class="form-control" value="' + aData[2] + '" id="end_time" data-format="HH:mm" data-template="HH : mm">';

            jqTds[3].innerHTML = '<a class="save-row-periods" href="">Save</a>';
            jqTds[4].innerHTML = '<a class="cancel-row-periods" href="">Cancel</a>';

            $('#start_time,#end_time').each(function() {
                $(this).combodate({
                    firstItem: 'none', //show 'hour' and 'minute' string at first item of dropdown
                    minuteStep: 5
                });
            });

        }

        function timeFormat(time) {
            var timeString = time.split(':');
            var AmPm = timeString[1];
            var timeAmPm = AmPm.split(' ');

            if (timeAmPm[1] == "AM" || timeAmPm[1] == "PM") {
                timeAmPm[1] = "";
                timeString[1] = timeAmPm[0] + timeAmPm[1];
            }

            if (timeString[0] > '12') {
                timeString[0] = timeString[0] - 12;
                timeString[2] = 'PM';
            } else if (timeString[0] < '12') {
                timeString[2] = 'AM';
            }else{
                timeString[2] = 'PM';
            }
            time = timeString[0] + ':' + timeString[1] + ' ' + timeString[2];
            return time;
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);

            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(timeFormat(jqInputs[1].value), nRow, 1, false);
            oTable.fnUpdate(timeFormat(jqInputs[2].value), nRow, 2, false);
            oTable.fnUpdate('<a class="edit-row-periods" href="">Edit</a>', nRow, 3, false);
            oTable.fnUpdate('<a class="delete-row-periods" href="">Delete</a>', nRow, 4, false);
            oTable.fnDraw();
            newRow = false;
            actualEditingRow = null;
        }

        $('body').on('click', '.add-row-periods', function(e) {
            e.preventDefault();
            if (newRow == false) {
                if (actualEditingRow) {
                    restoreRow(oTable, actualEditingRow);
                }
                newRow = true;
                var aiNew = oTable.fnAddData(['', '', '', '', '']);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                actualEditingRow = nRow;
            }
        });
        $('#table-school-periods').on('click', '.cancel-row-periods', function(e) {

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
        });
        $('#table-school-periods').on('click', '.delete-row-periods', function(e) {
            e.preventDefault();
            if (newRow && actualEditingRow) {
                oTable.fnDeleteRow(actualEditingRow);
                newRow = false;

            }
            var nRow = $(this).parents('tr')[0];

            var data = {
                period_id: $(this).parents('tr').attr('data-period-id'),
                period_name: $(this).parents('tr').find('#period_name').val(),
                start_time: $(this).parents('tr').find('#start_time').val(),
                end_time: $(this).parents('tr').find('#end_time').val()
            };

            bootbox.confirm("Are you sure to delete this row?", function(result) {
                if (result) {
                    $.blockUI({
                        message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
                    });
                    $.ajax({
                        url: serverUrl + '/admin/delete/school/periods',
                        dataType: 'json',
                        data: data,
                        method: 'POST',
                        success: function(data) {
                            $.unblockUI();
                            if (data.status === "success") {
                                oTable.fnDeleteRow(nRow);
                                 toastr.success('This Period Has Been Deleted Successfully');
                            }
                        }
                    });

                }
            });



        });

        function validation(data) {

            if (data.period_name === "undefined" || data.period_name === "") {
                return false;
            } else if (data.start_time === "undefined" || data.start_time === "") {
                return false;
            } else if (data.end_time === "undefined" || data.end_time === "") {
                return false;
            }

            return true;

        }

        function errorPlacement(id, data) {

            var fieldName;
            $(id).parents('.panel-body').find('.errorHandler').find('p').remove('p');
            if (data.period_name === "undefined" || data.period_name === "") {
                fieldName = "Period Name";
            } else if (data.start_time === "undefined" || data.start_time === "") {
                fieldName = "Period Start Time";
            } else if (data.end_time === "undefined" || data.end_time === "") {
                fieldName = "Period End Time";
            }

            $(id).parents('.panel-body').find('.errorHandler').removeClass('no-display').append('<p>Please Input ' + fieldName + ' .</p>');

        }
        $('#table-school-periods').on('click', '.save-row-periods', function(e) {
            e.preventDefault();

            var nRow = $(this).parents('tr')[0];

            var data = {
                period_id: $(this).parents('tr').attr('data-period-id'),
                period_name: $(this).parents('tr').find('#period_name').val(),
                start_time: $(this).parents('tr').find('#start_time').val(),
                end_time: $(this).parents('tr').find('#end_time').val()
            };

            if (validation(data)) {

                $(this).parents('.panel-body').find('.errorHandler').addClass('no-display');

                $.blockUI({
                    message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
                });

                $.ajax({
                    url: serverUrl + '/admin/set/school/periods',
                    dataType: 'json',
                    data: data,
                    method: 'POST',
                    success: function(data) {
                        $.unblockUI();
                        if (data.status === "success") {
                            saveRow(oTable, nRow);
                            toastr.success('New Period Has Been Added Successfully');
                        }
                    }
                });
            } else {
                errorPlacement(this, data);
            }
        });
        $('#table-school-periods').on('click', '.edit-row-periods', function(e) {
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
        var oTable = $('#table-school-periods').dataTable({
            paging: false,
            searching: false,
            ordering: false,
            info: false
        });
        $('#table-school-periods_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('#table-school-periods_wrapper .dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('#table-school-periods_wrapper .dataTables_length select').select2();
        // initialzie select2 dropdown
        $('#table-school-periods_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
        
        $('#make-current-period-profile').on('ifChecked', function(e){
            e.preventDefault();
            
            $('#table-school-periods').find('tbody').find('tr').each(function(){
                console.log(this);
            });
            
        });
    };

    var validation = function() {

    };
    return {
        //main function to initiate template pages
        init: function() {
            periods();
            validation();
        }
    };
}();
