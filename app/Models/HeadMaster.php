<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadMaster extends Model
{
    use HasFactory;

    protected $table = 'head_masters';
    protected $primaryKey = 'headteacher_id';
}
