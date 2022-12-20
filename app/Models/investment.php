<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investment extends Model
{
    protected $table = 'investments';

    protected $fillable =[
        'capital',
        'workingcapital',
        'withdraws',
        'sales',
        'profits',
        'fkuser',
    ];
}
