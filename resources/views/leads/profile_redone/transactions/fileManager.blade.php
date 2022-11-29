
<div id="file_managers" class="col-md-12 col-lg-12 col-sm-12" style="display: none;">
   
   @php
    $directory=$leads->name;
    $file_types=App\Models\DocumentType::get('name');
    
        $path=public_path('storage/'.$directory);

        if(is_dir($path)){

            
            $files=File::files($path);
        }
        else{
       
        
        $files='';
        }
        
        $desc=App\Models\Document::where('filename',$files)->get('filename');

   
   @endphp
    <div class="row">
        @foreach($file_types as $filetype)
    
            <div class="card flex" id="{{$filetype->title}}">
                <div class="card-header">{{$filetype->name}}
               
                </div>
                
                <div class="card-body">
                    
                @php
                
                $myfiles=$leads->uploads->where('document_type_id',$filetype->id)->get('filename');
                @endphp

                @if(isset($myfiles) && $myfiles->count()>0)
                    @foreach($myfiles as $myfile)
                    <span><i class="fa fa-file" onclick="readFile();"></i></span>
                    <p>{{$myfile->filename}}
                    
                    </p>
                    
                    @endforeach
                @endif
                </div>

            
            </div> 
            
        @endforeach
        
       
  

</div>
</div>



