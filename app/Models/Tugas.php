<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugass';
    protected $primaryKey='id';

    protected $fillable = [
        'pdf',
        'materi_id'
    ];
}
