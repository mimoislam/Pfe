<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;


    public function auditServer(){
        return $this->belongsTo(AuditServer::class,'audit_server_id');
    }
}
