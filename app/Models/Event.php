<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    public $incrementing = true;       
    protected $keyType = 'int';        

    protected $fillable = [
        'name',
        'organizer_u_id',
        'location',
        'category',
        'fee',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'description',
        'image',
        'status',
    ];

    /**
     * Relasi ke user yang berperan sebagai organizer.
     */
    // Event.php
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_u_id');
    }
}
