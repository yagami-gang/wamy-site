<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapport extends Model 
{

    protected $table = 'rapports';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('libelle');

    public function user()
    {
        return $this->belongsTo('User', 'id_user');
    }

    public function demandes()
    {
        return $this->belongsTo('Informaticien', 'id_informaticien');
    }

}