<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_purchases';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public function scopeAlls($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeFinishs($query)
    {
        return $query->where('state_payment',261)->orderBy('id', 'desc');
    }

    public function scopeUnfinishs($query)
    {
        return $query->where('state_payment','!=',261)->orderBy('id', 'desc');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Client\Client', 'supplier_id', 'id');
    }

    public function handler(){   
        return $this->hasOne('App\Models\Access\User\User', 'id', 'creator_id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/defectives/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute();

    }
}
