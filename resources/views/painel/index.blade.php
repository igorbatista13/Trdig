@extends('base.novabase')
@section('content')
<?php 
$processoCount = session()->get('processoCount'); 
$processoCount_corrigir = session()->get('processoCount_corrigir'); 
$processoCount_finalizado = session()->get('processoCount_finalizado'); 
$processoCount_aguardando = session()->get('processoCount_aguardando'); 
$processoCount_tramitada = session()->get('processoCount_tramitada'); 
$processoCount_nao_finalizada = session()->get('processoCount_nao_finalizada'); 
?>
<main id="main" class="main">

  
    <div class="pagetitle">
        <h1>Painel Gerencial</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Início</a></li>
            <li class="breadcrumb-item active">Painel Gerencial</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  

    <div class="row">


        <div class="col-xl-2 col-md-2 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <img class="card-img" src="{{asset('/images/brasao_mt.png')}}" width="50px" >
                    <div class="card-img-overlay overlay-dark bg-overlay d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Órgãos do Estado</h4>
                        
                        </div>
                        <div class="overlay-status">
                            <a href="{{asset('/orgaos')}}" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2 col-sm-2">
            <div class="card">
                <div class="card-content">
                    <img class="card-img img-fluid" src="{{asset('/images/brasao_mt.png')}}" width="200px" alt="Card image">
                    <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Estados</h4>
                            <p class="card-text text-ellipsis">
                                Consulte os Estado.
                            </p>
                        </div>
                        <div class="overlay-status text-right">
                            <a href="{{asset('/estado')}}" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





<div class="col-xl-2 col-md-2 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <img class="card-img img-fluid" src="{{asset('/images/brasao_mt.png')}}" alt="Card image">
                    <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Cidades</h4>

                          
                        </div>
                        <div class="overlay-status">
                            <a href="{{asset('/cidade')}}" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-2 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img img-fluid" src="{{asset('/images/brasao_mt.png')}}" alt="Card image">
                    <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Questões do Fomulário</h4>
                            <p class="card-text text-ellipsis">
                                Cadastro e Consulta de Questões do Fomulário
                            </p>
                        </div>
                        <div class="overlay-status text-right">
                            <a href="#" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img img-fluid" src="{{asset('/images/brasao_mt.png')}}" alt="Card image">
                    <div class="card-img-overlay overlay-dark bg-overlay d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Usuários do Sistema</h4>
                
                        </div>
                        <div class="overlay-status">
                            <a href="{{asset('/users')}}" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img img-fluid" src="{{asset('/images/brasao_mt.png')}}" alt="Card image">
                    <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Perfis do Sistema</h4>

                        
                        </div>
                        <div class="overlay-status text-right">
                            <a href="{{asset('/roles')}}" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-xl-2 col-md-2 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <img class="card-img img-fluid" src="{{asset('/images/biblioteca.png')}}" width="100px" alt="Card image">
                    <div class="card-img-overlay overlay-dark bg-overlay d-flex justify-content-between flex-column">
                        <div class="overlay-content">
                            <h4 class="card-title mb-50">Biblioteca, links e manuais </h4>
                            <p class="card-text text-ellipsis">
                            </p>
                        </div>
                        <div class="overlay-status">
                            <a href="{{asset('/biblioteca')}}" class="btn btn-primary btn-sm">Clique aqui </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div></main>



@endsection