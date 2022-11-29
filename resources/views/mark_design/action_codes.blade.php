<div class="modal fade"  id="action_codes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Action Codes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mark-design-dash-cards">
      @php
              $actioncodes=App\Models\ActionCode::Where('id',2);
            @endphp
        {{-- <form method="post" action="{{url('assign_action_code', $actioncodes, 'Lead', $lead->id )}}"> --}}
        <form method="post" action="">
        {{ csrf_field() }}
          <div class="form-group">
            
          <label for="message-text" class="col-form-label">Select Action Code</label><span><a href="#"  data-dismiss="modal" data-toggle="modal" data-target="#new_action_code"><i class="fa fa-plus" title="Add New Action Code"></i></a></span>
          
          <select class="form-control" name="action_code" placeholder="Action code">
            @php
              $action_codes=App\Models\ActionCode::All();
            @endphp
            @foreach($action_codes as $actioncode)
            <option value="{{$actioncode->name}}">{{$actioncode->name}}</option>
            @endforeach
              
            </select>
            <ul class="list-group" id="mark-design-dash-cards-list">
              @php
              $my_action_codes=App\Models\ActionCode::all()
              @endphp
              @foreach($my_action_codes as $myactioncode)
              <li class="list-group-item 
              @if($myactioncode->is_blinking) blinking @endif
              @if($myactioncode->is_bold) font-weight-bold @endif
              @if($myactioncode->is_strike_through) strike-through @endif
              @if($myactioncode->is_underline) underline @endif" 
               style="background-color:{{$myactioncode->bg_color}}!important; color:{{$myactioncode->text_color}}!important;">
               {{$myactioncode->name}}<span class="float-right"><a href="{{ url('delete_action',$myactioncode->id) }}"><i class="fa fa-trash" ></i></a></span></li>
              @endforeach
            </ul>
          </div>
          <input type="submit" class="btn btn-danger form-control"  value="Add Action Code">
            <!-- <a href="#" class="btn btn-secondary btn-md" title="Add Action code"><i class="fa fa-plus" ></i></a> -->
            <!-- <a href="#" class="btn btn-warning" title="Edit Action code"><i class="fa fa-pencil"></i></a> -->
           {{-- <a href="{{ url('delete_action',$myactioncode->id) }}" class="btn btn-danger" title="Delete Action code"><i class="fa fa-trash"></i></a>--}}
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- NEW ACTION CODES HERE-->
<div class="modal" tabindex="-1" role="dialog" id="new_action_code">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Action Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mark-design-dash-cards">
        <form method="POST" action="{{url('action_code_new')}}">
        {{ csrf_field() }}
          <input type="hidden" name="status" value="active">
          <div class="form-group">
            <input type="text" name="action_code_name" class="form-control" placeholder="New Action Code here">
          </div>
          <div class="form-group">
            <label for="favcolor">Select Background color:</label>
            <input type="color" class="form-control form-control-color" id="favcolor" name="bgcolor" value="#ffffff">
          </div>
          <div class="form-group">
            <label for="favcolor">Select Font color:</label>
            <input type="color" class="form-control form-control-color" id="favcolor" name="fontcolor" value="#ffffff">
          </div>
          <div class="form-group">
          <label for="favcolor">Styling:</label>
            <label for="vehicle1"> Blinking</label>
            <input type="checkbox" id="favcolor"  name="blink" value="1">
            <label for="vehicle1"> Bold</label>
            <input type="checkbox" id="favcolor"  name="bold" value="1">
            <label for="vehicle1"> Underline</label>
            <input type="checkbox" id="favcolor"  name="underline" value="1">
            <label for="vehicle1"> Line-Through</label>
            <input type="checkbox" id="favcolor"  name="linethro" value="1">
         </div>
          <input type="submit" class="btn btn-primary" value="Submit">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
