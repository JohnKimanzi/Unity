$('#lead_table').DataTable({
    pageLength: 10,
    filter: true,
    sorting:false,
    deferRender: true,
    scrollY: 200,
    scrollCollapse: true,
    scroller: true,
    searching: false,
  });

function Lead_info(){
    var info=document.getElementById("lead_info");
    if(info.style.display==="none"){
        info.style.display="block";
    }
    else{
        info.style.display="none";
    }    
    
}
function Call_lead(){
    var call_leads=document.getElementById("call_lead");

    call_leads.addEventListener("click",()=>{
        event.preventDefault()
        var caller=document.getElementById("caller");
        if(caller.style.display==="none"){
            document.getElementById("caller").style.display="block";
        }else{
            caller.style.display="none";
        }
    });
}

function Edit_lead(){
    // document.getElementById("lead_info").style.display="none";
   
    var edits=document.getElementById("edit_lead");
    if(edits.style.display==="none"){
        edits.style.display="block";
    }
    else{
        edits.style.display="none";
    }    
    
}

function Lead_edit(){
    document.getElementById("edit_lead").addEventListener('click',()=>{
        //Validate input
        event.preventDefault()
        alert("Do you want to save ?");
    });
}
function Lead_activity(){
    // document.getElementById("lead_info").style.display="none";
   
    var activity=document.getElementById("lead_activity");
    if(activity.style.display==="none"){
        activity.style.display="flex";
    }
    else{
        activity.style.display="none";
    }    
    
}
function Lead_Conversations(){
    
    var activity=document.getElementById("call_log");
    if(activity.style.display==="none"){
        activity.style.display="flex";
    }
    else{
        activity.style.display="none";
    }    
    
}
function call_schedule(){
    
    var activity=document.getElementById("call_schedule");
    if(activity.style.display==="none"){
        activity.style.display="flex";
    }
    else{
        activity.style.display="none";
    }    
    scroll({
        top: offsetTop,
        behavior: "smooth"
      });
}

function View_leads(){
    var lead_card=document.getElementById("view_leads");

    lead_card.addEventListener("click",()=>{
        event.preventDefault()
        var workspace=document.getElementById("statistics");
        if(workspace.style.display==="none"){

        document.getElementById("lead_table").style.display="block";
        }else{
            workspace.style.display="flex";
        }
    });
}
function Email_leads(){
    var email_leads=document.getElementById("email_lead");

    email_leads.addEventListener("click",()=>{
        event.preventDefault()
        var emails=document.getElementById("emails");
        if(emails.style.display==="none"){
            document.getElementById("emails").style.display="block";
        }else{
            emails.style.display="none";
        }
    });
}
function Lead_docs(){
    var lead_doc_btn=document.getElementById("lead_doc");

    lead_doc_btn.addEventListener("click",()=>{
        event.preventDefault()
        var docs=document.getElementById("lead_docs");
        if(docs.style.display==="none"){
            document.getElementById("lead_docs").style.display="block";
        }else{
            docs.style.display="none";
        }
    });
}
function Convert_leads(){
    var convert_leads=document.getElementById("convert_lead");

    convert_leads.addEventListener("click",()=>{
        event.preventDefault()
        var convert=document.getElementById("convert");
        if(caller.style.display==="none"){
            document.getElementById("convert").style.display="block";
        }else{
            convert.style.display="none";
        }
    });
}
    // <script>
    //   document.addEventListener('DOMContentLoaded', function() {
    //     document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');
  
    //     fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
    //       window.opener.fmSetLink(fileUrl);
    //       window.close();
    //     });
    //   });
    // </script>

    function AddState(){
        btn=document.getElementById('add_status');
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

           input_value=document.getElementById("status");

           if(input_value.value==""){

                return
           }
           lead_status=document.getElementById("lead_state");

           options=new Option(input_value.value,input_value.value);

           lead_status.add(options);

           $('#add_status').modal('hide');
           
        });
      
    }
    
    function AddCategory(){
        btn=document.getElementById('add_category');
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

           input_value=document.getElementById("status");

           if(input_value.value==""){

                return
           }
           lead_category=document.getElementById("category");

           options=new Option(input_value.value,input_value.value);

           lead_category.add(options);
           

           $('#add_category').modal('hide');
           
        });
      
    }
    
    function AddCallState(){
        btn=document.getElementById('add_state');
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

           input_value=document.getElementById("status");

           if(input_value.value==""){

                return
           }
           lead_call_state=document.getElementById("call_state");

           options=new Option(input_value.value,input_value.value);

           lead_call_state.add(options);
           

           $('#add_call_status').modal('hide');
           
        });
      
    }

    function UserAccess(){
        var access_btn=document.getElementById("access");
    
        access_btn.addEventListener("click",(e)=>{
            e.preventDefault()
            var workspace=document.getElementById("access_table");
            if(workspace.style.display==="none"){
    
            document.getElementById("access_table").style.display="block";
            }else{
                workspace.style.display="none";
            }
        });
    }
    function UserAccess(){
        var access_btn=document.getElementById("access");
    
        access_btn.addEventListener("click",(e)=>{
            e.preventDefault()
            var workspace=document.getElementById("access_table");
            if(workspace.style.display==="none"){
    
            document.getElementById("access_table").style.display="block";
            }else{
                workspace.style.display="none";
            }
        });
    }
    function UserActivity(){
        var logs_btn=document.getElementById("user_logs");
    
        logs_btn.addEventListener("click",(e)=>{
            e.preventDefault()
            var workspace=document.getElementById("user_log_table");
            if(workspace.style.display==="none"){
    
            document.getElementById("user_log_table").style.display="block";
            }else{
                workspace.style.display="none";
            }
        });
    }
    