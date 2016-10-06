<?php namespace App\Models\Manufacture;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Check extends Model
{
    use SoftDeletes;
    
    protected $table = 'manufacture_checks';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];
     
    public function supplier(){   
        return $this->belongsTo('App\Models\Client\Client', 'supplier_id', 'id');
    }

    public function product(){   
        return $this->belongsTo('App\Models\Logistics\Product', 'product_id', 'id');
    }

    public function worksheet(){   
        return $this->hasOne('App\Models\Manufacture\Worksheet', 'id', 'worksheet_id');
    }

}
