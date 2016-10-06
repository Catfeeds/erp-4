<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Defective extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_product_defectives';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public function belongsToCheck(){
        return $this->belongsTo('App\Models\Manufacture\Check', 'number', 'id');
    }

    public function hasOneDefect(){   
        return $this->hasOne('App\Models\Logistics\Defect', 'id', 'name');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/defectives/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute();

    }
}
