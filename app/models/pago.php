<?php

class Pago extends Eloquent
{
    protected $guarded = array();
    public $errors;

    public $hola = "hol";
    protected $fillable = array('idVenta','numeroCuotas','tiempoPago','detallePago','prima');

 
    public function isValid($data)
    {
        $rules = array(
            'idVenta'       => 'required|unique:Pagos',
            'numeroCuotas'  => 'required',
            'detallePago'   => 'required',
            'prima'         => 'required' ,
            'pagoTotal'     => 'required'
        );
        
        if($this->exists())
            $rules['idVenta'] = 'required';

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    //atributos personalizados
    public function getProximoPagoAttribute(){
        $hoy = date("Y-m-d");  
        $pagosRealizados = $this->getLetrasAttribute();
        $date = date_create($this->venta->fecha);
        date_add($date, date_interval_create_from_date_string($pagosRealizados + 1 . ($this->detallePago == 'Anual' ? "years" : "months")));
        $fecha = date_format($date, 'd-m-Y');
        return $fecha;
    }

    public function getLetrasAttribute(){
        return $this->pagos()->count();
    }

    public function getAbonoAttribute(){
        return $this->pagos()->sum('cantidad');
    }

    public function getTotalAttribute(){
        return $this->venta->total();
    }

    public function getDescuentosAttribute(){
        return $this->pagos()->sum('descuento');
    }

    public function getSaldoAttribute(){
        return $this->getTotalAttribute () - ($this->getAbonoAttribute() + $this->prima + $this->getDescuentosAttribute());
    }

    public function getEnMoraAttribute(){
        $hoy = strtotime(date("d-m-Y",time()));
        $proximoPago = strtotime($this->getProximoPagoAttribute());

        return ($proximoPago < $hoy);
    }

    public function getCuotaAttribute(){
        return ($this->total - $this->prima) / $this->numeroCuotas;
    }


//relaciones
    public function venta()
    {
        return $this->belongsTo('venta', 'idVenta');
    }

    public function pagos()
    {
        return $this->hasMany('detallePago', 'idPago');
    }

    public function cliente()
    {
        return $this->hasOneThrough('cliente', 'venta', 'idVenta');
    }  


}