var Schedule = function() {
    "use strict";
    var schoolschedule = function() {

        $('#form-submit-new-schedule').on('click', function(e) {
            e.preventDefault();

            var schedule_starts_from = $(this).parents('form').find('#schedule-starts-from').val();
            var schedule_ends_untill = $(this).parents('form').find('#schedule-ends-untill').val();
            var school_opening_time = $(this).parents('form').find('#school-opening-time').val();
            var school_lunch_time = $(this).parents('form').find('#school-lunch-time').val();
            var school_closing_time = $(this).parents('form').find('#school-closing-time').val();

            var data = {
                schedule_starts_from: schedule_starts_from,
                schedule_ends_untill: schedule_ends_untill,
                school_opening_time: school_opening_time,
                school_lunch_time: school_lunch_time,
                school_closing_time: school_closing_time
            }

            $.ajax({
                url: 'http://localhost/projects/schools/public/administrator/admin/school/set/schedule/post',
                dataType: 'json',
                data: data,
                method: 'POST',
                success: function(data, response) {
                    toastr.info("You Have successfully created this Schedule");
                    
                    addNewRowToScheduleTable(data.result.schedule);
                    
                }
            });

        });
        
        function addNewRowToScheduleTable(schedule){
            console.log(schedule);
            var header = '<tr><td colspan="2" class="text-center text-box-light">{{ date_format(date_create('+ schedule.start_from +'), "F") }} - {{ date_format(date_create('+ schedule.close_untill +'), "F") }}</td></tr>';
            
            $('#table-school-schedule').find('tbody').append(header);
        
        }

    };

    return {
        //main function to initiate template pages
        init: function() {
            schoolschedule();
        }
    };
}();