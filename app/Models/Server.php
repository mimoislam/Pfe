<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;



    public function  audits(){
        return $this
            ->belongsToMany(Audit::class,'audit_server','server_id','audit_id')
            ->withTimestamps()
            ->using(AuditServer::class);;
    }

    public function  auditservers(){
        return $this
            ->hasMany(AuditServer::class,'server_id','id')
           ;
    }
    public function  credentials(){
        return $this->hasMany(Credential::class);

    }

}
