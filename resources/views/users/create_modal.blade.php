<div class="card-body">
    <form method='POST' action="{{ route('users.store') }}">
        @csrf
        @include('users.user_form')
        {{-- @include('users.pto_allocation') --}}
        @include('inc.user_roles_form')
        @include('inc.user_perms_form')
        <input type="submit" value="Submit" class="btn btn-primary">
        <input type="reset" value="Reset All" class="btn btn-primary">
    </form>
</div>
            