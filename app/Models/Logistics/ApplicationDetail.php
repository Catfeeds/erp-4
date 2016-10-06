<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationDetail extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_application_details';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function product(){
        return $this->hasOne('App\Models\Logistics\Product','id','product_id');
    }
    public function appliction(){
        return $this->belongsTo('App\Models\Logistics\Appliction','appliction_id','id');
    }
    public function scopeUnfinish($query)
    {
        return $query->where('state_buy', 0)->orderBy('id', 'desc');
    }
}
