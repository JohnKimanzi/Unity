<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Note;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.index', ['templates'=>Template::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate type of file uploaded
  
        $file_name=$request->file('template')->getClientOriginalName();
        $doc_name=$request->doc_name;
          
        $doc_type=DocumentType::firstOrCreate([
          'name'=>'Template'
        ]);
        $collection=collect();
        $check_docs=Document::where('filename', $file_name)->get();
        // dd($check_docs);
        foreach($check_docs as $doc)
        {
          $check_templates=($doc->template()->where('category', $request->category))->where('name', $doc_name)->get();
            if ($check_templates<>null) {
              $collection=collect($check_templates);
              // dd($collection->count());
            }
        }
        if ($collection->count()>0) {
          return Redirect::back()->with('error', 'A document with the same name already exists in this category');
        } 
        else 
        {
            $path = $request->file('template')->storeAs('public/Uploads/templates/'.$request->category,$file_name);
        
            $document=Document::create([
                'filename'=>$request->file('template')->getClientOriginalName(),
                'document_type_id'=>$doc_type->id,
                'user_id'=>Auth::user()->id,
                'mime'=>$request->file('template')->extension(),
                'size'=>$request->file('template')->getSize(),
                'path'=>$path,
            ]);
  
            $template=Template::create([
                'name'=>$doc_name,
                'category'=>$request->category,
                'document_id'=>$document->id,
            ]);
  
            Note::create([
                'notable_id'=>$template->id,
                'notable_type'=>'template',
                'user_id'=>Auth::user()->id,
                'note'=>'Created template '. $doc_name,
            ]);

            return Redirect::back()->with('success','Template has been uploaded.');
        }
            
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('templates.edit', ['editable_template'=>$template]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        
        $request->validate([
            'doc_name'=>'required|string',
            'category'=>'required|string',
        ]);
        // dd($request->all());
        $template->update([
            'name'=>$request->doc_name,
            'category'=>$request->category,
        ]);
        return Redirect::back()->with('success', 'Template has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        //
    }
    public function download(Template $template)
    {
        $path=$template->document->path;
        // dd($path);
        try {
            // dd($path);
            return 
            // Storage::download(Document::find(7)->path);

            Storage::download($template->document->path);

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'File might have been deleted or moved');
        }
        
    }
}
