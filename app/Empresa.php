<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   protected $table = 'empresas';
   
   public $timestamps  = false;
   
   protected $primaryKey = 'empresa_id';
   
   protected $fillable = [
        'nombre',
        'descripcion'
   ];
   
   public function clientsOf (){
      return $this->belongsToMany('App\Empresa', 'empresas_relacion', 'cliente_id', 'proveedor_id')->orderBy('nombre');
   }

   public function providersOf (){
      return $this->belongsToMany('App\Empresa', 'empresas_relacion', 'proveedor_id', 'cliente_id')->orderBy('nombre');
   }
   
}
