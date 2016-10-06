<?php namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    
    protected $table = 'client_files';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];
     
    public function scopeSupplier($query)
    {
        return $query->where('type_id',  '118');
    }

    public function scopeClient($query)
    {
        return $query->where('type_id', '117');
    }

    public function source(){   
        return $this->hasOne('App\Models\System\Option', 'id', 'source_id');
    }

    public function type(){   
        return $this->hasOne('App\Models\System\Option', 'id', 'type_id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/client/clients/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    return '';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/client/clients/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
