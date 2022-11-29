function transaction(btn_clicked) {
    var d = document.getElementById('display_content_area').childElementCount;
    while (d > 0) {
        document.getElementById('display_content_area').children[d - 1].style.display = "none";
        d--;
    }

    switch (btn_clicked) {
        case "notes":
            var notes = document.getElementById('notes_table');

            if (notes.style.display == "none") {
                notes.style.display = "block";
                notes.scrollTop();

            } else {
                notes.style.display = "none";
            }
            break;

        case "doc_folder":

            var doc = document.getElementById('lead_docs');

            if (doc.style.display == "none") {
                doc.style.display = "block";


            } else {
                doc.style.display = "none";
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

        
    }
}

function debtorTransaction(btn_clicked){
    var d = document.getElementById("mark-design-dash-debtor-cards").childElementCount;
    while (d > 0) {
        document.getElementById("mark-design-dash-debtor-cards").children[d - 1].style.display = "none";
        d--;
    } 
    switch (btn_clicked) {
        case "debtor_account_notes":
           
            var debtor_notes = document.getElementById('debtor_notes');
            
            if (debtor_notes.style.display == "none") {
                debtor_notes.style.display = "block";
              
            } else {
                debtor_notes.style.display = "none";
            }
            break; 

        case "credit_card":
            var notes = document.getElementById('credit_card_infos');

            if (notes.style.display == "none") {
                notes.style.display = "block";
               

            } else {
                notes.style.display = "none";
            }
            break; 
            
        case "notess":
            var debtor_notes = document.getElementById('debtor_notes');
            alert('al');
            if (debtor_notes.style.display == "none") {
                debtor_notes.style.display = "block";
                

            } else {
                debtor_notes.style.display = "none";
            }
            break; 

        case "transactions":
            var transaction = document.getElementById('debt_transaction');
               
            if (transaction.style.display == "none") {
                transaction.style.display = "block";
                transaction.scrollTop();

            } else {
                transaction.style.display = "none";
            }
            break; 

        case "claims":
            var notes = document.getElementById('claims_table');

            if (notes.style.display == "none") {
                notes.style.display = "block";
               

            } else {
                notes.style.display = "none";
            }
            break; 

        case "set_/_judgement":
            var notes = document.getElementById('notes_table');

            if (notes.style.display == "none") {
                notes.style.display = "block";
              

            } else {
                notes.style.display = "none";
            }
            break; 

        case "summary":
            var notes = document.getElementById('account_summary');
           
            if (notes.style.display == "none") {
                notes.style.display = "block";
               

            } else {
                notes.style.display = "none";
            }
            break; 
        }
}

// function profile_edit(btn_clicked){
    
//     $("#lead_bio_flip").flip('toggle');
// }

function profile_edit(btn_clicked){
    

    switch(btn_clicked){
        case"lead_bio_flip":
        var answer=window.confirm('You are about to allow for lead bio Edit. Do you wish to continue?');

        if(answer){
            document.getElementById('lead_bio').style.display="none";

            var hidden_div=document.getElementById('edit_lead_bio');

            if(hidden_div.style.display=="none"){
                hidden_div.style.display="block";
            }else{
                hidden_div.style.display="none";
                document.getElementById('lead_bio').style.display="block";
            }
            
        }
        else{
            document.getElementById('lead_bio').style.display="block";
            document.getElementById('edit_lead_bio').style.display="none";  
        }
        
        break;


        case"lead_address_flip":
        
        var answer=window.confirm('You are about to allow for lead Address Edit. Do you wish to continue?');

        if(answer){
            document.getElementById('lead_address').style.display="none";

         var hidden_div1=document.getElementById('edit_lead_address');
      

            if(hidden_div1.style.display=="none"){
                hidden_div1.style.display="block";
            }else{
                hidden_div1.style.display="none";
                document.getElementById('lead_address').style.display="block";
            }
           
        }
        else{
            document.getElementById('lead_address').style.display="block";
            document.getElementById('edit_lead_address').style.display="none";  
        }
        break;
        case"":
        break;
        case"":
        break;
        case"":
        break;
    }
}
