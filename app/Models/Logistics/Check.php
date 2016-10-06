<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Check extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_checks';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public function scopeAlls($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeReturns($query)
    {
        return $query->where('type', 56)->orderBy('id', 'desc');
    }

    public function scopeWorksheets($query)
    {
        return $query->where('type',53)->orderBy('id', 'desc');
    }

    public function scopePurchases($query)
    {
        return $query->where('type',50)->orderBy('id', 'desc');
    }

    
    public function hasOneDefective(){   
        return $this->hasOne('App\Models\Logistics\Defective', 'id', 'defective');
    }

    public function belongsToProduct(){   
        return $this->belongsTo('App\Models\Logistics\Product', 'product', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/checks/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/logistics/checks/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
