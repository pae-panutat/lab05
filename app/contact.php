<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = ['name', 'meter'];
    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    //     'updated_at' => 'datetime:Y-m-d H:i:s'
    // ];
    protected function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
}
