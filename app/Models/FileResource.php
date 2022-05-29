<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileResource extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','file_name','file_ext','file_size','file_path'];
}
