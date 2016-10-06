<?php namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    
    use SoftDeletes;
    
    protected $table = 'finance_plans';
    protected $dates = ['deleted_at','start_date','end_date'];

    protected $guarded = [];

    public function belongsToClient(){
        return $this->belongsTo('App\Models\Client\Client', 'client', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/finance/plans/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    return '';
    }

    public function getEditButtonAttribute() {
        return '<a href="/admin/finance/plans/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
