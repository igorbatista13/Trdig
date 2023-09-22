<div class="tab-pane fade show active profile-overview" id="profile-overview">
  
    <h5 class="card-title"></h5>

    <div class="row">
      <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
      <div class="col-lg-9 col-md-8">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Órgão</div>
      <div class="col-lg-9 col-md-8">{{ Auth::user()->perfil->Orgao }}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">País</div>
      <div class="col-lg-9 col-md-8">Brasil</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Endereço</div>
      <div class="col-lg-9 col-md-8">{{ Auth::user()->perfil->Endereco }}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Estado</div>
      <div class="col-lg-9 col-md-8">{{ Auth::user()->perfil->Estado }}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Cidade</div>
      <div class="col-lg-9 col-md-8">{{ Auth::user()->perfil->Cidade }}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">Telefone</div>
      <div class="col-lg-9 col-md-8">{{ Auth::user()->perfil->Telefone }}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">E-mail</div>
      <div class="col-lg-9 col-md-8">{{{ isset(Auth::user()->email) ? Auth::user()->email : Auth::user()->email }}}</div>
    </div>

  </div>