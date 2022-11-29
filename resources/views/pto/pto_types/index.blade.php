@extends('layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">PTO Types</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                        <li class="breadcrumb-item active">PTO Types</li>
                    </ul>
                </div>
                @role('admin')
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_pto_type"><i class="fa fa-plus"></i> Add PTO Type</a>
                </div>
                @endrole
            </div>
        </div>
        <!--Create PTO Type modal-->
        <div class="modal custom-modal fade" role="dialog" id="create_pto_type">
            <div class="modal-dialog modal-dialog-left modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('pto.pto_types.create_modal')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="card justify-content-center flex-fill">
            <div class="table-responsive">
                <table class="table table-stripped-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Name</th>
                            <th>Max. Hours</th>
                            <th>Max. Rollover</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pto_types as $pto_type)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pto_type->name}}</td>
                            <td>{{$pto_type->max_hours}}</td>
                            <td>{{$pto_type->max_roll_over}}</td>
                            <td>{{$pto_type->status}}</td>
                            <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('pto_types.edit',$pto_type)}}"><i class="la la-pencil"></i>Edit</a>
                                            <form action="{{route('pto_types.destroy', $pto_type)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class=" dropdown-item"><i class="la la-trash"></i>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

@endsection