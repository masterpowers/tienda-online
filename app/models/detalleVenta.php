<?php

class detalleVenta extends Eloquent
{
	protected $guarded = array();
	public $errors;

	protected $table = "detalleVentas";


    protected $fillable = array('idVenta', 'idProducto', 'precio', 'cantidad', 'detalle');

    public function isValid($data)
    {
        $rules = array(
            'idVenta'     => 'required',
            'idProducto'  => 'required',
            'precio'      => 'required',
            'cantidad'    => 'required',
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

    public function productos()
    {
        return $this->belongsTo('producto', 'idProducto');
    }

    public function venta()
    {
        return $this->belongsTo('venta', 'idVenta');
    }

}