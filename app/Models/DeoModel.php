<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeoModel extends Model{
    use HasFactory;

    public $table = 'deo';
    protected $fillable = ['name','region','district','ward'];

}
