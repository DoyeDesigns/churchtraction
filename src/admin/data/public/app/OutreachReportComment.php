<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutreachReportComment extends Model
{
    protected $fillable = ['id', 'from_user', 'report_id', 'message', 'created_at', 'updated_at'];
}
