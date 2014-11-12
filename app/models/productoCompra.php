<?php

class productoCompra extends Eloquent
{
	protected $table = "viewproductoventa";
    protected $guarded = array(); //Permite guardar en la base de datos
    public $errors;
    public $timestamps = false;
    
}