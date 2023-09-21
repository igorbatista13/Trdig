{!! Form::model($n_processo, [
    'method' => 'PATCH',
    'route' => ['trdigital.update', $n_processo->id],
    'enctype' => 'multipart/form-data',
]) !!}
{{-- ITEM 1 --}}
<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <big><b> A. </b> </big> Ofício de encaminhamento com o
                    <b>número da nova proposta </b>
                </h5>

                <div class="row mb-3">



                    <div class="col-sm-10">
                        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio)
                            <div class="icon">
                                <div class="col-md-12 iframe-container">
                                    <iframe
                                        src="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Oficio) }}"></iframe>
                                </div>
                                <a class="btn btn-primary"
                                    href="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Oficio) }}"
                                    target="_blank">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                </a>
                            </div>
                        @else
                            <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                        @endif

                        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio_sit == 1)
                        @else
                            <br> {!! Form::file('Comp_Oficio', ['class' => 'form-control']) !!}
                        @endif
                        <br>
                        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio_sit == '')
                            <!-- Conteúdo se Comp_Oficio_sit estiver vazio -->
                        @elseif ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif


                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            </div>
            <br>
        </div>

    </div>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <big> <b> B. </b> </big> Ofício com a destinação da emenda
                    emitido e <b> assinado pelo Parlamentar</b></h5>

                <div class="row mb-3">

                    <div class="col-sm-10">
                        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado)
                            <div class="icon">
                                <div class="col-md-12 iframe-container">
                                    <iframe
                                        src="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Assinado) }}"></iframe>
                                </div>
                                <a class="btn btn-primary"
                                    href="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Assinado) }}"
                                    target="_blank">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                </a>
                            </div>
                        @else
                            <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                        @endif

                        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado_sit == 1)
@else
<br> {!! Form::file('Comp_Assinado', ['class' => 'form-control']) !!}
@endif
<br>
                        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado_sit == '')
                            <!-- Conteúdo se Comp_Assinado_sit estiver vazio -->
                        @elseif ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif

                    </div>
                </div>


                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>


            </div>
        </div>
    </div>
</div>
