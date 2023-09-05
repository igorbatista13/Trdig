
@if (Auth::check() && Auth::user()->hasRole('Validador'))
{!! Form::open([
        'url' => route('trdigital.validar.oficio', ['id' => $n_processo->Doc_anexo1->id]),
        'method' => 'post',
    ]) !!}

<div class="col-lg-6">


            {!! Form::radio('Comp_Assinado_sit', '1', $n_processo->Doc_anexo1->Comp_Assinado_sit == 1, [
                    'class' => 'form-check-input',
                    'id' => 'gridRadios1',
                ]) !!}

                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Validado</span>
                </label>

                {!! Form::radio('Comp_Assinado_sit', '0', $n_processo->Doc_anexo1->Comp_Assinado_sit == 0, [
                    'class' => 'form-check-input',
                    'id' => 'gridRadios2',
                ]) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>
</div>
      <br>
<div class="col-lg-6">

<button type="submit" class="btn btn-success btn-sm">
                    <i class="bi bi-ui-checks me-1"> Validar</i></button>  
</div>

            @endif