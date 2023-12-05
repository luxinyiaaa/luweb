<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Add this import statement

class Upload extends Model
{
    use HasFactory;

    public function deleteFileAndRecord()
    {
        // Delete the file from the filesystem
        Storage::delete($this->path); 

        return $this->delete();// Delete the record from the database
    }
}
    

