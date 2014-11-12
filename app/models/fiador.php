<?php

class Fiador extends Eloquent
{
	protected $table = "fiadores";
	protected $guarded = array();
	public $errors;

    protected $fillable = array('nombre', 'direccion', 'telefono', 'dui', 'nit', 'lugarTrabajo', 'telefonoTrabajo');

    public function isValid($data)
    {
        $rules = array(
            'nombre'     => 'required|max:20',
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


    public function clientes()
    {
        return $this->hasMany('clientesFiadores');
    }

}