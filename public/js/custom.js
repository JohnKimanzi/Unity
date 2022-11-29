
$( window ).on( "load", function() {
    $('.page-loading').addClass('d-none')
});

// toggle search bar on/off
$('body').on('click', '#show-search-bar-btn', function(e){
    if ($("#pool-filter-section").hasClass("d-none")) {
        $('#pool-content').addClass('col-md-9');
        $('#pool-filter-section').removeClass('d-none');
        $('#show-search-bar-btn').html("<i class='la la-chevron-left'></i> Hide Seach Bar");
    } else {
        $('#pool-content').removeClass('col-md-9');
        $('#pool-filter-section').addClass('d-none');
        $('#show-search-bar-btn').html("<i class='la la-chevron-right'></i> Show Seach Bar");
    }
}); 

$('body').on('click', "#show-leads-filter-btn", function(){
    if ($("#leads-filter-section").hasClass("d-none")) {
        $('#leads-filter-section').removeClass('d-none');
        $("#show-leads-filter-btn").html("<i class='la la-chevron-up'></i> Hide Seach Bar");
    }else{
        $('#leads-filter-section').addClass('d-none');
        $("#show-leads-filter-btn").html("<i class='la la-chevron-down'></i> Show Seach Bar");
    }
});

// listen for changes in mass update form and count number or records that are likely to be affected
$('#mass-update-form').on('change', '.mass-update-filter-field', function () {
    let record_count=0;
    $.ajax({
        url : "ajaxfilter",
        type : "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        data : {
            company_name : $("#mass-update-form #company_name").val(),
            email : $("#mass-update-form #email").val(),
            agent : $("#mass-update-form #agent").val(),
            closer : $("#mass-update-form #closer").val(),
            phone : $("#mass-update-form #phone").val(),
            phone : $("#mass-update-form #phone").val(),
            status : $("#mass-update-form #status").val(),
            bs_type : $("#mass-update-form #bs_type").val(),
            state : $("#mass-update-form #state").val(),
            batch : $("#mass-update-form #batch").val(),
            date_to : $("#mass-update-form #date_to").val(),
            date_from : $("#mass-update-form #date_from").val(),
            
        },
        success : function(response){
            if (response) {
                record_count=response.leads.length;
                $('#count-records-to-update').html(record_count);
                if (record_count>0) {
                    $('#mass-update-btn').prop('disabled',false);
                }else{
                    $('#mass-update-btn').prop('disabled',true);
                }
            }
        },
        error: function (e) { console.log("error " )     }
        
    }); 
    
});

// dialer
function dialerClick(type, value) {
    let input = $('#dialer_input_td input');
    let input_val = $('#dialer_input_td input').val();
    if (type == 'dial') {
        input.val(input_val + value);
    } else if (type == 'delete') {
        input.val(input_val.substring(0, input_val.length - 1));
    } else if (type == 'clear') {
        input.val("");
    }
}


$('#create_user .name_input').on('change', function(){
    autopopulate_email();
});
// $('#create_user .name_input').on('input', function(){
//     autopopulate_email()
// });

function autopopulate_email(){
    // alert('hi');
    let email = email_factory( $('#fname').val(), $('#lname').val(), $('#id').val() );
    email=email.concat('@unitedlegalgroup.com');
    $('#email').val(email);


}

function email_factory(fname, lname, id){
    let email='invalid email';
    let usable_fname = '';
    let usable_id = '';   

    if(fname && lname){
        // email='two';
        // alert(email);
        usable_fname=fname.charAt(0);
        usable_id = id.substring(id.length-4, id.length);
        //alert(usable_id);
        email=usable_fname.concat(lname);
 
        email=email.toLowerCase();

    //     // check if email exists, if yes append ssn
        jQuery.ajax({
            url : "check_email_exists",
            type : "POST",
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            data : {
                email : email.concat('@unitedlegalgroup.com'),            
            },
            success : function(response){
                if (response) {
                    // console.log(response);
                    if (response.exists) {
                        console.log(response.exists);
                      //  alert(email);
                        if(usable_id){
                            email=email.concat(usable_id);  
                            // return email;
                        }
                    }
                } 
            },
            error: function (e) { console.log(e)     }
        }); 
    }
    return email;
}

function update_email(email){
    $('#user_create #email').value(email);
    alert ('email set!');
}

$(document).ready( function () {
    $('.custom-data-table').DataTable({
        retrieve: true,
        searching: true,
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-copy"></i> Copy',
                titleAttr: 'Copy table',
                exportOptions: {
                    columns:  ':visible' 
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Export to Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            
            'colvis', 
        ],
        "pageLength": 10,
        "lengthMenu" : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]] 
    });
} );

/* FULL CALENDAR */
$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
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
            var title = prompt('Event Title:');

            if(title)
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/full_calendar/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Created Successfully");
                    }
                })
            }
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
/* FULL CALENDAR */



