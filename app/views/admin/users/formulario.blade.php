{{ Form::model($user, $form_data, array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('email', 'Dirección de E-mail') }}
      {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('full_name', 'Nombre completo') }}
      {{ Form::text('full_name', null, array('placeholder' => 'Introduce tu nombre y apellido', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-2">
      @if(Auth::check() && Auth::user()->tipo == 'Administrador')
        {{ Form::label('tipo', 'Tipo') }}
        <select name="tipo" class="form-control">
            <option value="Cliente" selected> Cliente</option>
            <option value="Administrador"> Administrador</option>
        </select>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
      {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button($action . ' usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}