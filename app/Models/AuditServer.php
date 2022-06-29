<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AuditServer extends Pivot
{
    use HasFactory;

    public function  playbook(){
        return $this->belongsTo(PlayBook::class);
    }


}
