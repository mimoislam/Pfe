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

    public function audit(){
        return $this->belongsTo(Audit::class,'audit_id');
    }
    public function results(){
        return $this->hasMany(Result::class,'audit_server_id');
    }


}
