<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informaticien extends Model 
{

    protected $table = 'informaticiens';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('point_accumule','id_user');

    public function informaticien()
    {
        return $this->belongsTo('User');
    }

    public function type()
    {
        return $this->hasMany('Rapport');
    }

}