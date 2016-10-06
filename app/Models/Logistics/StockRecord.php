<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockRecord extends Model
{

    use SoftDeletes;
    
    protected $table = 'logistics_stock_records';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function belongsToCompany(){
        return $this->belongsTo('App\Models\Client\Client', 'company', 'id');
    }

    public function belongsToHandler(){
        return $this->belongsTo('App\Models\Personnel\Personnel', 'handler', 'id');
    }

    public function belongsToProduct(){
        return $this->belongsTo('App\Models\Logistics\Product', 'product', 'id');
    }

    public function Record(){
        return $this->belongsTo('App\Models\Logistics\Record', 'stock_number', 'number');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/exports/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }
    public function getEditButtonAttribute() {
         return '<a href="/admin/logistics/exports/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
