<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'file_upload';
    public $timestamps = false;
    protected $fillable = [
        'mid',
        'doc_details',
        'doc_number',
        'doc_issue_date',
        'doc_expiry_date',
        'doc_issue_place',
        'files_all'
    ];
}
