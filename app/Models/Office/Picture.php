<?php namespace App\Models\Office;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;
    
    protected $table = 'office_pictures';
    protected $dates = ['deleted_at'];

    protected $guarded = [];
}
