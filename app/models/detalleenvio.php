<?php

class detalleEnvio extends Eloquent
{
	protected $guarded = array();
	public $errors;

	protected $table = "detallenvio";


    protected $fillable = array('idOrdenEnvio', 'idProducto', 'cantidad');



    public function isValid($data)
    {
        $rules = array(
            'idOrdenEnvio'     => 'required',
            'idProducto'     => 'required',
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

    public function orderEnvio()
    {
        return $this->belongsTo('ordenEnvio');
    }

    public function producto(){
        return $this->belongsTo('producto', 'idProducto');
    }


}