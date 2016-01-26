<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fileName;
    protected $dateAdded;
    protected $dateUpdated;
    protected $active;
    protected $imageData;
    protected $importUrl;
}
