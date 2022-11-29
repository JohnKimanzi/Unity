<div class="card-body">
    <form method='POST' action="">
        @csrf
        @include('countries.country_form')
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
            