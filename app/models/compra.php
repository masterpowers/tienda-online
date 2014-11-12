<?php

class Compra extends Eloquent
{
    protected $guarded = array();
    public $errors;


    protected $fillable = array('idProveedor', 'fecha', 'comprobante', 'detalle');


    public function isValid($data)
    {
        $rules = array(
            'idProveedor'     => 'required',
            'email'     => 'email'
        );
    

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    //atributes

    public function total()
    {
        $total = 0;
        $products = $this->detalles;
        foreach ($products as $product) 
        {
            $total += $product->precioSinIva * $product->cantidad;
        }
        return $total;
    }

    public function proveedor()
    {
        return $this->belongsTo('proveedor', 'idProveedor');
    }

    public function detalles()
    {
        return $this->hasMany('detalleCompra', 'compra_id');
    }


}