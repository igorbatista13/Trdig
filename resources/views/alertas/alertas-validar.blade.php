<style>
    .card-edit {
        display: flex;
        flex: 0 0 auto;
        background: #fff;
        max-width: 700px;
        margin: 80px 0;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .card-pic-corrigir {
        border-radius: 5px 0 0 5px;
        width: 300px;
        flex: 0 0 auto;
        position: relative;
        background: linear-gradient(to bottom, #f5c906, #f5c906);
    }

    .card-pic-corrigir img {
        position: absolute;
        bottom: 3em;
        left: 50%;
        margin-left: -175px;
        width: 350px;
        -webkit-box-reflect: below -1px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(90%, transparent), to(rgba(250, 250, 250, 0.15)));
    }

    .card-pic-vazio {
        border-radius: 5px 0 0 5px;
        width: 300px;
        flex: 0 0 auto;
        position: relative;
        background: linear-gradient(to bottom, #f5c906, #f5c906);
    }

    .card-pic-vazio img {
        position: absolute;
        bottom: 3em;
        left: 50%;
        margin-left: -175px;
        width: 350px;
        -webkit-box-reflect: below -1px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(90%, transparent), to(rgba(250, 250, 250, 0.15)));
    }

    .card-pic-aguardando {
        border-radius: 5px 0 0 5px;
        width: 300px;
        flex: 0 0 auto;
        position: relative;
        background: linear-gradient(to bottom, #1333e9, #1333e9);
    }

    .card-pic-aguardando img {
        position: absolute;
        bottom: 3em;
        left: 50%;
        margin-left: -175px;
        width: 350px;
        -webkit-box-reflect: below -1px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(90%, transparent), to(rgba(250, 250, 250, 0.15)));
    }

    .card-pic-finalizado {
        border-radius: 5px 0 0 5px;
        width: 300px;
        flex: 0 0 auto;
        position: relative;
        background: linear-gradient(to bottom, #0ac403, #0ac403);
    }

    .card-pic-finalizado img {
        position: absolute;
        bottom: 3em;
        left: 50%;
        margin-left: -175px;
        width: 350px;
        -webkit-box-reflect: below -1px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(90%, transparent), to(rgba(250, 250, 250, 0.15)));
    }

    .card-content {
        padding: 3em 4em 2em;

    }


    .card-edit .a:hover {
        background: #1619c5;
    }

    @media (max-width: 790px) {
        body {
            overflow-x: hidden;
        }

        .wrap {
            margin-left: 20px;
            margin-right: 20px;
        }

        .card-edit {
            flex-direction: column;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card-pic-corrigir {
            width: 100%;
            border-radius: 5px 5px 0 0;
        }

        .card-pic-corrigir img {
            bottom: 20px;
            position: relative;
        }

        .card-content {
            padding: 2em 2em 1em;
        }
    }
</style>

<div class="card-edit">
    @if ($n_processo->Status == 'CORRIGIR')
        <div class="card-pic-corrigir">
    @endif

    @if ($n_processo->Status == '')
        <div class="card-pic-vazio">
    @endif

    @if ($n_processo->Status == 'AGUARDANDO')
        <div class="card-pic-aguardando">
    @endif


    @if ($n_processo->Status == 'FINALIZADO')
        <div class="card-pic-finalizado">
    @endif

    <img src="https://st.hzcdn.com/simgs/1cc1ba0602975e66_16-7271/preparation.jpg">
</div>





<div class="card-content">
    
    <h3>TR: N° {{ $n_processo->id }}</h3>
    @if ($n_processo->Status == 'CORRIGIR')
    <!-- Button trigger modal -->
    <span class="badge bg-warning position-absolute">
        <i class="bi bi-check-circle me-1"></i> CORRIGIR </span>
@endif
@if ($n_processo->Status == 'FINALIZADO')
    <!-- Button trigger modal -->
    <span class="badge bg-success position-absolute">
        <i class="bi bi-check-circle me-1"></i> FINALIZADO </span>
@endif
@if ($n_processo->Status == 'AGUARDANDO')
    <!-- Button trigger modal -->
    <span class="badge bg-primary position-absolute">
        <i class="bi bi-check-circle me-1"></i> AGUARDANDO ANÁLISE </span>
@endif

<BR>
    <small> <a class="text-dark">
            Tramitado para:
        </a></small>
    <br>
    <p class="card-text text-primary">
        <img src="{{ asset('images/brasao_mt.png') }}" class="img-fluid rounded" width="30px">

        <b> {{ $n_processo->Orgaos->Sigla ?? 'Não informado' }} - </b>
        <i> <small>
                {{ $n_processo->Orgaos->Nome ?? ('Não informado' ?? 'Não informado') }}
            </small>
            <br>
            <i class="bi bi-calendar-event me-1"></i>
            <small>
                {{ $n_processo->created_at->format('m/d/Y') ?? 'Não informado' }}
            </small>
            <p class="card-text">
                <i class="bi bi-building me-1"></i>
                {{ $n_processo->instituicao->Nome_Instituicao ?? 'Não informado' }}

                <br>
                <small>
                    <i class="bi bi-person-fill me-1"></i>
                    {{ $n_processo->Resp_Instituicao->Nome_Resp_Instituicao ?? 'Não informado' }}<br>
                    <i class="bi bi-telephone-fill me-1"></i>
                    {{ $n_processo->Resp_Instituicao->Telefone_Instituicao ?? 'Não informado' }}
                    <br>

                </small>
            </p>

            @if ($n_processo->Status == 'CORRIGIR')
                <center> <a class="btn bg-warning text-white" href="{{ route('trdigital.edit', $n_processo->id) }}">
                        <i class="bi bi-pen me-1"></i>
                        CORRIGIR</a>
                </center>

                <br>
                <div class="alert border-warning text-center alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Você precisa realizar <b>
                        correções
                    </b> em seu documento.

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($n_processo->Status == 'FINALIZADO')
                <!-- Button trigger modal -->


                <!-- Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sigcon_anexos"
                    data-bs-meta-id="sigcon_anexos">
                    Enviar arquivos do SIGCON
                </button>


                <div class="modal fade" id="sigcon_anexos" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-exclamation-octagon me-1 text-warning"></i><b>
                                        Envie os
                                        arquivos do SIGCON </b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                @include('alertas.anexar_sigcon')
                            </div>
                        </div>
                    </div>
                </div>
            @endif

{{-- 

            @if ($n_processo->Status == 'AGUARDANDO')
                <span class="badge bg-primary custom-badge position-absolute">
                    <i class="bi bi-alarm me-1"> Em Análise
                    </i></span>
            @endif --}}
            @if ($n_processo->Status == '')
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Finalize as informações em
                    seu
                    documento.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <center> <a class="btn bg-warning text-white" href="{{ route('trdigital.edit', $n_processo->id) }}">
                        <i class="bi bi-pen me-1"></i>
                        Continuar o preenchimento</a>
                </center>
            @endif
</div>

</div>
