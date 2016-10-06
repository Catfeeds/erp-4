<?php namespace App\Models\Logistics;

use App\Models\Logistics\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    

    protected $table = 'logistics_applications';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function scopeAlls($query)
    {
        return $query->orderBy('id', 'desc')->get();
    }

    public function scopeUnfinish($query)
    {
        return $query->where('state_id', 67)->orderBy('id', 'desc');
    }

    public function scopeFinish($query)
    {
        return $query->where('state_id', 70)->orderBy('id', 'desc');
    }

    public function type(){
        return $this->hasOne('App\Models\System\Option','id','type_id');
    }

    public function state(){
        return $this->hasOne('App\Models\System\Option','id','state_id');
    }

    public function creator(){
        return $this->hasOne('App\Models\Access\User\User','id','creator_id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/manufacture/plans/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/manufacture/plans/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
