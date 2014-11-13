<?php

class detalleCompra extends Eloquent
{
	protected $guarded = array();
	public $errors;

	protected $table = "detalleCompras";


    protected $fillable = array('idCompra', 'idProducto', 'precioSinIva', 'precioConIva', 'cantidad', 'detalle');


    public function compra()
    {
    	return $this->belongsTd('compra');
    }


    public function isValid($data)
    {
        $rules = array(
            'idCompra'     => 'required',
            'idProducto'     => 'required',
            'precioSinIva'     => 'required',
            'cantidad'     => 'required',
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }


    public function ValidAndSave($data)
    {
        if($this->isValid($data))
        {
            //$this->// Si la data es valida se la asignamos al usuario
            $this->fill($data);
            // Guardamos el usuario
            $this->save();
            return true;
        }
        else 
            return false;
    }

    public function getTotalAttribute()
    {
        return ($this->precioSinIva * $this->cantidad);
    }
    public function producto()
    {
        return $this->belongsTo('producto', 'idProducto');
    }


}