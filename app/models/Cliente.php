<?php

class Cliente extends Eloquent
{
	protected $guarded = array();
	public $errors;


    protected $fillable = array('nombre', 'direccion', 'telefono', 'dui', 'nit', 'email', 'categoria', 'trabajo', 'telTrabajo');


    public function isValid($data)
    {
        $rules = array(
            'nombre'     => 'required|max:255',
            'email'		=> 'email'
        );
        
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
			$rules['id'] = 'required';
        }


        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function compras()
    {
        return $this->hasMany('venta', 'idCliente');
    }

    public function productos()
    {
        $total = 0;
        $compras = $this->compras;
        foreach ($compras as $compra) 
        {
            $total += $compra->productos()->count();
        }
        return $total;
    }

    public function total()
    {
        $total = 0;
        $compras = $this->compras;
        foreach ($compras as $compra) 
        {
            $total += $compra->total();
        }
        return $total;
    }

    public function fiadores()
    {
        return $this->hasMany('clientesFiadores');
    }


    public function pagos()
    {
        return $this->hasManyThrough('pago', 'venta', 'idCliente', 'idVenta' );
    }  

}