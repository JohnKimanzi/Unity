<div class="col-md-12">
    <form id="chat_form" enctype="multipart/form-data">
    @csrf
        <input type="hidden" value="{{Auth::user()->id}}" name="sender" id="sender">
        
    </form>
</div>