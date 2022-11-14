<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    protected $table = 'materis';
    protected $primaryKey='id';

    protected $fillable = [
        'subject',
        'pdf',
        'link',
        'course_id'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    
    }

    public function tugas(){
        return $this->hasOne(Tugas::class);
    
    }
    
}
