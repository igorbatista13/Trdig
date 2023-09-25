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


    @include('alertas.index')

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

          @if (Auth::user()->perfil && Auth::user()->perfil->Tipo)
          <h3> <b> {{Auth::user()->perfil->Tipo }} </b></h3>

          @endif
              <div class="social-links mt-2">
                 {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>  --}}
                 @if (Auth::user()->perfil && Auth::user()->perfil->Facebook)
                    <a href="https://facebook.com/{{Auth::user()->perfil->Facebook}}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                 @else
                    <a href="" class="facebook"><i class="bi bi-facebook"></i></a>
                 @endif

                 @if (Auth::user()->perfil && Auth::user()->perfil->Instagram)
                    <a href="https://instagram.com/{{Auth::user()->perfil->Instagram}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                 @else
                    <a href="" class="instagram"><i class="bi bi-instagram"></i></a>
                 @endif

                 @if (Auth::user()->perfil && Auth::user()->perfil->Linkedin)
                    <a href="https://linkedin.com/{{Auth::user()->perfil->Linkedin}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                 @else
                    <a href="" class="linkedin"><i class="bi bi-linkedin"></i></a>
                 @endif




                {{-- <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> --}}
                {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
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