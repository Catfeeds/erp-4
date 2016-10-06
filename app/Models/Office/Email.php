<?php namespace App\Models\Office;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;
    

    protected $table = 'office_emails';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function scopeInputEmail($query){
        return $query->where('to', Auth::id());
    }

    public function scopeOutEmail($query){
        return $query->where('user_id', Auth::id());
    }

    public function belongsToUser(){
        return $this->belongsTo('App\Models\Access\User\User', 'to', 'id');
    }

    public function belongsFromUser(){
        return $this->belongsTo('App\Models\Access\User\User', 'user_id', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/office/emails/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/office/emails/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
