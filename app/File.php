<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    private $fileName;
    private $dateAdded;
    private $dateUpdated;
    private $active;
    private $imageData;
    private $importUrl;
    
    public function getFileName()
    {
    	return $this->fileName;
    }
    
    public function setFileName($fileName)
    {
    	$this->fileName = $fileName;
    }
    
    public function getDateAdded()
    {
    	return $this->dateAdded;
    }
    
    public function setDateAdded($dateAdded)
    {
    	$this->dateAdded = $dateAdded;
    }
    
    public function getDateUpdated()
    {
    	return $this->dateUpdated;
    }
    
    public function setDateUpdated($dateUpdated)
    {
    	$this->dateUpdated = $dateUpdated;
    }
    
    public function getActive()
    {
    	return $this->active;
    }
    
    public function setActive($active)
    {
    	$this->active = $active;
    }
    
    public function getImageData()
    {
    	return $this->imageData;
    }
    
    public function setImageData($imageData)
    {
    	$this->imageData = $imageData;
    }
    
    public function getImportUrl()
    {
    	return $this->importUrl;
    }
    
    public function setImportUrl($importUrl)
    {
    	$this->importUrl = $importUrl;
    }
}
