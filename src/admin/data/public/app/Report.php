<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // protected $fillable = ['event_id','user_id','department_id', 'start_time', 'end_time', 'expected_attendance', 'real_attendance', 'details', 'files'];
    protected $fillable = ['id', 'created_at', 'updated_at', 'event_id', 'department_id', 'details', 'meeting_start_time', 'meeting_end_time', 'expected_attendance', 
        'real_attendance', 'files', 'user_id', 'church_id', 'cell_id', 'cell_leader_id', 'cell_secretary', 'meeting_type_id', 'reporter', 'meeting_location', 'total_meeting_attendance', 'total_mid_week_service_attendance', 'total_sunday_week_service_attendance', 'total_first_timer', 'total_new_converts', 'total_cell_offerings', 'have_cell_offering_remitted', 'if_yes_to_whom', 'cell_leader_comment', 'did_you_have_soul_winning', 'if_yes_soul_winning_comment', 'name_of_the_souls', 'summary_report', 'who_did_the_follow_up', 'meeting_date'];

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
