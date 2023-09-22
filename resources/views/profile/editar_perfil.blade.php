<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    <!-- Profile Edit Form -->
    <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
     <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem perfil</label>
        <div class="col-md-8 col-lg-9">

          @if (Auth::user()->perfil && Auth::user()->perfil->image)
          <img src="{{asset('/images/perfil/'. Auth::user()->perfil->image)}}" alt="Profile">
          @else
          <img src="{{ asset('images/brasao_mt.png') }}" alt="Profile" class="rounded">
      @endif
                 
      
                        <div class="pt-2">
      <input type="file" class="form-control" id="image" name="image">
              
             
            {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="Tipo" class="form-label">Eu sou uma:</label>
        <select class="form-select" id="Tipo" name="Tipo">
            <option value=""> Selecione</option>
            <option value="OSC" {{ Auth::user()->perfil->Tipo === 'OSC' ? 'selected' : '' }}>OSC</option>
            <option value="Prefeitura" {{ Auth::user()->perfil->Tipo === 'Prefeitura' ? 'selected' : '' }}>Prefeitura</option>
        </select>
      </div>

      <div class="row mb-3">
        <label for="about" class="col-md-4 col-lg-3 col-form-label">Sobre mim</label>
        <div class="col-md-8 col-lg-9">
          <textarea class="form-control" id="Sobre_mim" name="Sobre_mim">{{ Auth::user()->perfil->Sobre_mim }}</textarea>
        </div>
      </div>

      <div class="row mb-3">
        <label for="company" class="col-md-4 col-lg-3 col-form-label">Órgão</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Orgao" name="Orgao" value="{{ Auth::user()->perfil->Orgao }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Cargo</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Cargo" name="Cargo" value="{{ Auth::user()->perfil->Cargo }}">
        </div>
      </div>



      <div class="row mb-3">
        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Endereço</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Endereco" name="Endereco" value="{{ Auth::user()->perfil->Endereco }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Cidade</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Cidade" name="Cidade" value="{{ Auth::user()->perfil->Cidade }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Estado</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Estado" name="Estado" value="{{ Auth::user()->perfil->Estado }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="Address" class="col-md-4 col-lg-3 col-form-label">CEP</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="CEP" name="CEP" value="{{ Auth::user()->perfil->CEP }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Telefone" name="Telefone" value="{{ Auth::user()->perfil->Telefone }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook </label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Facebook" name="Facebook" value="{{ Auth::user()->perfil->Facebook }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram </label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Instagram" name="Instagram" value="{{ Auth::user()->perfil->Instagram }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin </label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Linkedin" name="Linkedin" value="{{ Auth::user()->perfil->Linkedin }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Site </label>
        <div class="col-md-8 col-lg-9">
          <input type="text" class="form-control" id="Site" name="Site" value="{{ Auth::user()->perfil->Site }}">
        </div>
      </div>



      <div class="text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
    
    <!-- End Profile Edit Form -->

  </div>