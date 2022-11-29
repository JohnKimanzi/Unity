<?php

use App\Models\DocumentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DocumentType::upsert([
            ['name'=>'Service agreement', 'description'=>'Service agreement'],
            ['name'=>'Introductory letter', 'description'=>'Introductory letter'],
            ['name'=>'Bank statement', 'description'=>'Bank statement'],
            ['name'=>'Proof of pay', 'description'=>'Proof of pay'],
            ['name'=>'Backup documents', 'description'=>'Backup documents'],
            ['name'=>'Skip reports', 'description'=>'Skip reports'],
            ['name'=>'Legal documents', 'description'=>'Legal documents'],
            ['name'=>'Dispute letters', 'description'=>'Dispute letters'],
            ['name'=>'Receipts', 'description'=>'Receipts'],
            ['name'=>'Misc', 'description'=>'Misc'],
            ['name'=>'Emails', 'description'=>'Emails'],
            
        ],['name'],['description']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_types');
    }
}
