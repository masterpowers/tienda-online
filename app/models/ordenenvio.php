<?php

class ordenEnvio extends Eloquent
{
    protected $guarded = array();
    public $errors;
    protected $table = 'ordenenvio';

    protected $fillable = array('idSucursal','recibe','entrega', 'fecha', 'comprobante', 'detalles');


    public function isValid($data)
    {
        $rules = array(
            'idSucursal'     => 'required|max:20'
        );
    

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }


    public function sucursal()
    {
        return $this->belongsTo('sucursal', 'idSucursal');
    }

    public function detalles()
    {
        return $this->hasMany('detalleEnvio', 'idOrdenEnvio');
    }

    public function scopeProductos($query, $id){
        return $this->detalles()->where('idOrdenEnvio', '=', $id);
    }

    public function productos(){
        return $this->hasMany('detalleEnvio', 'idOrdenEnvio')->select(['cantidad','idProducto']);        
    }

}