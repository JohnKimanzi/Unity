<div class="card">
    <div class="card-header">
        Uploaded files
        <div class="d-flex flex-row-reverse">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUpload">Upload New Document</button>
        </div>
    </div>
    <div class="card-body row">
        @forelse($uploadable->uploads as $upload)
        <div class="col-sm-4 ">
            <ul class="files-list">
                <li>
                    <div class="files-cont">
                        <div class="file-type">
                            <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                        </div>
                        <div class="files-info">
                            <span class="file-name"><a href="#">{{$upload->document->filename}}</a></span><br>
                            <span class="file-author"><a href="#">{{$upload->document->uploaded_by->name}}</a></span> <span class="file-date">{{$upload->created_at->diffForHumans()}}</span>
                            <div class="file-size">Size: {{$upload->document->size}}</div>
                        </div>
                        <ul class="files-action">
                            <li class="dropdown dropdown-action">
                                <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" disabled href="javascript:void(0)">Preview</a>
                                    <a class="dropdown-item" disabled href="javascript:void(0)">Rename</a>
                                    <a class="dropdown-item" disabled href="javascript:void(0)">Download</a>
                                    <a class="dropdown-item" disabled href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        @empty
        No files
        @endforelse
    </div>
</div>
   <!-- New Upload Modal -->
   <div class="modal fade" id="newUpload" tabindex="-1" role="document" aria-labelledby="newUploadLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="newUploadTitle">New File Upload</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('uploads.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @include('uploads.upload_form', ['uploadable'=>class_basename($uploadable), 'uploadable_id'=>$uploadable->id])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>               
            </div>
        </div>
    </div>
    <!-- New Upload Modal -->