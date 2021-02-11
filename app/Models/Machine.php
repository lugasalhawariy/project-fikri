<?php

namespace App\Models;

use App\Models\History;
use App\Models\Gallery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'tag', 'area', 'merk', 'model', 'range', 'unit'
    ];

    protected $hidden = [
        
    ];

    public function history()
    {
        return $this->hasMany('App\Models\History', 'machines_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery', 'machines_id', 'id');
    }
}
