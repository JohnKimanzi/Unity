@extends('layout.mainlayout')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ul>
                </div>

                <div class="col-auto float-right ml-auto">
                    <a href="#" id="show-leads-filter-btn" class="btn btn-primary"><i class="la la-chevron-down"></i>
                        Show Seach Bar</a>
                    @hasrole('admin')
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_leads"><i
                            class="fa fa-plus"></i> Bulk Upload</a>
                    @endhasrole
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mass-edit"><i
                            class="fa fa-pencil"></i> Mass Update</a>
                    {{-- <a href="{{route('massupdatepage', serialize(array($leads)))}}" class="btn add-btn"><i
                            class="fa fa-pencil"></i> Mass update page</a> --}}

                </div>

            </div>
        </div>


        @include('leads.lead_upload')
        <div id="leads-filter-section" class="d-none">
            @include('c_leads.leads_filter')
        </div>

        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-striped custom-data-table">
                    <thead>
                        <tr>
                            <!-- <th>Lead #</th> -->
                            <th>Name</th>
                            <th>Industry</th>
                            <th>Primary Phone</th>
                            <th>Alternate Phone</th>
                            <th>Email</th>
                            <th>City</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <!-- <td>{{$lead->id}}</td> -->
                            <td>

                                <a href="{{url('re_design_ui', $lead->id)}}">{{$lead->name}}</a>

                            </td>
                            <td>{{App\Models\BusinessType::find($lead->business_type_id)->name}}</td>
                            <td>{{$lead->phone1}}</td>
                            <td>{{$lead->phone2}}</td>
                            <td>{{$lead->email}}</td>
                            <td>
                                {{$lead->town}}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="mass-edit" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mass update values</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('leads.profile_redone.transactions.mass_update')
                        {{-- @include('c_leads.leads_filter') --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection