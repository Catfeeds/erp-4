<?php namespace App\Models\Equipment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;
    
    protected $table = 'equipment_files';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected $hidden = [];

    public function hasOneBill(){   
        return $this->hasOne('App\Models\Finance\Bill', 'id', 'bill');
    }
    public function AssetsType(){   
        return $this->hasOne('App\Models\System\SystemOption', 'id', 'type');
    }

    public function manager(){   
        return $this->hasOne('App\Models\Personnel\Personnel', 'id', 'worker');
    }
    public function hasonecreator(){   
        return $this->hasOne('App\Models\Access\User\User', 'id', 'creator');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/equipment/equipments/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/equipment/equipments/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
