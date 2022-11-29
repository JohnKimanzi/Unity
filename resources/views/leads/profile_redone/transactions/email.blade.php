<div id="emails" class="modal custom-modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email Lead</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <form method="POST" action="{{route('email_lead', $leads)}}" id="mail_lead" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email_from">Send From:</label>
                                <input type="email" name="email_from" class="form-control" value="unitylegalgroup@ulg.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_to">Send To:</label>
                                <select class="form-control" name="email_to">
                                    <option value="{{$leads->email}}">{{$leads->email}}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="email" name="cc" class="form-control" placeholder="cc">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="bcc" class="form-control" placeholder="bcc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="email_from">Subject:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="email_subject" class="form-control" placeholder="Email subject">
                            </div>
                        </div>
                        <div class="form-group ">
                            <textarea class="md-textarea form-control " placeholder="Email Body"
                                rows="5" name="email_body" id="email_body"></textarea>
                        </div>
                        <h4>Template to merge</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email_to">Choose template:</label>
                                <select class="form-control" name="template1">
                                    <option value="" selected>--select--</option>
                                    @if(count($templates=App\Models\Template::all())>0)
                                        @foreach ($templates as $template)
                                            <option value="{{$template->id}}">{{$template->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_to">Choose template:</label>
                                <select class="form-control" name="template2">
                                    <option value="" selected>--select</option>
                                    @if(count($templates=App\Models\Template::all())>0)
                                        @foreach ($templates as $template)
                                            <option value="{{$template->id}}">{{$template->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Download mail-merged documents</label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox" name="download" value="yes">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Additional attachments</h4>
                        <div class="form-group">
                            <input type="file" name="attachment" >
                        </div>

                        <button type="submit" class="btn btn-info float-left" >Send<i class="la la-md la-paper-plane"></i></button>
                        
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
