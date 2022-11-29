<div class="card-body">
    <form method='POST' action="{{ route('departments.store') }}">
        @csrf
        @include('departments.department_form')
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>