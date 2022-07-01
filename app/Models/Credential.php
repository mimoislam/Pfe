<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'server_id'
    ];

    public function Server()
  {
      return $this->belongsTo(Server::class,);
  }

}
