<div class="col-md-12 col-sm-12 d-flex " id="mark_profile" style="display:none">
                                                
    
    <div class="card col md-4 d-flex " id="mark-design-dash-cards" >
        <div class="card-header" id="mark-card">Lead Bio<span><a href="#" id="lead_bio_flip" onclick="profile_edit(this.id);"><i class="fa fa-pencil float-right" ></i></a></span></div>
            <div class="card-body" id="lead_bio_section">
                @include('mark_design.lead_bio')
                @include('mark_design.edits.edit_lead_bio')
            </div>
    </div>
    <div class="card col md-4" id="mark-design-dash-cards" >
        <div class="card-header" id="mark-card">Lead Address<span><a href="#" id="lead_address_flip" onclick="profile_edit(this.id);"><i class="fa fa-pencil float-right" ></i></a></span></div>
            <div class="card-body">

                @include('mark_design.lead_address')
                @include('mark_design.edits.edit_address')
            </div>
    </div>

    <div class="card col md-4" id="mark-design-dash-cards" >
        <div class="card-header" id="mark-card">Lead Contact Persons<span></div>
            <div class="card-body">
                @include('mark_design.contact_persons')
        </div>
    </div>
        
</div>