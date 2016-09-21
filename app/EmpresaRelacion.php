<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaRelacion extends Model
{
   protected $table = 'empresas_relacion';
   
   public $timestamps  = false;
   
   protected $primaryKey = 'relacion_id';
   
}
