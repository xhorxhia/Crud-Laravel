<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
         
    //primary key
    public $primaryKey = 'id';
    
    // emri tab
    protected $table = 'users';

    //timeStamps
    public $timestamps = true;

}
