<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = 'trademark';
    protected $primaryKey = 'id_trademark';
    protected $fillable = [
        'name_mark'
    ];
    public function vehicles(){
        return $this->belongsTo (Vehicle::class,'id_trademark');
    }
}
