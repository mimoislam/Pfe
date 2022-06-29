<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class, );
    }
    public function scanEng()
    {
        return $this->belongsTo(ScanEng::class, );
    }

    public function  servers(){
        return $this
            ->belongsToMany(Server::class,'audit_server','audit_id','server_id')
            ->withTimestamps()
            ->using(AuditServer::class);
    }

//    public function  results(){
//        return $this
//            ->belongsToMany(Result::class,'audit_server','audit_id')
//            ->withTimestamps()
//            ->using(AuditServer::class);
//    }
    public function files(){
        return $this->hasMany(File::class,'audit_id');
    }
    public function auditServers(){
        return $this->hasMany(AuditServer::class,'audit_id');
    }
}
