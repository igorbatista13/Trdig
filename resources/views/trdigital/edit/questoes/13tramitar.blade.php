{!! Form::close() !!}

<div class="tab-pane fade" id="list-tramitar" role="tabpanel" aria-labelledby="list-tramitar">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <big> <b> 13. </b> </big> Finalizar e Tramitar</b></h5>

            <!-- Floating Labels Form -->
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title text-center"><b> <big> Verifique todo o preenchimento da sua TR antes de
                                enviar. </b> </big>
                    </h5>
                    </h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#finalizaretramitar" data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                        Finalizar e Tramitar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="finalizaretramitar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            </div>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/brasao_mt.png') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4>Você está tramitando para:</h4>
                            <h5 class="card-title">{{ $n_processo->Orgaos->Sigla }} - {{ $n_processo->Orgaos->Nome }}
                            </h5>
                            <small>
                                <a href="{{ asset('/trdigital/proponente/') }}" class="">
                                    Após enviar a sua TR Digital, você pode acompanhar o progresso em:
                                    <br><b> TR DIGITAL - Minhas TR </b>
                                </a>
                            </small>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                <label class="form-check-label" for="gridCheck2">
                                    DEclaro que o documento acima é de responsabilidade bla bla bla </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <br>
                        <form method="post" action="{{ url('trdigital/tramitado/' . $n_processo->id) }}">
                            @csrf
                            @method('PUT')
                            <!-- Ou 'PATCH', dependendo da configuração do seu sistema -->
                            <br>

                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="bi bi-x-circle-fill me-1"></i>
                                Cancelar
                            </button>

                            <button type="submit" class="btn btn-success text-light">
                                <i class="bi bi-check-circle me-1"></i>
                                FINALIZAR E TRAMITAR
                            </button>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
