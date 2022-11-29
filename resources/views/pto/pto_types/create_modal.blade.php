<div class="card-body">
    <form method='POST' action="{{ route('pto_types.store') }}">
        @csrf
        @include('pto.pto_types.pto_types_form')
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>