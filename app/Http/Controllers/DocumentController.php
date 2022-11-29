<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Lead;
use App\Models\Note;
use App\Models\Upload;
use App\Traits\CustomGlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
	use CustomGlobalFunctions;
	public function DocumentUpload(Request $request)
	{
		$document_type = DocumentType::firstOrCreate([
				'name' => $request->document_type
		]);

		$this->uploadFile('lead', $request->lead_id, $document_type, $request->file('lead_doc'));
		return back()->with('success', 'File has been uploaded.');
		//validate type of file uploaded
		// dd($req->all());

		// $file_name = $req->file('lead_doc')->getClientOriginalName();

		// $lead_id = $req->get('lead_id');

		// $lead = Lead::findOrFail($lead_id);

		// $folder_name = $lead->name;

		// $doc_type = DocumentType::firstOrCreate([
		// 	'name' => $req->document_type
		// ]);
		// $collection = collect();
		// $check_docs = Document::where('filename', $file_name)->get();
		// // dd($check_docs);
		// foreach ($check_docs as $doc) {
		// 	$up = ($doc->upload()->where('uploadable_type', 'lead')->where('uploadable_id', $req->lead_id))->where('name', $doc_type->name)->get();
		// 	if ($up <> null) {
		// 		$collection = collect($up);
		// 		// dd($collection->count());
		// 	}
		// }
		// if ($collection->count() > 0) {
		// 	return Redirect::back()->with('error', 'A document with the same name already exists in this category');
		// } else {
		// 	$path = $req->file('lead_doc')->storeAs('public/Uploads/' . $folder_name, $file_name);

		// 	$document = Document::create([
		// 		'filename' => $req->file('lead_doc')->getClientOriginalName(),
		// 		'document_type_id' => $doc_type->id,
		// 		'user_id' => Auth::user()->id,
		// 		'mime' => $req->file('lead_doc')->extension(),
		// 		'size' => $req->file('lead_doc')->getSize(),
		// 		'path' => $path,
		// 	]);

		// 	$upload = Upload::create([
		// 		'name' => $doc_type->name,
		// 		'uploadable_type' => 'lead',
		// 		'uploadable_id' => $req->get('lead_id'),
		// 		'document_id' => $document->id,
		// 	]);

		// 	Note::create([
		// 		'notable_id' => $req->get('lead_id'),
		// 		'notable_type' => 'lead',
		// 		'user_id' => Auth::user()->id,
		// 		'note' => 'Uploaded document ' . $file_name . ' for ' . $lead->name,
		// 	]);

			
		// }
	}
	// public function uploadFile($uploadable_type,$uploadable_id,DocumentType $document_type, $file, ){
	// 	$file_name = $file->getClientOriginalName();
	// 	$storage_locaction= "{$uploadable_type}/{$uploadable_id}/{$document_type->name}";

	// 	dd($storage_locaction);

	// 	$collection = collect();
	// 	$check_docs = Document::where('filename', $file_name)->get();
	// 	// dd($check_docs);
	// 	foreach ($check_docs as $doc) {
	// 		$up = ($doc->upload()->where('uploadable_type', $uploadable_type)->where('uploadable_id', $uploadable_type))->where('name', $document_type->name)->get();
	// 		if ($up <> null) {
	// 			$collection = collect($up);
	// 			// dd($collection->count());
	// 		}
	// 	}
	// 	if ($collection->count() > 0) {
	// 		return Redirect::back()->with('error', 'A document with the same name already exists in this category');
	// 	} else {
	// 		$path = $file->storeAs('public/Uploads/' . $storage_locaction, $file_name);

	// 		$document = Document::create([
	// 			'filename' => $file_name,
	// 			'document_type_id' => $document_type->id,
	// 			'user_id' => Auth::user()->id,
	// 			'mime' => $file->extension(),
	// 			'size' => $file->getSize(),
	// 			'path' => $path,
	// 		]);

	// 		$upload = Upload::create([
	// 			'name' => $document_type->name,
	// 			'uploadable_type' => 'lead',
	// 			'uploadable_id' => $uploadable_id,
	// 			'document_id' => $document->id,
	// 		]);

	// 		Note::create([
	// 			'notable_id' => $uploadable_id,
	// 			'notable_type' => $uploadable_type,
	// 			'user_id' => Auth::user()->id,
	// 			'note' => 'Uploaded document ' . $file_name . ' for ' . $uploadable_type,
	// 		]);

	// 		flush('success', 'File has been uploaded.');
	// 		return $upload;
	// 	}
	// }
	public function download(Document $document){
		// dd($document);
		try {
			return Storage::download($document->path);
		} catch (\Throwable $th) {
			// dd($th->getMessage());
			// throw $th;
			// dd('err');
			return back()->with('error', "Unity couldn't download the file you request.");

		}
		
	}
}
