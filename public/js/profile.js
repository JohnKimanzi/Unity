// Use this id to stop chat refresh
let chatResfreshIntervalID = 0;

function engage(btn_clicked) {

    var d = document.getElementById('content').childElementCount;
    while (d > 0) {
        document.getElementById('content').children[d - 1].style.display = "none";
        d--;
    }


    switch (btn_clicked) {
        case "convert":

            var call = document.getElementById('conversion_dialog');
            if (call.style.display == "none") {
                call.style.display = "block";
            } else {
                call.style.display = "none";
            }
            break;

        case "call_btn":

            var call_btn = document.getElementById('call_dialog');
            if (call_btn.style.display == "none") {
                call_btn.style.display = "block";
            } else {
                call_btn.style.display = "none";
            }
            break;
        case "upload":

            var upload = document.getElementById('upload_file');
            if (upload.style.display == "none") {
                upload.style.display = "block";
            } else {
                upload.style.display = "none";
            }
            break;

        case "scheduler":
            document.getElementById('content').style.display == "none";
            var scheduler = document.getElementById('meeting_scheduler');
            if (scheduler.style.display == "none") {
                scheduler.style.display = "block";
            } else {
                scheduler.style.display = "none";
            }
            break;
        case "doc_gen":

            var upload = document.getElementById('docgen');
            if (upload.style.display == "none") {
                upload.style.display = "block";
            } else {
                upload.style.display = "none";
            }
            break;

    }

}

function transaction(btn_clicked) {
    var d = document.getElementById('lead_transaction').childElementCount;
    while (d > 0) {
        document.getElementById('lead_transaction').children[d - 1].style.display = "none";
        d--;
    }

    switch (btn_clicked) {
        case "notes_btn":
            var notes = document.getElementById('notes_table');

            if (notes.style.display == "none") {
                notes.style.display = "block";

            } else {
                notes.style.display = "none";
            }
            break;

        case "lead_docs_btn":

            var doc = document.getElementById('lead_docs');

            if (doc.style.display == "none") {
                doc.style.display = "block";


            } else {
                doc.style.display = "none";
            }
            break;

        case "meetings_btn":

            var meet = document.getElementById('lead_meets');

            if (meet.style.display == "none") {
                meet.style.display = "block";

            } else {
                meet.style.display = "none";
            }
            break;

        case "contact_person_btn":

            var contact = document.getElementById('contact_list');

            if (contact.style.display == "none") {
                contact.style.display = "block";

            } else {
                contact.style.display = "none";
            }
            break;

        case "file_manager":

            var files = document.getElementById('file_managers');
            if (files.style.display == "none") {
                files.style.display = "block";
            } else {
                files.style.display = "none";
            }
            break;

        case "lead_info":
            document.getElementById('lead_info_no_edit').style.display = "none";
            var leads_info = document.getElementById('lead_info_editable');
            if (leads_info.style.display == "none") {
                leads_info.style.display = "block";

            } else {
                document.getElementById('lead_info_no_edit').style.display = "block";
                leads_info.style.display = "none";

            }
            break;
    }
}
function ChooseContact() {

    var contacts = document.getElementById('contacts');

    if (contacts.style.display == "none") {
        contacts.style.display = "block";

    } else {
        contacts.style.display = "none";
    }

}
function Addrep() {
    btn = document.getElementById('reps');
    btn.addEventListener('click', (e) => {
        e.preventDefault();

        input_value = document.getElementById("status").value;

        //    if(input_value.value==""){

        //         return
        //    }
        call_rep = document.getElementById("contact_person");

        options = new Option(input_value.value, input_value.value);

        lead_call_state.add(options);


        $('#add_call_status').modal('hide');

    });

}

function display(id) {
    var d = document.getElementById('content').childElementCount;
    while (d > 0) {
        document.getElementById('content').children[d - 1].style.display = "none";
        d--;
    }
    switch (id) {
        case "earn":
            var earn = document.getElementById('earnings_table');

            if (earn.style.display == "none") {
                earn.style.display = "block";
                earn.scrollIntoView(true);

            } else {
                earn.style.display = "none";
            }
            break;
        case "work":

            var earn = document.getElementById('workload');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;

        case "rest":
            var earn = document.getElementById('leave_app');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
        case "role":
            var earn = document.getElementById('roles');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
        case "supervise":
            var earn = document.getElementById('supervision_table');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
        case "leads":
            var earn = document.getElementById('assigned_leads');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
        case "uploads":
            var earn = document.getElementById('uploads_table');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
        case "logs":
            var earn = document.getElementById('user_logs');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
        case "bio":
            var earn = document.getElementById('biodata');

            if (earn.style.display == "none") {
                earn.style.display = "block";


            } else {
                earn.style.display = "none";
            }
            break;
    }
}
//Chat Arena

