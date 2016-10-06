<?php namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quoteprice extends Model
{
    use SoftDeletes;
    
    protected $table = 'Client_quoteprices';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected $hidden = [];

    public function product(){
        return $this->belongsTo('App\Models\Logistics\Product', 'product_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Client\Client', 'client_id', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/client/quoteprices/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/client/quoteprices/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
