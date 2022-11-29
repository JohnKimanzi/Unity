<div class="chat chat-{{$orientation}}" id="my_chat">

    <div class="chat-body">

        <div class="chat-bubble">

            <div class="chat-content">

                <p id="msg">'+chat.chat+'</p>

                <span class="chat_time" id="chat_time">date(strtotime('+chat.created_at+'))</span>

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