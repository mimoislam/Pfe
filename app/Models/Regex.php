<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regex extends Model
{
    use HasFactory;
    protected $table = 'regexs';

    public function playbook()
    {
        return $this->belongsTo(Playbook::class,);
    }
    public function expretions()
    {
        return $this->hasMany(Expretion::class,'regex_id' );
    }

}
