@extends('layout.mainlayout')
@section('content')

<div class="content container-fluid">
    <div class="card mt-5 mr-5 ml-5">
        <div class="card-body">
            <form action="{{route('pto.update', $pto)}}" method="POST">
                @csrf
                @method('PUT')
                    @include('pto.pto_request_form')
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
        @include('uploads.file_list', ['uploadable'=>$pto])
    </div>
</div>
@endsection