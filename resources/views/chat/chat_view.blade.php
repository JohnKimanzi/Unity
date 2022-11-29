<div class="card col-md-8">
    <div class="card-header">
            
            <div class="float-left">ULG CHAT</div>
            <!-- <div class="float-left"><i class="fa fa-search"></i></div> -->
            <div class="float-right"><i class="fa fa-pencil"></i></div>
            
        
    </div>
    <div class="card-body">

        @include('chat.chat_content')
    </div>
    <div class="card-footer">
        <div class="input-group">
            <div class="input-group-append">
            <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
            </div>
            <textarea name="chat" id="chat" class="form-control type_msg" id="send_chat" placeholder="Type your message..."></textarea>
            <div class="input-group-append">
                <button class="btn btn-success btn-md"  type="submit"><i class="fas fa-location-arrow" ></i></span>
            </div>
        </div>
    </div>
</div>