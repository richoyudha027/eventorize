<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id'; 
    public $incrementing = true;       
    protected $keyType = 'int';        
    
    protected $fillable = [
        'event_name',
        'organizer',
        'location',
        'category',
        'fee',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'description',
        'image',
    ];

}
