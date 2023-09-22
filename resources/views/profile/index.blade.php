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
      <h1>Meu Perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Usuários</li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


<style>
.alert-dismissible.fade.show {
    max-width: 600px;
    margin: 60px auto 0 auto;
    position: fixed;
    top: 20px;
    right: 10px;
    z-index: 9999;
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
        display: none;
    }
}

.fadeOut {
    animation: fadeOut 0.5s ease 1 forwards;
}

</style>

@if (session('update'))

  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" id="myAlert" role="alert">

  <i class="bi bi-check-circle me-1 text-light"></i>
  {{session('update')}} 
    <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
{{-- 
  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" id="myAlert2" role="alert">
  <i class="bi bi-exclamation-octagon me-1"></i>
  {{session('msg')}} 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

  <div class="alert alert-warning bg-warning border-0  alert-dismissible fade show" id="myAlert3" role="alert">
  <i class="bi bi-exclamation-triangle me-1"></i>
  {{session('msg')}} 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> --}}


    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              
              @if (Auth::user()->perfil && Auth::user()->perfil->image)
              <img src="{{asset('/images/perfil/'. Auth::user()->perfil->image)}}" alt="Profile">
              @else
              <img src="{{ asset('images/brasao_mt.png') }}" alt="Profile" class="rounded">
          @endif

              <h2>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</h2>
              @foreach(auth()->user()->roles as $role)
                 <h3> {{ $role->name }}</h3>
          @endforeach
              <div class="social-links mt-2">
                {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
                </li>

              <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar Senha</button>
                </li> 

              </ul>
              <div class="tab-content pt-2">

                @include('profile.resumo')
                @include('profile.editar_perfil')
                @include('profile.partials.update-password-form')      

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  @endsection