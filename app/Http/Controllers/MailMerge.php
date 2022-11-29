<?php

namespace App\Http\Controllers;

// use COM;

use App\Models\GenDoc;
use App\Models\Lead;
use App\Models\Note;
use App\Models\Template;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MailMerge extends Controller
{
    public function merge()
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/mergers/template.docx'));
        $templateProcessor->setValue('firstname', 'John');
        $templateProcessor->setValue('lastname', 'Doe');
        $templateProcessor->saveAs(storage_path('app/mergers/results/Sample_24_TemplateBlock.docx'));
        // $value=File::get(storage_path('app/mergers/results/Sample_24_TemplateBlock.docx'));
        // return view('test', ['value'=>$value]);

        $name = basename(__FILE__, '.php');
        $source =storage_path('app/mergers/results/Sample_24_TemplateBlock.docx');

        // echo date('H:i:s'), " Reading contents from `{$source}`", EOL;
        // $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
        // dd($phpWord);
        // return view('test', ['value'=>$phpWord]);

        // Save file
        // echo write($phpWord, basename(__FILE__, '.php'), $writers);

        $w = new COM("word.application") or die("Is office installed?");
        // echo 'Loaded Word, version ' . $w->Version . '<br>'; 
        $w->Visible = false;

        $w->Documents->Open(realpath($source));

        $content = (string) $w->ActiveDocument->Content;

        echo $content;

        $w->Quit();
        $w->Release();
        $w = null;
        return view('test', ['value'=>$content]);

    }
    public function docgen(){
        $this->docgen_p(Lead::find(1), Template::find(1));
    }
    public function docgen_p($company, Template $template)
    {
        // return('value');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/mergers/templates/service-agreement.docx'));
        $templateProcessor->setValue('salutation', $company->primary_contact->salutation);
        $templateProcessor->setValue('firstname', $company->primary_contact->first_name);
        $templateProcessor->setValue('lastname', $company->primary_contact->last_name);
        $templateProcessor->setValue('username', Auth::user()->name);
        $filename=$company->name.date('-Y_m_d_His').'.docx';
        $path='app/mergers/doc-gen/'.$filename;
        $templateProcessor->saveAs(storage_path($path));

        $gendoc=GenDoc::create([
            'documentable_type'=>'lead',
            'documentable_id'=>$company->id,
            'path'=>$path,
            'filename'=>$filename,
        ]);

        Note::create([
            'notable_id'=>$gendoc->id,
            'notable_type'=>'GenDoc',
            'user_id'=>Auth::user()->id,
            'note'=>'Generated document '. $filename,
        ]);

        dd('done');  
    }
}
