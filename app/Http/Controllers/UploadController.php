<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentType;
use App\Traits\CustomGlobalFunctions;

class UploadController extends Controller
{
    use CustomGlobalFunctions;
    public function createForm(){
        return view('leads.profile_redone.upload_docs');
      }
    
//     public function DocumentUpload(Request $req){
//         $req->validate([
//         'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
//         ]);

//         $fileModel = new Document;

//         if($req->file()) {
//             $fileName = time().'_'.$req->file->getClientOriginalName();
//             $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

//             $fileModel->name = time().'_'.$req->file->getClientOriginalName();
//             $fileModel->file_path = '/storage/' . $filePath;
//             $fileModel->save();

//             return back()
//             ->with('success','File has been uploaded.')
//             ->with('file', $fileName);
//         }
//    }
    public function store(Request $request){
        // dd($request->all());
        try {
            $this->validate($request, [
            'document_type'=>'required|string',
            'uploadable'=>'required|string',
            'uploadable_id'=>'required|string',
            'uploaded_file'=>'required|file|mimes:jpg,bmp,jpeg,png,pdf,doc,docx,xls,xlsx,xml,html,csv,txt',
            'filename'=>'string|nullable',

        ]);
        } catch (\Throwable $th) {
            // dd($th);
            throw $th;
        }
        $document_type = DocumentType::firstOrCreate([
            'name' => $request->document_type
        ]);
        $this->uploadFile($request->uploadable, $request->uploadable_id, $document_type, $request->file('uploaded_file'), $request->filename);
		return back()->with('success', 'File has been uploaded.');

        
    }
}
