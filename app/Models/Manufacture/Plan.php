<?php namespace App\Models\Manufacture;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    

    protected $table = 'manufacture_plans';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function scopeAlls($query)
    {
        return $query->where('type','生产计划')->orderBy('id', 'desc')->where('parent_id','');
    }

    public function scopeUnfinish($query)
    {
        return $query->where('state_id', 18)->where('type','生产计划')->orderBy('id', 'desc')->where('parent_id','');
    }

    public function scopeFinish($query)
    {
        return $query->where('state_id', 19)->where('type','生产计划')->orderBy('id', 'desc')->where('parent_id','');
    }

    public function scopeCease($query)
    {
        return $query->where('state_id', '<',10)->where('type','生产计划')->orderBy('id', 'desc')->where('parent_id','');
    }
    public function product(){
        return $this->hasOne('App\Models\Logistics\Product','id','product_id');
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
