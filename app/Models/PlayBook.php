<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayBook extends Model
{
    use HasFactory;


  public function user()
  {
      return $this->belongsTo(User::class, );
  }
  public function regexs()
  {
      return $this->hasMany(Regex::class,'playbook_id' );
  }
}
