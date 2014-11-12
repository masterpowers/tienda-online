<?php

class clientesFamilias extends Eloquent
{
	protected $guarded = array();
	public $errors;
    public $table = 'familiaClientes';


    protected $fillable = array('cliente_id', 'familia_id');


    public function isValid($data)
    {
        $rules = array(
            'cliente_id'     => 'required',
            'familia_id'		=> 'required'
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

    public function familia()
    {
        return $this->belongsTo('fiador', 'fiador_id');
    }
        

}