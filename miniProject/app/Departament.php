<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table ='departaments';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];
    

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
