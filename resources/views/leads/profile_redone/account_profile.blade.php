@extends('layout.mainlayout', ['title'=>"LEADS"])
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item"><a href="index">Leads</a></li>
                        <li class="breadcrumb-item active">{{ $leads->name }}'s Profile </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 text-white">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav  ">
                            <li class="nav-item">
                                <button class="nav-link btn btn-primary" id="call_btn" onclick=engage(this.id);><i
                                        class="fa fa-phone fa-md">Call</i></button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn btn-primary" data-toggle="modal" data-target="#notes"
                                    id="scheduler"><i class="fa fa-calendar fa-md">Notes</i></button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn btn-primary" id="scheduler" onclick=engage(this.id);><i
                                        class="fa fa-handshake fa-md">Schedule Meeting</i></button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn btn-primary" id="email" data-toggle="modal"
                                    data-target="#emails"> <i class="fa fa-envelope fa-md">Email</i></button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn btn-primary" id="convert" onclick=engage(this.id);><i
                                        class="fa fa-exchange fa-md">Lead Conversion</i></button>
                            </li>
                            @can('upload documents')
                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="upload" onclick=engage(this.id);><i
                                            class="fa fa-upload fa-md">Upload Lead Documentation</i></button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="doc_gen" onclick=engage(this.id);><i
                                            class="fa fa-upload fa-md">Document Generator</i></button>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </nav>
                <!-- <table>
                    <tr><td> <button class="btn btn-primary" id="call_btn" onclick=engage(this.id);><i class="fa fa-phone fa-md">Call</i></button>
                    <td> <button class="btn btn-primary" data-toggle="modal" data-target="#notes" id="scheduler" ><i class="fa fa-calendar fa-md">Notes</i></button>
                    <td> <button class="btn btn-primary" id="scheduler" onclick=engage(this.id);><i class="fa fa-handshake fa-md">Schedule Meeting</i></button>
                    <td><button class="btn btn-primary" id="email" data-toggle="modal" data-target="#emails" ><i class="fa fa-envelope fa-md">Email</i></button>
                    <td><button class="btn btn-primary" id="convert" onclick=engage(this.id);><i class="fa fa-exchange fa-md">Lead Conversion</i></button>
                    <td><button class="btn btn-primary" id="upload" onclick=engage(this.id);><i class="fa fa-upload fa-md">Upload Lead Documentation</i></button>
                    <td><button class="btn btn-primary" id="doc_gen" onclick=engage(this.id);><i class="fa fa-upload fa-md">Document Generator</i></button>
                    
                    </td></tr>
                    </table> -->

            </div>
        </div>
        <div class="row">
            <div class="card col-md-6">
                <div class="card-header">Lead Information<i class="fa fa-pencil float-right" title="Edit Lead details"
                        id="lead_info" onclick="transaction(this.id)"></i></a></div>
                <div class="card-body">
                    <ul class="personal-info" id="lead_info_no_edit">
                        <li>
                            <span class="title">Primary phone</span>
                            <span class="text">{{ $leads->phone1 }}</span>
                        </li>
                        <li>
                            <span class="title">Alternate phone</span>
                            <span class="text">{{ $leads->phone2 }}</span>
                        </li>
                        <li>
                            <span class="title">Email</span>
                            <span class="text">{{ $leads->email }}</span>
                        </li>
                        <li>
                            <span class="title">Physial Address</span>
                            <span class="text">{{ $leads->address }}</span>
                        </li>
                        <li>
                            <span class="title">Zip Code</span>
                            <span class="text">{{ $leads->zip_code }}</span>
                        </li>
                        <li>
                            <span class="title">State</span>
                            <span class="text">{{ App\Models\State::find($leads->state_id)->name }}</span>
                        </li>
                        <li>

                            @if ($leads->ContactPeople()->count() > 0)
                                <span class="title">Contact People</span>
                                <span class="text">{{ $leads->primary_contact->full_name }}&nbsp;<a href="#"
                                        id="contact" onclick="ChooseContact();"><i class="fa fa-eye"></i></a></span>
                            @endif
                            <div id="contacts" style="display: none;">

                                @php
                                    $contact = App\Models\ContactPerson::where('lead_id', $leads->id)->get();
                                @endphp
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name
                                            <th>Contact Type
                                            <th>Title
                                            <th>Email
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($contact as $contacts)
                                        <tr>
                                            <td>{{ $contacts->full_name }}
                                            <td>{{ $contacts->contact_type }}
                                            <td>{{ $contacts->title }}
                                            <td>{{ $contacts->email }}
                                            <td><a href="#" class="btn btn-danger"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </li>
                        <li>
                            <span class="title">Category</span>
                            <span
                                class="text">{{ App\Models\BusinessType::find($leads->business_type_id)->name }}</span>
                        </li>
                        <li>
                            <span class="title">Date Onboarded</span>
                            <span class="text">{{ $leads->created_at }}</span>
                        </li>
                        <li>
                            <span class="title">Lead Status</span>
                            <span class="text">{{ $leads->status }}</span>
                        </li>
                        <li class="font-weight-bold">
                            <span class="title">Lead Nurturing Stage</span>
                            @if (strtolower($leads->status) == '')
                                <span class="text-info">New</span>
                            @elseif(strtolower($leads->status) == 'cold' || $leads->status == 'do not call' || $leads->status == 'not interested')
                                <span class="text-danger">Pursue</span>
                            @elseif(strtolower($leads->status) == 'warm')
                                <span class="text-warning">Interested</span>
                            @elseif(strtolower($leads->status) == 'hot')
                                <span class="text-success">Engage</span>
                            @endif

                        </li>
                    </ul>
                    @include('leads.profile_redone.edits.edit_profile')

                </div>

            </div>

            <div class="card flex col-md-6">
                <div class="card-header">Lead Engagement</div>
                <div class="card-body" id="engage_lead">
                    <div class="col-md-12" id="content">

                        @include('leads.profile_redone.call_dialog')
                        @include('leads.profile_redone.scheduler')
                        @include('leads.profile_redone.conversion_dialog')
                        @include('leads.profile_redone.upload_docs')
                        @include('leads.profile_redone.docgen')
                        @include('leads.profile_redone.edits.lead_bio')

                    </div>

                </div>


            </div>
            <!-- End of Lead Engagement -->

            <!-- <div class="row"> -->
            <div class="card flex col-md-12">
                <div class="card-header">Lead Transactions</div>
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav  ">
                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="activity_btn"
                                        onclick=transaction(this.id);><i class="fa fa-list fa-md">Activities</i></button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="notes_btn"
                                        onclick=transaction(this.id);><i class="fa fa-book fa-md">Notes</i></button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="lead_docs_btn"
                                        onclick=transaction(this.id);><i class="fa fa-file fa-md">Documents</i></button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="file_manager"
                                        onclick=transaction(this.id);><i class="fa fa-file fa-md">Library</i></button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="meetings_btn"
                                        onclick=transaction(this.id);><i
                                            class="fa fa-handshake fa-md">Meetings</i></button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary" id="contact_person_btn"
                                        onclick=transaction(this.id);><i class="fa fa-address-card fa-md">Contacts
                                        </i></button>
                                </li>

                            </ul>
                        </div>
                    </nav>


                    <div class="col-md-12 col-sm-12 col-lg-12" id="lead_transaction">
                        @include(
                            'leads.profile_redone.transactions.notes_history'
                        )
                        @include(
                            'leads.profile_redone.transactions.documents'
                        )
                        @include(
                            'leads.profile_redone.transactions.contact_list'
                        )
                        @include(
                            'leads.profile_redone.transactions.meetings_history'
                        )
                        @include(
                            'leads.profile_redone.transactions.fileManager'
                        )

                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
    @include('leads.profile_redone.transactions.notes')
    @include('leads.profile_redone.transactions.email')
@endsection
