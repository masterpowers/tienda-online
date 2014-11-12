<?php
class proveedor extends Eloquent
{
    protected $table = 'proveedores';
	protected $guarded = array(); //Permite guardar en la base de datos
	public $errors;
    private function isValid($data)
    {
        $rules = array(
            'nombre'     => 'required',
            'contacto' => 'required',
            'email'     => 'email'
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

    public function compras()
    {
        return $this->hasMany('compra');
    }

}