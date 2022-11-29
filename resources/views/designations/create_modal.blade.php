<div class="card-body">
    <form method='POST' action="{{ route('designations.store') }}">
        @csrf
        @include('designations.designation_form')
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>