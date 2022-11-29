@extends('layout.mainlayout',  ['title'=>"CALLS"])
@section('content')
   <!-- Page Content -->
    <div class="content container-fluid">
        
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Calls</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Calls</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> New call</a>
                </div>
                <div class="col-auto float-right ml-auto">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialer_modal">
                        Show Dialer
                    </button>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <section class="dash-section">
                    
                    <div class="dash-sec-content">
                        <div class="dash-info-list">
                            <a href="#" class="dash-card text-info">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="fa fa-volume-control-phone"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <p>All calls today</p>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img src="img/profiles/avatar-09.jpg" alt=""></div>
                                    </div>
                                </div>
                            </a>
                            
                            <div class="card card-table flex-fill">
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>Subject</th>
                                                    <th>Phone</th>
                                                    <th>Recording URL</th>
                                                    <th>Date</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($calls as $call )
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar"><img alt="" src="img/user.jpg"></a>
                                                            <a href="{{route('c_leads.show', $call)}}">{{$call->lead->name}}<span>{{$call->contact_person->name}}</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>{{$call->subject}}</td>
                                                    <td><a href="{{route('calls.create')}}"> <i class="fa fa-phone"></i></a> {{ $call->phone}}  </td>
                                                    <td><a href="">{{'link_to_recording.mp3'}}</a></td>
                                                    <td>{{date('d-m-Y', strtotime($call->created_at))}}</td>
                                                    
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-eye m-r-5"></i> View</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Remove</a>
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#">View all calls</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                        

                
                </section>
            </div>

            
        </div>

    </div>
    <!-- /Page Content -->
    <!-- New call Modal -->
    <div id="add_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New call</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('calls.new_call_form')
                </div>
            </div>
        </div>
    </div>
    <!-- New call Modal -->

    <!--Dialer Modal -->
<div class="modal fade" id="dialer_modal" tabindex="-1" aria-labelledby="dialer_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dialer_modal_label">Dialer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="dialer_table">
                    <tr>
                        <td id="dialer_input_td" colspan="3"><input type="number" placeholder="321234567890"></td>
                    </tr>
                    <tr class="dialer_num_tr">
                        <td class="dialer_num" onclick="dialerClick('dial', 1)">1</td>
                        <td class="dialer_num" onclick="dialerClick('dial', 2)">2</td>
                        <td class="dialer_num" onclick="dialerClick('dial', 3)">3</td>
                    </tr>
                    <tr class="dialer_num_tr">
                        <td class="dialer_num" onclick="dialerClick('dial', 4)">4</td>
                        <td class="dialer_num" onclick="dialerClick('dial', 5)">5</td>
                        <td class="dialer_num" onclick="dialerClick('dial', 6)">6</td>
                    </tr>
                    <tr class="dialer_num_tr">
                        <td class="dialer_num" onclick="dialerClick('dial', 7)">7</td>
                        <td class="dialer_num" onclick="dialerClick('dial', 8)">8</td>
                        <td class="dialer_num" onclick="dialerClick('dial', 9)">9</td>
                    </tr>
                    <tr class="dialer_num_tr">
                        <td class="dialer_del_td">
                            <img alt="clear" onclick="dialerClick('clear', 'clear')" src="data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJlcmFzZXIiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWVyYXNlciBmYS13LTE2IGZhLTd4Ij48cGF0aCBmaWxsPSIjYjFiMWIxIiBkPSJNNDk3Ljk0MSAyNzMuOTQxYzE4Ljc0NS0xOC43NDUgMTguNzQ1LTQ5LjEzNyAwLTY3Ljg4MmwtMTYwLTE2MGMtMTguNzQ1LTE4Ljc0NS00OS4xMzYtMTguNzQ2LTY3Ljg4MyAwbC0yNTYgMjU2Yy0xOC43NDUgMTguNzQ1LTE4Ljc0NSA0OS4xMzcgMCA2Ny44ODJsOTYgOTZBNDguMDA0IDQ4LjAwNCAwIDAgMCAxNDQgNDgwaDM1NmM2LjYyNyAwIDEyLTUuMzczIDEyLTEydi00MGMwLTYuNjI3LTUuMzczLTEyLTEyLTEySDM1NS44ODNsMTQyLjA1OC0xNDIuMDU5em0tMzAyLjYyNy02Mi42MjdsMTM3LjM3MyAxMzcuMzczTDI2NS4zNzMgNDE2SDE1MC42MjhsLTgwLTgwIDEyNC42ODYtMTI0LjY4NnoiIGNsYXNzPSIiPjwvcGF0aD48L3N2Zz4=" width="22px" title="Clear" />
                        </td>
                        <td class="dialer_num" onclick="dialerClick('dial', 0)">0</td>
                        <td class="dialer_del_td">
                            <img alt="delete" onclick="dialerClick('delete', 'delete')" src="data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhciIgZGF0YS1pY29uPSJiYWNrc3BhY2UiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNjQwIDUxMiIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWJhY2tzcGFjZSBmYS13LTIwIGZhLTd4Ij48cGF0aCBmaWxsPSIjREMxQTU5IiBkPSJNNDY5LjY1IDE4MS42NWwtMTEuMzEtMTEuMzFjLTYuMjUtNi4yNS0xNi4zOC02LjI1LTIyLjYzIDBMMzg0IDIyMi4wNmwtNTEuNzItNTEuNzJjLTYuMjUtNi4yNS0xNi4zOC02LjI1LTIyLjYzIDBsLTExLjMxIDExLjMxYy02LjI1IDYuMjUtNi4yNSAxNi4zOCAwIDIyLjYzTDM1MC4wNiAyNTZsLTUxLjcyIDUxLjcyYy02LjI1IDYuMjUtNi4yNSAxNi4zOCAwIDIyLjYzbDExLjMxIDExLjMxYzYuMjUgNi4yNSAxNi4zOCA2LjI1IDIyLjYzIDBMMzg0IDI4OS45NGw1MS43MiA1MS43MmM2LjI1IDYuMjUgMTYuMzggNi4yNSAyMi42MyAwbDExLjMxLTExLjMxYzYuMjUtNi4yNSA2LjI1LTE2LjM4IDAtMjIuNjNMNDE3Ljk0IDI1Nmw1MS43Mi01MS43MmM2LjI0LTYuMjUgNi4yNC0xNi4zOC0uMDEtMjIuNjN6TTU3NiA2NEgyMDUuMjZDMTg4LjI4IDY0IDE3MiA3MC43NCAxNjAgODIuNzRMOS4zNyAyMzMuMzdjLTEyLjUgMTIuNS0xMi41IDMyLjc2IDAgNDUuMjVMMTYwIDQyOS4yNWMxMiAxMiAyOC4yOCAxOC43NSA0NS4yNSAxOC43NUg1NzZjMzUuMzUgMCA2NC0yOC42NSA2NC02NFYxMjhjMC0zNS4zNS0yOC42NS02NC02NC02NHptMTYgMzIwYzAgOC44Mi03LjE4IDE2LTE2IDE2SDIwNS4yNmMtNC4yNyAwLTguMjktMS42Ni0xMS4zMS00LjY5TDU0LjYzIDI1NmwxMzkuMzEtMTM5LjMxYzMuMDItMy4wMiA3LjA0LTQuNjkgMTEuMzEtNC42OUg1NzZjOC44MiAwIDE2IDcuMTggMTYgMTZ2MjU2eiIgY2xhc3M9IiI+PC9wYXRoPjwvc3ZnPg==" width="25px" title="Delete" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="#" type="button" id="dialer_call_btn_td">Call</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/Dialer Modal -->

@endsection