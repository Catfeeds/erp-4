<?php namespace App\Models\Manufacture;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stucture extends Model
{

    use SoftDeletes;
    
    protected $table = 'manufacture_structures';
    protected $dates = ['deleted_at'];

    protected $guarded = [];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function hasOneProcess(){
        return $this->hasOne('App\Models\Manufacture\Process', 'id', 'process');
    }    

    public function product(){
        return $this->hasOne('App\Models\Logistics\Product', 'id', 'product_id');
    }

    public function children(){
        return $this->hasOne('App\Models\Logistics\Product', 'id', 'children_id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/manufacture/stuctures/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/manufacture/stuctures/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
