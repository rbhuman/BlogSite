<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table='Posts';
   public $primaryKey='id';
   

   public function user(){
       return $this->belongsTo('App\User');
   }
  
   
}
