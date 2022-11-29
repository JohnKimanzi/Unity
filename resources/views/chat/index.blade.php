<div class="card col-md-4 col-sm-4 col-lg-4" id="myForm">
    <div class="col-md-12">
        @php
        $chat_new=App\Models\Chat::where('recepient_id',Auth::user()->id)->count();

        @endphp 
        {{-- <h4 class=" row ">ULG CHAT</h4><span> <a href="#" id="{{Auth::user()->id}}"><i class="fa fa-envelope " onclick="showChat(thi.id);">{{$chat_new}}</span></i></a></span>    --}}
        <button class="btn btn-danger btn-sm float-right" id="close_btn" onclick="openChat(this.id);"><i class="la la-close la-sm"></i></button>
    </div>
    <div class="card-body" style="margin: 0px">
        <div class="col-md-12">
            <label class="float-center">Have a chat with..</label>
            
            <select name="chat_with" id="chat_with" class="form-control col-md-12">

                @php
                $users=App\Models\user::where('id', '!=',Auth::user()->id)->get();
                @endphp
                <option value=""></option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            
        </div>
        <div class="col-md-12">
                <div class="card-body col-md-12 anyClass" id="chat_content">
                        <div>
                            {{-- <div class="chat chat-right">
                                <div class="chat-body">
                                    <div class="chat-bubble">
                                        <div class="chat-content">
                                            <p>Hello. What can I do for you?</p>
                                            <span class="chat-time">8:30 am</span>
                                        </div>
                                        <div class="chat-action-btns">
                                            <ul>
                                                <li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li>
                                                <li><a href="#" class="edit-msg"><i class="fa fa-pencil"></i></a></li>
                                                <li><a href="#" class="del-msg"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-line">
                                <span class="chat-date">October 8th, 2018</span>
                            </div>
                            <div class="chat chat-left">
                                <div class="chat-body">
                                    <div class="chat-bubble">
                                        <div class="chat-content">
                                            <p>I'm just looking around.</p>
                                            <p>Will you tell me something about yourself? </p>
                                            <span class="chat-time">8:35 am</span>
                                        </div>
                                        <div class="chat-action-btns">
                                            <ul>
                                                <li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li>
                                                <li><a href="#" class="edit-msg"><i class="fa fa-pencil"></i></a></li>
                                                <li><a href="#" class="del-msg"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chat-bubble">
                                        <div class="chat-content">
                                            <p>Are you there? That time!</p>
                                            <span class="chat-time">8:40 am</span>
                                        </div>
                                        <div class="chat-action-btns">
                                            <ul>
                                                <li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li>
                                                <li><a href="#" class="edit-msg"><i class="fa fa-pencil"></i></a></li>
                                                <li><a href="#" class="del-msg"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                </div>
        </div>
        <div class="col-md-12">
            <form id="chat_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="sender" id="sender">
                <div class="input-group">
                    <div class="input-group-append">
                         <span class="input-group-text attach_btn"><i class="fa fa-paperclip"></i></span>
                    </div>
                    <textarea name="chat" id="chat" class="form-control type_msg" rows="1" id="send_chat" placeholder="Type your message..."></textarea>
                    <div class="input-group-append">
                        <button class="btn btn-success btn-md" type="submit"><i class="fa fa-location-arrow"></i></span>
                    </div>
            </form>
        </div>

    </div>
</div>