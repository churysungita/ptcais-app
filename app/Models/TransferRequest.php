<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class TransferRequest extends Model
{
    use HasFactory;

    public $table = 'transfer';
    public $timestamps = false;
    protected $primaryKey = 'transfer_id';

    protected $fillable = [
        'student_id',
        'region',
        'district',
        'school',
        'reason',
        'more_reason',
    ];
}
