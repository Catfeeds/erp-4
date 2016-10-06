<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseDetail extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_purchase_details';
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function product(){
        return $this->hasOne('App\Models\Logistics\Product','id','product_id');
    }
}
