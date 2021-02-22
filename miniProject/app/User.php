<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Message;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin','tel', 'cover_image', 'id_departament',  //'dep_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_Admin(){
        if($this->isAdmin){
            return true;
        }
        else{
            return false;
        }
    }

     
    //primary key
    public $primaryKey = 'id';

    public $foreignKey = 'id_departament';
    
    // emri tab
    protected $table = 'users';

    //timeStamps
    public $timestamps = true;


    public function departament()
    {
    	return $this->belongsTo(Departament::class);
    }

   public function messages(){
       return $this->hasMany(Message::class);
   }
}
