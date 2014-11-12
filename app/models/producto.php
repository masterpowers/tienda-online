<?php
class producto extends Eloquent
{
	protected $guarded = array(); //Permite guardar en la base de datos
	public $errors;

    protected $fillable = array('nombre', 'descripcion', 'idCategoria', 'unidad','minimo', 'ubicacion','modelo','garantia','activo', 'created_at', 'updated_at');

    private function isValid($data)
    {
        $rules = array(
            'nombre'     => 'required',
            'idCategoria' => 'required'
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

    public function category()
    {
        return $this->belongsTo('categoria', 'idCategoria');
    }

    public function compras()
    {
        return $this->hasMany('detalleCompra', 'idProducto');
    }

    public function ventas()
    {
        return $this->hasMany('detalleVenta', 'idProducto');
    }

    public function envios()
    {
        return $this->hasMany('detalleenvio', 'idProducto');
    }

}