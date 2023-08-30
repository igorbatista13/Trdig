<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TR DIGITAL - MT</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            
                        {{-- <img src="{{images/favicon.svg')}}" height="48" class='mb-4'> --}}
                        <h2> <center> <b> TR - DIGITAL </b> </center> </h2>
                        <p>Por favor, faça o login para acessar o sistema.</p> </center>
                    </div>

                        <div class="form-group position-relative has-icon-left">
                            {{-- <label for="username">Usuário</label> --}}
                            <div class="position-relative">

                              
                                    <x-input-label  for="email" :value="__('Usuário')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>

                             </div> 
                 

                        
                        <div class="form-group position-relative has-icon-left">
               
                            <div class="position-relative">
                                 <!-- Password -->
        
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
     
        <div class="form-control-icon">
            <i data-feather="lock"></i>
        </div>
                
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-start">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">{{ __('Lembrar') }}</label>
                            </div>
                      
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end"> {{ __('Entrar') }}</button>
                        </div>
                    </form>
               <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-block mb-2 btn-primary"><i data-feather="link"></i> </button>
                        </div>
                        <center><h6> Não possui acesso? <a href="{{asset('/registrar')}}">Faça o registro aqui </a> </h6></center> 
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="{{asset('js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
