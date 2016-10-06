<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockChange extends Model
{
    use SoftDeletes;

    protected $table = 'logistics_stock_changes';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function worksheet(){   
        return $this->hasOne('App\Models\Manufacture\Worksheet', 'id', 'worksheet_id');
    }

    public function handler(){   
        return $this->belongsTo('App\Models\Access\User\User', 'creator_id', 'id');
    }

    public function supplier(){   
        return $this->belongsTo('App\Models\Client\Client', 'supplier_id', 'id');
    }

    public function product(){
        return $this->hasOne('App\Models\Logistics\Product','id','product_id');
    }
    // public function product(){   
    //     return $this->belongsTo('App\Models\Logistics\Product', 'product_id', 'id');
    // }


    public function getViewImport() {
        return '<a href="/admin/logistics/imports/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }
    public function getEditImport() {
         return '<a href="/admin/logistics/imports/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }
    public function getImportButtonsAttribute() {
        return  $this->getViewImport().' '.
                $this->getEditImport();
    }

    public function getViewExport() {
        return '<a href="/admin/logistics/exports/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }
    public function getEditExport() {
         return '<a href="/admin/logistics/exports/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }
    public function getExportButtonsAttribute() {
        return  $this->getViewExport().' '.
                $this->getEditExport();
    }

    public function getViewCollect() {
        return '<a href="/admin/manufacture/collects/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i> 明细</a> ';
    }
    public function getEditCollect() {
         return '<a href="/admin/manufacture/collects/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }
    public function getCollectButtonsAttribute() {
        return  $this->getViewCollect();
    }  

    public function getViewRetour() {
        return '<a href="/admin/manufacture/retours/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i> 明细</a> ';
    }
    public function getEditRetour() {
         return '<a href="/admin/manufacture/retours/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }
    public function getRetourButtonsAttribute() {
        return  $this->getViewRetour();
    }
}
