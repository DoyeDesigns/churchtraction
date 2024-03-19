<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutreachReport extends Model
{
    // protected $fillable = ['event_id','user_id','department_id', 'start_time', 'end_time', 'expected_attendance', 'real_attendance', 'details', 'files'];
    protected $fillable = ['id', 'created_at', 'updated_at', 'event_id', 'department_id', 'details', 
         'files', 'user_id', 'church_id', 'cell_id', 'cell_leader_id', 'cell_secretary', 'reporter', 'meeting_date', 'meeting_location', 'cell_leader_comment', 'did_you_have_soul_winning', 'if_yes_soul_winning_comment', 'name_of_the_souls', 'summary_report', 'acknowledge'];

    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function church(){
        return $this->belongsTo(Church::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meetingType(){
        return $this->belongsTo(MeetingType::class);
    }
}
