<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flitrecord extends Model
{

    use SoftDeletes;
    
    protected $table = 'logistics_flitrecords';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function Product(){
        return $this->belongsTo('App\Models\Logistics\Product', 'product_number', 'number');
    }

    public function Import(){
        return $this->belongsTo('App\Models\Logistics\Import', 'stock_number', 'number');
    }

    public function Export(){
        return $this->belongsTo('App\Models\Logistics\Export', 'stock_number', 'number');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/records/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
       return '<a href="/admin/logistics/records/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
