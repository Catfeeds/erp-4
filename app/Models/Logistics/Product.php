<?php namespace App\Models\Logistics;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $table = 'logistics_product_files';
    protected $dates = ['deleted_at'];

    protected $guarded = [];   

    protected $hidden = []; 

    public function scopeMaterial($query)
    {
        return $query->where('type_id',35);
    }

    public function scopePart($query)
    {
        return $query->where('type_id',36);
    }

    public function scopeSubassembly($query)
    {
        return $query->where('type_id',37);
    }

    public function scopeProduct($query)
    {
        return $query->where('type_id',38);
    }

    //组装件
    public function scopeModule($query){ 
        return $query->where('type_id','!=',35)->where('type_id','!=',36);
    }

    //采购件
    public function scopePurchase($query){ 
        return $query->where('type_id','!=',37)->where('type_id','!=',38);
    }

    public function scopeUnlessMaterial($query)
    {
        $parts = Product::part()->get();
        $subassembly = Product::subassembly()->get();
        $product = Product::product()->get();
        return $query->where([
            'type_id'=>$parts,
            'type_id'=>$subassembly,
            'type_id'=>$product
            ]);
    }

    public function hasOnePicture(){   
        return $this->hasOne('App\Models\Office\Picture', 'id', 'image_id');
    }

    public function children(){
        return $this->hasMany('App\Models\Logistics\Product', 'parent_id', 'id');
    }

    public function unit(){   
        return $this->hasOne('App\Models\system\Option', 'id', 'unit_id');
    }

    public function type(){   
        return $this->hasOne('App\Models\system\Option', 'id', 'type_id');
    }

    public function supplier(){   
        return $this->belongsTo('App\Models\Client\Client', 'supplier_id', 'id');
    }

    public function purchaseType(){   
        return $this->hasOne('App\Models\system\Option', 'id', 'purchase_type_id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/logistics/products/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/logistics/products/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
