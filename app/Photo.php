<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $uploads = '/images/';

    protected $fillable = ['file'];

// Attribute name same as Column name

    public function getFileAttribute($file) {

    	return $this -> uploads . $file;

    }



}
