<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model 
{

    protected $table = 'demandes';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('motif', 'libelle', 'date','id_informaticien','id_user');

    public function demandes()
    {
        return $this->belongsTo('User', 'id_user');
    }
    public function demande()
    {
        return $this->belongsTo('Informaticien', 'id_informaticien');
    }

}