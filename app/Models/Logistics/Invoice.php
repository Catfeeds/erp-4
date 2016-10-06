<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{

    use SoftDeletes;
    
    protected $table = 'logistics_invoices';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function belongsToClient(){
        return $this->belongsTo('App\Models\Client\Client', 'client', 'id');
    }
    public function belongsToUser(){
        return $this->belongsTo('App\Models\Access\User\User', 'operator', 'id');
    }

    public function belongsToProduct(){
        return $this->belongsTo('App\Models\Logistics\Product', 'product', 'id');
    }

    public function Consignor(){
        return $this->belongsTo('App\Models\Personnel\Personnel', 'consignor', 'id');
    }

    public function Consignee(){
        return $this->belongsTo('App\Models\Personnel\Personnel', 'consignee', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/invoices/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
        return '<a href="/admin/logistics/invoices/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getEditButtonAttribute();

    }

}
