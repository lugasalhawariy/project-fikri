<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\History;

use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'departemen', 'divisi', 'no_badge'
    ];

    protected $hidden = [
        
    ];

    public function history()
    {
        return $this->hasMany('App\Models\History', 'employees_id', 'id');
    }
}
