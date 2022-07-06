<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanEng extends Model
{
    use HasFactory;
    public function  audits(){
        return $this->hasMany(Audit::class);

    }
}
