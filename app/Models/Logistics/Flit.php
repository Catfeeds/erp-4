<?php namespace App\Models\Logistics;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flit extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_flits';
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

    public function Filtrecord(){
        return $this->belongsTo('App\Models\Logistics\Filtrecord', 'stock_number', 'id');
    }

    public function Storehousein(){
        return $this->belongsTo('App\Models\Logistics\Storehouse', 'in', 'id');
    }

    public function Storehouseout(){
        return $this->belongsTo('App\Models\Logistics\Storehouse', 'out', 'id');
    }


    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/flits/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
        return '<a href="/admin/logistics/flits/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
