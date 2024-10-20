<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    public $incrementing = true;       
    protected $keyType = 'int';        

    protected $fillable = [
        'name',
        'time',
        'total',
        'u_id',
        'e_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'e_id');
    }

}
