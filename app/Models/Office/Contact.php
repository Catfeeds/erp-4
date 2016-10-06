<?php namespace App\Models\Office;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    
    protected $table = 'personnel_files';
    protected $dates = ['deleted_at'];

    protected $guarded = [];
    
    public function scopeActive($query){
        return $query->where('state','!=','离职');
    }

    public function scopeInSide($query){
        return $query->where('number','!=','')->where('state','!=','离职');
    }
    public function scopeOutSide($query){
        return $query->where('number','')->where('state','!=','离职');
    } 
    public function belongsToClient(){
        return $this->belongsTo('App\Models\Client\Client', 'company', 'id');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/office/contacts/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
         return '<a href="/admin/office/contacts/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }

}