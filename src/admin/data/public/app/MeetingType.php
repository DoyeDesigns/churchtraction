<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingType extends Model
{
  //  protected $guarded = ['id'];
    protected $fillable = ['id', 'name'];

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function events(){
        return $this->hasMany(Events::class);
    }
}