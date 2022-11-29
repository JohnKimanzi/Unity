<td class="text-right">
    <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{route('c_leads.edit', $lead->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
            <form class='delete-form' action='{{route("c_leads.destroy", $lead->id)}}' method='POST'>
                <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
                <input type='hidden' name='_method' value='delete'>
                <button class='dropdown-item'  ><i class='fa fa-trash-o m-r-5'></i> Delete</button>
            </form>
        </div>
    </div>
</td>