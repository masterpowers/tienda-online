
<?php

class vendedor extends Eloquent
{
	protected $table = "vendedores";

	public $errors;


	//Permite el llenado masivo de los datos.
	protected $fillable = array('nombre', 'direccion', 'telefono', 'dui', 'nit', 'email', 'activo');
    public function isValid($data)
    {
        $rules = array(
            'nombre'     => 'required|max:40',
            'telefono' => 'required|max:20',
            'email'		=> 'email'
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
}