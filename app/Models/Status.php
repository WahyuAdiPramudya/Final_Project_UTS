<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // use HasFactory;

    protected $table = 'status_patients';
    public $incrementing = true;
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function patient()
    {
        return $this->hasMany(Patients::class);
    }
}
