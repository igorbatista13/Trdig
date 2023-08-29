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
      <h1>Biblioteca</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
          <li class="breadcrumb-item active">Biblioteca</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">

            @foreach ($biblioteca as $bibliotecas)
            <div class="card mb-2">
                <div class="row g-2">
                  <div class="col-md-2">
                    @if ($bibliotecas->Tipo == 'PDF')
                    <img src="{{ asset('images/pdf.png') }}" class="img-fluid rounded-start">
                    @elseif ($bibliotecas->Tipo == 'Excel')
                    <img src="{{ asset('images/excel.png') }}" class="img-fluid rounded-start">
                    @elseif ($bibliotecas->Tipo == 'Word')
                    <img src="{{ asset('images/word.png') }}" class="img-fluid rounded-start">
                    @elseif ($bibliotecas->Tipo == 'Outros')
                    <img src="{{ asset('images/biblioteca-ico.png') }}" class="img-fluid rounded-start">
                    @elseif ($bibliotecas->Tipo == 'Link')
                    <img src="{{ asset('images/link.png') }}" class="img-fluid rounded-start">
                         @else
                     @endif

                  </div>
                  <div class="col-md-4">
                    <div class="card-body">
                      <h5 class="card-title"> {{ $bibliotecas->Nome }}</h5>
                      @if ($bibliotecas->Descricao)
                      <p class="card-text"><b> Sobre: </b>{{ $bibliotecas->Descricao }}.</p>
                           @else
                       @endif
                      @if ($bibliotecas->Link)
                      <p> <b> Link: </b> <a href="{{ $bibliotecas->Link }}" target="_blank">{{ $bibliotecas->Link }}</a></p>
                           @else
                       @endif
                      @if ($bibliotecas->Anexo)
                      <b> Anexo: </b> <a class="btn btn-primary" href="{{ asset('storage/' . $bibliotecas->Anexo) }}"
                           target="_blank"> <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo </a>
                           @else
                       @endif
                    </div>
                  </div>
                </div>
              </div><!-- End Card with an image on left -->
              @endforeach


          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4">

            <img src="{{asset('/images/samples/biblioteca.jpg')}}">
            
          </div>

        </div>
        

    
      </div>

    </section>

  </main><!-- End #main -->

  @endsection