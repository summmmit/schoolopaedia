var TableDataTimeTable = function() {
    "use strict";
    var runDataTable_TimeTable = function() {
        var newRow = false;
        var actualEditingRow = null;

        function restoreRow(oTimeTable, nRow) {
            var aData = oTimeTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTimeTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTimeTable.fnDraw();
        }

        function editRow(oTimeTable, nRow, rowData) {
            var aData = oTimeTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '#';
            var sTime, eTime;
            if (aData[1]) {
                var time = aData[1].split('-');
                sTime = time[0];
                eTime = time[1];
            } else {
                sTime = "";
                eTime = "";
            }
            var startTime = '<div class="col-md-6"><input type="text" class="form-control" id="new-input-start-time" value="' + sTime + '"></div>';
            var endTime = '<div class="col-md-6"><input type="text" class="form-control" id="new-input-end-time" value="' + eTime + '"></div>';
            jqTds[1].innerHTML = startTime + endTime;
            jqTds[2].innerHTML = '<select id="form-field-select-subject" class="form-control search-select"><option value="">Select Subject....</option> </select>';
            jqTds[3].innerHTML = '<select id="form-field-select-teacher" class="form-control search-select"><option value="">Select Teacher....</option> </select>';
            jqTds[4].innerHTML = '';
            jqTds[5].innerHTML = '<a class="save-row-time-table" href="#">Save</a>';
            jqTds[6].innerHTML = '<a class="cancel-row-time-table" href="#">Cancel</a>';

            var data = {
                class_id: rowData.class_id
            };
            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/get/subjects',
                dataType: 'json',
                method: 'POST',
                data: data,
                success: function(data, response) {
                    var selectSubject = oTimeTable.find('#form-field-select-subject');
                    var selectSubjectRowId = oTimeTable.find('#form-field-select-subject').parent().attr('id');
                    var i;
                    for (i = 0; i < data.subjects.length; i++) {
                        if( data.subjects[i].id == rowData.subject_id){
                            selectSubject.append('<option value="' + data.subjects[i].id + '" selected>' + data.subjects[i].subject_name + ' ( ' + data.subjects[i].subject_code + ')' + '</option>');
                        }else{
                            selectSubject.append('<option value="' + data.subjects[i].id + '">' + data.subjects[i].subject_name + ' ( ' + data.subjects[i].subject_code + ')' + '</option>');
                        }
                    }
                }
            });

            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/get/teachers',
                dataType: 'json',
                method: 'POST',
                success: function(data, response) {
                    var selectTeacher = oTimeTable.find('#form-field-select-teacher');
                    var selectTeacherRowId = oTimeTable.find('#form-field-select-teacher').parent().attr('id');
                    var i;
                    for (i = 0; i < data.teachers.length; i++) {
                        var name = data.teachers[i].first_name + ' ' + data.teachers[i].middle_name + ' ' + data.teachers[i].last_name;
                        // var picUrl = "http://localhost/projects/schools/public/assets/projects/images/" + data.teachers[i].pic;
                        //var pic = '<img class="thumbnail" src="'+ picUrl +'" height="50px" width="50px">';
                        if(data.teachers[i].id == rowData.teacher_id){
                            selectTeacher.append('<option value="' + data.teachers[i].id + '" selected>' + name + '</option>');
                        }else{
                            selectTeacher.append('<option value="' + data.teachers[i].id + '">' + name + '</option>');
                        }
                    }
                }
            });

            oTimeTable.find('#new-input-start-time').timepicki({
                show_meridian: false,
                min_hour_value: 0,
                max_hour_value: 23,
                step_size_minutes: 15,
                overflow_minutes: true,
                increase_direction: 'up',
                disable_keyboard_mobile: true}
            );
            oTimeTable.find('#new-input-end-time').timepicki({
                show_meridian: false,
                min_hour_value: 0,
                max_hour_value: 23,
                step_size_minutes: 15,
                overflow_minutes: true,
                increase_direction: 'up',
                disable_keyboard_mobile: true}
            );


        }

        function saveRow(oTimeTable, nRow, data) {
            var jqInputs = $('input', nRow);
            var isExistsId = nRow.getAttribute('id');
            if (isExistsId === null) {
                nRow.setAttribute('id', data.result.period.id);
            }
            oTimeTable.fnUpdate(oTimeTable.fnSettings().aoData.length, nRow, 0, false);
            var timings = timeFormat(data.result.period.start_time) + ' - ' + timeFormat(data.result.period.end_time);
            oTimeTable.fnUpdate(timings, nRow, 1, false);
            var subject = data.result.subject.subject_name + ' ( ' + data.result.subject.subject_code + ' )';
            oTimeTable.fnUpdate(subject, nRow, 2, false);
            var teacher = data.result.teacher.first_name + ' ' + data.result.teacher.middle_name + ' ' + data.result.teacher.last_name;
            oTimeTable.fnUpdate(teacher, nRow, 3, false);
            var picUrl = "http://localhost/projects/schools/public/assets/projects/images/" + data.result.teacher.pic;
            var pic = '<img class="thumbnail" src="' + picUrl + '" height="50px" width="50px">';
            oTimeTable.fnUpdate(pic, nRow, 4, false);
            oTimeTable.fnUpdate('<a class="edit-row-time-table" href="">Edit</a>', nRow, 5, false);
            oTimeTable.fnUpdate('<a class="delete-row-time-table" href="">Delete</a>', nRow, 6, false);
            oTimeTable.fnDraw();
            newRow = false;
            actualEditingRow = null;
        }

        $('body').on('click', '#add-row-time-table', function(e) {
            e.preventDefault();
            if (newRow === false) {
                if (actualEditingRow) {
                    restoreRow(oTimeTable, actualEditingRow);
                }
                newRow = true;
                var aiNew = oTimeTable.fnAddData(['', '', '', '', '', '', '']);
                var nRow = oTimeTable.fnGetNodes(aiNew[0]);

                var rowData = {
                    class_id: $(this).parentsUntil('.panel').find('#field-select-time-table-class').val()
                }

                editRow(oTimeTable, nRow, rowData);
                actualEditingRow = nRow;
            }
        });
        $('#table-add-class-time-table').on('click', '.cancel-row-time-table', function(e) {
            e.preventDefault();
            if (newRow) {
                newRow = false;
                actualEditingRow = null;
                var nRow = $(this).parents('tr')[0];
                oTimeTable.fnDeleteRow(nRow);

            } else {
                restoreRow(oTimeTable, actualEditingRow);
                actualEditingRow = null;
            }
            oTimeTable.parentsUntil(".panel").find(".errorHandler").addClass("no-display");
        });
        $('#table-add-class-time-table').on('click', '.delete-row-time-table', function(e) {
            e.preventDefault();
            if (newRow && actualEditingRow) {
                oTimeTable.fnDeleteRow(actualEditingRow);
                newRow = false;

            }
            var nRow = $(this).parents('tr')[0];
            var period_id = $(this).parents('tr').attr('id');
            var class_id = $(this).parentsUntil('.panel').find('#field-select-time-table-class').val();
            var subject_id = $(this).parent().prev().prev().prev().prev().attr('id');
            var teacher_id = $(this).parent().prev().prev().prev().attr('id');

            var data = {
                period_id: period_id,
                class_id: class_id,
                subject_id: subject_id,
                teacher_id: teacher_id
            };

            bootbox.confirm("Are you sure to delete this row? If you Delete it, Classes , Subjects and Sections associated with it will also get delete.", function(result) {
                if (result) {
                    $.blockUI({
                        message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
                    });
                    $.ajax({
                        url: 'http://localhost/projects/schools/public/administrator/admin/time/table/delete/periods',
                        dataType: 'json',
                        method: 'POST',
                        data: data,
                        success: function(data, response) {
                            $.unblockUI();
                            oTimeTable.fnDeleteRow(nRow);
                            toastr.info('You have successfully deleted Timetable Period');
                        }
                    });

                }
            });



        });
        $('#table-add-class-time-table').on('click', '.save-row-time-table', function(e) {
            e.preventDefault();

            var nRow = $(this).parents('tr')[0];
            var class_id = $(this).parentsUntil('.panel').find('#field-select-time-table-class').val();
            var period_id = $(this).parents('tr').attr('id');
            var start_time = $(this).parents('tr').find('#new-input-start-time').val();
            var end_time = $(this).parents('tr').find('#new-input-end-time').val();
            var subject_id = $(this).parents('tr').find('#form-field-select-subject').val();
            var teacher_id = $(this).parents('tr').find('#form-field-select-teacher').val();

            var data = {
                class_id: class_id,
                period_id: period_id,
                start_time: start_time,
                end_time: end_time,
                subject_id: subject_id,
                teacher_id: teacher_id
            };

            $.blockUI({
                message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
            });
            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/add/periods',
                dataType: 'json',
                method: 'POST',
                data: data,
                success: function(data, response) {
                    $.unblockUI();
                    if (data.status === "success") {
                        saveRow(oTimeTable, nRow, data);
                        toastr.success('You have successfully added this Period');
                    } else if (data.status === "failed") {
                        oTimeTable.parentsUntil(".panel").find(".errorHandler").removeClass("no-display").html('<p class="help-block alert-danger">' + data.error_messages.start_time + '</p>');
                    }
                }
            });
        });

        $('#table-add-class-time-table').on('click', '.edit-row-time-table', function(e) {
            e.preventDefault();
            if (actualEditingRow) {
                if (newRow) {
                    oTimeTable.fnDeleteRow(actualEditingRow);
                    newRow = false;
                } else {
                    restoreRow(oTimeTable, actualEditingRow);

                }
            }
            var nRow = $(this).parents('tr')[0];

            var rowData = {
                class_id: $(this).parentsUntil('.panel').find('#field-select-time-table-class').val(),
                period_id: $(this).parents('tr').attr('id'),
                subject_id: $(this).parent().prev().prev().prev().attr('id'),
                teacher_id: $(this).parent().prev().prev().attr('id')
            }

            editRow(oTimeTable, nRow, rowData);
            actualEditingRow = nRow;

        });
        var oTimeTable = $('#table-add-class-time-table').dataTable({
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
            "iDisplayLength": 10
        });
        $('#table-add-class-time-table_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('#table-add-class-time-table_wrapper .dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('#table-add-class-time-table_wrapper .dataTables_length select').select2();
        // initialzie select2 dropdown
        $('#table-add-class-time-table_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTimeTable.fnSettings().aoColumns[iCol].bVisible;
            oTimeTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });

        $('#field-select-time-table-class').on('change', function() {
            var optionValue = $(this).val();

            if (optionValue) {
                $('#add-row-time-table').removeClass("no-display");
            } else {
                $('#add-row-time-table').addClass("no-display");
            }
            $.blockUI({
                message: '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
    
            });

            var data = {
                class_id: optionValue
            };

            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/get/periods',
                dataType: 'json',
                method: 'POST',
                data: data,
                success: function(data, response) {
                    oTimeTable.fnClearTable();
                    $.unblockUI();
                    var i;
                    for (i = 0; i < data.result.periods.length; i++) {
                        deleteAndCreateTable(oTimeTable, i, data.result.periods);
                    }
                }
            });
            if (newRow) {
                newRow = false;
                actualEditingRow = null;
                var nRow = $(this).parents('tr')[0];
                oTimeTable.fnDeleteRow(nRow);

            } 

        });
        function deleteAndCreateTable(oTimeTable, i, periods) {

            var aiNew = oTimeTable.fnAddData(['', '', '', '', '', '', '']);
            var nRow = oTimeTable.fnGetNodes(aiNew[0]);
            nRow.setAttribute('id', periods[i].timings.id);

            oTimeTable.fnUpdate(i + 1, nRow, 0, false);
            oTimeTable.fnUpdate(timeFormat(periods[i].timings.start_time) + " - " + timeFormat(periods[i].timings.end_time), nRow, 1, false);

            var nTr = oTimeTable.fnSettings().aoData;
            nTr = nTr[nTr.length - 1];
            nTr = nTr.nTr;

            oTimeTable.fnUpdate(periods[i].subject.subject_name + '  (' + periods[i].subject.subject_code + ')', nRow, 2, false);
            $('td', nTr)[2].setAttribute('id', periods[i].subject.id);

            oTimeTable.fnUpdate(periods[i].teacher.first_name + ' ' + periods[i].teacher.last_name, nRow, 3, false);
            $('td', nTr)[3].setAttribute('id', periods[i].teacher.id);

            var urls = "http://localhost/projects/schools/public/assets/projects/images/" + periods[i].teacher.pic;
            oTimeTable.fnUpdate('<img class="thumbnail" src="' + urls + '" width="50px" height="50px">', nRow, 4, false);

            oTimeTable.fnUpdate('<a class="edit-row-time-table" href="#">Edit</a>', nRow, 5, false);
            oTimeTable.fnUpdate('<a class="delete-row-time-table" href="#">Delete</a>', nRow, 6, false);

            oTimeTable.fnDraw();

            nRow = false;
        }

        function timeFormat(time) {
            var timeString = time.split(':');

            if (timeString[0] > '12') {
                timeString[0] = timeString[0] - 12;
                timeString[2] = 'PM';
            } else {
                timeString[2] = 'AM';
            }
            time = timeString[0] + ':' + timeString[1] + ' ' + timeString[2];
            return time;
        }
    };
    
    var fetchClasses = function() {
            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/time/table/get/class/streams/pair',
                dataType: 'json',
                method: 'POST',
                success: function(data, response) {
                    var i;
                    for (i = 0; i < data.stream_class_pairs.length; i++) {
                        $('#field-select-time-table-class').append('<option value=' + data.stream_class_pairs[i].classes_id + '>' + data.stream_class_pairs[i].stream_class_pair + '</option>');
                    }
                }
            });
        };
    
    return {
        //main function to initiate template pagesa
        init: function() {
            runDataTable_TimeTable();
            fetchClasses();
        }
    };
}();
