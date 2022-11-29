<div class="card" id="myForm" style="display:none;">
<div>

   <div class="col-md-12">
     
       <div class="col-md-12">
         <button class="btn btn-danger btn-sm float-right" id="close_btn" onclick="openChat(this.id);"><i class="la la-close la-sm"></i></button>
         @php
          $chat_new=App\Models\Chat::where('recepient_id',Auth::user()->id)->count();

          @endphp
         <label class="float-right">
            <a href="#" id="incoming"><i class="fa fa-envelope "><span class="float-right">{{$chat_new}}</span></i></a>
          </label>
        </div>
     
      
      <form id="chat_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{Auth::user()->id}}" name="sender" id="sender">
        <label class="float-left">Have a chat with..</label>
        <div class="form-group">
          
          

          <select name="chat_with" id="chat_with" class="form-control">

            @php
            $users=App\Models\user::where('id', '!=',Auth::user()->id)->get();
            @endphp
            <option value=""></option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="card">
          <div class="card-body anyClass" id="chat_content">

          </div>
          <div class="card-footer">
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text attach_btn"><i class="fa fa-paperclip"></i></span>
              </div>
              <textarea name="chat" id="chat" class="form-control type_msg" id="send_chat" placeholder="Type your message..."></textarea>
              <div class="input-group-append">
                <button class="btn btn-success btn-md" type="submit"><i class="fa fa-location-arrow"></i></span>
              </div>
            </div>
        
        </div>









      </form>
      </div>
    </div>
  </div>
</div>