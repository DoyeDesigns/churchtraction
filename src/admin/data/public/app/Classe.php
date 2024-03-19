<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $guarded = ['id', 'name', 'file', 'church_id'];

}
