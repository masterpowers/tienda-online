<?php

class clientesFiadores extends Eloquent
{
	protected $guarded = array();
	public $errors;
    public $table = 'fiadoresClientes';


    protected $fillable = array('cliente_id', 'fiador_id');


    public function isValid($data)
    {
        $rules = array(
            'cliente_id'     => 'required',
            'fiador_id'		=> 'required'
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
        return $this->belongsTo('cliente', 'cliente_id');
    }

    public function fiador()
    {
        return $this->belongsTo('fiador', 'fiador_id');
    }
        

}