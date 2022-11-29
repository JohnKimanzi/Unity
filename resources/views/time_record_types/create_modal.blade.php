<div class="card-body">
    <form method='POST' action="{{ route('time_record_types.store') }}">
        @csrf
        @include('time_record_types.time_record_types_form')
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>