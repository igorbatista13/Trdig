<div class="tab-pane fade" id="list-tramitar" role="tabpanel" aria-labelledby="list-projeto-tramitar">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <b> <big> 13. </b> </big>
                Finalizar </h5>
            {{-- {!! Form::open([
                'url' => route('trdigital.validar.instituicao', ['id' => $n_processo->Projeto_conteudo->id]),
                'method' => 'post',
            ]) !!} --}}

            <div class="col-lg-6">
                  <h4>Status atual:
                  @if ($n_processo->Status == 'CORRIGIR')
                 <b class="text-warning">{{ $n_processo->Status }} </b> </p>
                  @endif
                  
                  @if ($n_processo->Status == 'FINALIZADO')
                 <b class="text-success">{{ $n_processo->Status }} </b> </p>
                  @endif
                  @if ($n_processo->Status == 'AGUARDANDO')
                 <b class="text-primary">{{ $n_processo->Status }} </b> </p>
                  @endif
                  @if ($n_processo->Status == '')
                 <b class="text-primary"> EM CONSTRUÇÃO </b> </p>
                  @endif
                </h4>
              </div>
<hr>
            <a href="{{ asset('trdigital/finalizado/') }}/{{ $n_processo->id }}" class="btn btn-success"  class="btn btn-success"> FINALIZAR </a>
            <a href="{{ asset('trdigital/corrigir/') }}/{{ $n_processo->id }}" class="btn btn-warning"  class="btn btn-success"> CORRIGIR </a>
            </select>
        </div>
    </div>
</div>
