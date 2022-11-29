
   
      
      <!-- <div class="col-auto float-left ml-auto"> -->
         <div class="input-group float-left">
            <select id="listsearch" class="form-control col-sm-4" >
               <option value="0">Select Filter</option>
               <option value="name">Lead #</option>
               <option value="id">Business Type</option>
               <option value="birthday">Primary Phone</option>
			   <option value="birthday">Status</option>
			   <option value="birthday">Email</option>
			   <option value="birthday">City</option>
            </select>
            <input class="form-control col-sm-3" type="text" name="value" id="filter_value"   placeholder="Enter Filter Value">
            
           
			
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#upload_lead" float-right><i class="fa fa-upload"></i>Lead</a>
                          
                            @include('leads.upload')
                       
                    </div>
         </div>
         <!-- </div> -->
    
 