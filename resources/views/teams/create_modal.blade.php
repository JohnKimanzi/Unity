<div class="card-body">
    <form method='POST' action="{{ route('teams.store') }}">
        @csrf
        @include('teams.team_form')
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>