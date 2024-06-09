<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model 
{

    protected $table = 'types_users';
    protected $fillable = array('id_type','id_user');
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function type()
    {
        return $this->belongsTo('User', 'id_user');
    }

    public function user()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }

}