<?php

namespace App\Models;
use App\Models\Machine;
use App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'machines_id', 'employees_id', 'keterangan', 'sparepart'
    ];

    protected $hidden = [
        
    ];

    public function machine()
    {
        return $this->belongsTo('App\Models\Machine', 'machines_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employees_id', 'id');
    }
}
