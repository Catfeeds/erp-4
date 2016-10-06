<?php namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model {

    use SoftDeletes;
    
    protected $table = 'client_services';
    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public function client(){
        return $this->belongsTo('App\Models\Client\Client', 'client_id', 'id');
    }

    public function hasOneContact()
    {
        return $this->hasOne('App\Models\Office\Contact', 'id', 'contact');
    }
    
    public function hasOneApprover()
    {
        return $this->hasOne('App\Models\Personnel\Personnel', 'id', 'approver');
    }

    public function getViewButtonAttribute() {
        return '<a href="/admin/client/services/'.$this->id.'" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="查看"></i></a> ';
    }

    public function getEditButtonAttribute() {
        return '<a href="/admin/client/services/'.$this->id .'/edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return  $this->getViewButtonAttribute().' '.
                $this->getEditButtonAttribute();

    }
}
