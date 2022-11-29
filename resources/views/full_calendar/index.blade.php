<!DOCTYPE html>
<html>
<head>
    <title>Employee scheduler</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
</head>
<body>
  
<div class="container">
    <br />
    <h1 class="text-center text-primary"><u>Employee scheduler</u></h1>
   
    <div id="calendar"></div>

</div>
   
<div class="modal fade" id="create_event_modal" tabindex="-1" aria-labelledby="create_event_modal_label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create_event_modal_label">New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="create_event_from">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <select class="form-control" name="title" id="">
                        <option value="dept1">Department 1</option>
                        <option value="dept2">Department 2</option>
                        <option value="dept3">Department 3</option>
                        <option value="dept4">Department 4</option>
                    {{-- </select>
                    <input class="form-control" type="text" name="title"> --}}
                </div>
                <div class="form-group">
                    <label for="favcolor">Start:</label>
                    <input class="form-control" type="datetime-local" name="start" >
                </div>
                <div class="form-group">
                    <label for="favcolor">End:</label>
                    <input class="form-control" type="datetime-local" name="end" >
                </div>
                <div class="form-group">
                    <label for="favcolor">Select color:</label>
                    <input class="form-control" type="color" id="favcolor" value="#00c5fb" name="color" >
                </div>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/full_calendar',
        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {
            $("#create_event_modal").modal('show');
            var title, color;
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
            $("#create_event_from").on('submit', function(e){
                e.preventDefault();
                title=$("input[name='title']",this).val();
                color=$("input[name='color']",this).val();
                start=$("input[name='start']",this).val();
                end=$("input[name='end']",this).val();
                if(title)
                {
                    $("#create_event_modal").modal('hide');

                    $.ajax({
                        url:"/full_calendar/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            color: color,
                            type: 'add'
                        },
                        success:function(data)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Created Successfully");
                        }
                    })
                }
            });
            // var title = prompt(['Event Title:']);
            
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full_calendar/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    // alert("Event Updated Successfully");                    
                    console.log("Event Updated Successfully");
                }
            })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full_calendar/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    // alert("Event Updated Successfully");                    
                    console.log("Event Updated Successfully");
                }
            })
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"/full_calendar/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Deleted Successfully");
                    }
                })
            }
        }
    });

});
  
</script>
  
</body>
</html>
