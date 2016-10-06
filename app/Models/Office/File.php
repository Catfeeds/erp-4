<?php namespace App\Models\Office;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    
    use SoftDeletes;
    
    protected $table = 'office_files';
    protected $dates = ['deleted_at'];

    protected $guarded = [];
    public function belongsToProduct(){
        return $this->belongsTo('App\Models\Logistics\Product', 'project', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/office/files/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/office/files/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
