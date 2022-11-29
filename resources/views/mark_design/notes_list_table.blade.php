<div class="table-responsive">
    <table class="table table-striped custom-table datatable ">
        <thead class="bg-secondary">
            <tr>
                <th>User</th>
                <th>Date</th>
                <th>Note</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($filtered_notes as $note)
                <tr>
                    <td>{{$note->user->name}}</td>
                    <td>{{$note->created_at}}</td>
                    <td>{{$note->note}}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>