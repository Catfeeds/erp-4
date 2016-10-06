<?php namespace App\Models\Office;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{

    use SoftDeletes;
    
    protected $table = 'office_schedules';
    protected $dates = ['deleted_at'];

    protected $guarded = [];


    public function scopeForme($query){
        $user_id = Auth::id();
        return $query->where('user_id',$user_id);
    }
    public function belongsToClient(){
        return $this->belongsTo('App\Models\Client\Client', 'client', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/office/schedules/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/office/schedules/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
