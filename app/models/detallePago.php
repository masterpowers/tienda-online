<?php

class detallePago extends Eloquent
{
	protected $guarded = array();
	public $errors;

	protected $table = "detallePago";


    protected $fillable = array('idPago', 'cantidad', 'fecha', 'descuento');


    public function isValid($data)
    {
        $rules = array(
            'idPago'     => 'required',
            'cantidad'     => 'required',
            'fecha'     => 'required'
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

    public function credito()
    {
        return $this->belongsTo('pago', 'idPago');
    }

    // public function venta(){
    //     return $this->belongsToThrough('venta', 'credito', 'idPago');
    // }

    // public function cliente(){
    //     return $this->belongsToThrough('credito', 'venta', '')
    // }



}