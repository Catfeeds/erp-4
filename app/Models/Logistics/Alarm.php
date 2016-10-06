<?php namespace App\Models\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alarm extends Model
{   
    use SoftDeletes;

    protected $table = 'logistics_product_files';
    
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function scopeProduct($query)
    {
        return $query->where('type' , '=' , '成品');
    }

    public function scopeSubassembly($query)
    {
        return $query->where('type' , '=' , '组件');
    }

    public function scopeNomaterials($query)
    {
        return $query->where('type' , '!=' , '原材料');
    }

    public function scopeNoparts($query)
    {
        return $query->where('type' , '!=' , '零件');
    }

    public function hasOnePicture(){   
        return $this->hasOne('App\Models\Office\Picture', 'id', 'image_id');
    }

    public function belongsToSupply(){   
        return $this->belongsTo('App\Models\Office\Client', 'supply', 'id');
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/logistics/alarms/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return $this->getEditButtonAttribute();

    }
}
