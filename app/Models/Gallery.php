<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'machines_id', 'photo'
    ];

    protected $hidden = [

    ];

    public function machines()
    {
        return $this->belongsTo(Machine::class, 'machines_id', 'id');
    }
    
    public function getPhotoAttribute($value){
        return url('storage/', $value);
    }
}
