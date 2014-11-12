<?php

class Venta extends Eloquent
{
    protected $guarded = array();
    public $errors;


    protected $fillable = array('idCliente','Pago', 'idVendedor', 'fecha', 'detalles');


    public function isValid($data)
    {
        $rules = array(
            'idCliente'     => 'required|max:20'
        );
        

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function cliente()
    {
        return $this->belongsTo('cliente', 'idCliente');
    }

    public function vendedor()
    {
        return $this->belongsTo('vendedor', 'idVendedor');
    }


    public function total()
    {
        $total = 0;
        $detalles = $this->detalle;
        foreach ($detalles as $detalle) 
        {
            $total += $detalle->precio * $detalle->cantidad;
        }
        return $total;
    }

    public function detalle()
    {
        return $this->hasMany('detalleVenta', 'idVenta');
    }

    public function pagos ()
    {
        return $this->hasOne('pago', 'idVenta');
    }

}