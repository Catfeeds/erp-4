<?php namespace App\Models\Manufacture;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worksheet extends Model
{

    use SoftDeletes;
    
    protected $table = 'manufacture_worksheets';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function scopeWork($query)
    {
        return $query->where('type', '加工单');
    }

    public function scopeUnfinish($query)
    {
        return $query->where('state_id', 18)->where('type','加工单');
    }

    public function scopeFinish($query)
    {
        return $query->where('state_id', 19)->where('type','加工单');
    }

    public function scopeCease($query)
    {
        return $query->where('state_id', '<',20)->where('type','加工单');
    }
    
    public function product(){
        return $this->hasOne('App\Models\Logistics\Product','id','product_id');
    }

    public function state(){
    	return $this->hasOne('App\Models\System\Option','id','state_id');
    }

    public function plan(){
        return $this->hasOne('App\Models\Manufacture\Plan','id','plan_id');
    }

    public function supply(){
        return $this->hasOne('App\Models\Client\Client','id','supplier_id');
    }

    public function user(){
        return $this->hasOne('App\Models\Access\User\User','id','operator_id');
    }


    public function getViewButtonAttribute() {
        return '<a href="/admin/manufacture/manufacture/plans/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/manufacture/manufacture/plans/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