$(document).ready(function(){
    
    $('#chat_form').submit(function(e){
        
       e.preventDefault();
       $.ajax({
            url: "chat_post",
        
            method:"POST",
            
            data: {
                sender_id: jQuery('#sender').val(),
                recepient_id: jQuery('#chat_with').val(),
                subject: jQuery('#subject').val(),
                chat: jQuery('#chat').val(),
                _token: $("input[name=_token]").val(),
            },
            
            success: function(response){
                $('#chat').val(''); 
                fetchChat($('#chat_with').val());
            }
         });
     });
});
     
   
$('#chat_with').change(function(){
    var user_id = $(chat_with).find('option:selected').val();
    fetchChat(user_id);
    refreshChat();
});

function fetchChat(user_id){
   
        $('#chat_content').html("");
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: "chat_post/"+user_id,
            
            dataType: 'json',
            
            success: function (data) {
                $.each(data.chosen_chat,function(key,chats){
                    if(user_id==chats.sender_id){
                        $('#chat_content').prepend("\
                            <div class='chat chat-left'>\
                                <div class='chat-body row'>\
                                    <div class='chat-bubble'>\
                                        <div class='chat-content'>\
                                            <p>"+chats.chat+"</p>\
                                            <span class='chat-time'>"+chats.date_created+"</span>\
                                        </div>\
                                        <div class='chat-action-btns'>\
                                            <ul>\
                                                <li><a href='#' class='share-msg' title='Share'><i class='fa fa-share-alt'></i></a></li>\
                                                <li><a href='#' class='edit-msg'><i class='fa fa-pencil'></i></a></li>\
                                                <li><a href='#' class='del-msg'><i class='fa fa-trash-o'></i></a></li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        ");
                    }
                    
                    else{
                        $('#chat_content').prepend("\
                            <div class='chat chat-right'>\
                                <div class='chat-body row'>\
                                    <div class='chat-bubble'>\
                                        <div class='chat-content'>\
                                            <p>"+chats.chat+"</p>\
                                            <span class='chat-time'>"+chats.date_created+"</span>\
                                        </div>\
                                        <div class='chat-action-btns'>\
                                            <ul>\
                                                <li><a href='#' class='share-msg' title='Share'><i class='fa fa-share-alt'></i></a></li>\
                                                <li><a href='#' class='edit-msg'><i class='fa fa-pencil'></i></a></li>\
                                                <li><a href='#' class='del-msg'><i class='fa fa-trash-o'></i></a></li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        ");
                    }
                    
                     
                    
                });
            },
            error:function(){ 
                console.log(data);
            }
        });  

        refreshChat();               
}

function showChat(id){
    fetchNewestChats(id)
}

function fetchNewestChats(user_id){
// prepend without clearing
    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: "get_newest_chats/"+user_id,
        
        dataType: 'json',
        
        success: function (data) {
            console.log(data);
            $.each(data.newest_chats,function(key,chats){
                if(user_id==chats.sender_id){
                    $('#chat_content').prepend("\
                        <div class='chat chat-left'>\
                            <div class='chat-body row'>\
                                <div class='chat-bubble'>\
                                    <div class='chat-content'>\
                                        <p>"+chats.chat+"</p>\
                                        <span class='chat-time'>"+chats.date_created+"</span>\
                                    </div>\
                                    <div class='chat-action-btns'>\
                                        <ul>\
                                            <li><a href='#' class='share-msg' title='Share'><i class='fa fa-share-alt'></i></a></li>\
                                            <li><a href='#' class='edit-msg'><i class='fa fa-pencil'></i></a></li>\
                                            <li><a href='#' class='del-msg'><i class='fa fa-trash-o'></i></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ");
                }
                
                else{
                    $('#chat_content').prepend("\
                        <div class='chat chat-right'>\
                            <div class='chat-body row'>\
                                <div class='chat-bubble'>\
                                    <div class='chat-content'>\
                                        <p>"+chats.chat+"</p>\
                                        <span class='chat-time'>"+chats.date_created+"</span>\
                                    </div>\
                                    <div class='chat-action-btns'>\
                                        <ul>\
                                            <li><a href='#' class='share-msg' title='Share'><i class='fa fa-share-alt'></i></a></li>\
                                            <li><a href='#' class='edit-msg'><i class='fa fa-pencil'></i></a></li>\
                                            <li><a href='#' class='del-msg'><i class='fa fa-trash-o'></i></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ");
                }
                
                 
                
            });
        },
        error:function(){ 
            console.log(data);
        }
    });
}

function refreshChat(){
    let user_id=$('#chat_with').val()

    // check if the user id is valid else stop the refresh.
    if(user_id>0){

        // check to ensure there is no active refresh running
        if (chatResfreshIntervalID !== 0 ) {
            cancelChatRefresh();
        } 
        chatResfreshIntervalID = setInterval(fetchNewestChats, 3000, user_id);  
    }
    else{
        cancelChatRefresh();
    }
}


function cancelChatRefresh() {
    clearInterval(chatResfreshIntervalID);
}

function openChat(btn_chat) {
    var chat_box=document.getElementById('myForm');
   switch(btn_chat){
    case "chat_btn":
        chat_box.style.display='block';
    
        document.getElementById('chat_btn').style.display="none"
        
    break;

    case"close_btn":
    
            chat_box.style.display="none";
            document.getElementById('chat_btn').style.display="block";        
    break;
   }
    
    }

//    }
  
  