<?php namespace App\Models\System;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    

    protected $table = 'system_menus';
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function getViewButtonAttribute() {
        return '<a href="/admin/dashboard/menus/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/dashboard/menus/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
