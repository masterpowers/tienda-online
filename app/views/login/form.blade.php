     <ul>
      @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
      {{-- Begin page content --}}
      <div class="">
        {{ Form::open(array('url'=>'login/signin', 'class'=>'form-signin')) }}
		   <h2 class="form-signin-heading">Inicia Sesión</h2>
		 
		   {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		   {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		 
		   {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}

      </div>
    