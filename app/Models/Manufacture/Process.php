<?php namespace App\Models\Manufacture;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use SoftDeletes;
    
    protected $table = 'manufacture_processes';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public function getViewButtonAttribute() {
        return '<a href="/admin/manufacture/processes/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    return '';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/manufacture/processes/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
