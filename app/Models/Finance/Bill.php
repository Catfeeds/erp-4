<?php namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{

    use SoftDeletes;
    
    protected $table = 'finance_bills';
    protected $dates = ['deleted_at'];

    protected $guarded = [];


    public function belongsToClient(){
        return $this->belongsTo('App\Models\Client\Client', 'client', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/finance/bills/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/finance/bills/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
