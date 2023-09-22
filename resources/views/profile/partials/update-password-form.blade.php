
<div class="tab-pane fade pt-3" id="profile-change-password">

<section>


    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')



          <div class="row mb-3">
            <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Senha atual</label>
            <div class="col-md-8 col-lg-9">
            {{-- <input id="current_password" name="current_password" type="password" autocomplete="current-password" class="form-control"> --}}
             <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="form-control" />

        </div>
    </div>


    <div class="row mb-3">
        <label for="password" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
        <div class="col-md-8 col-lg-9">
          {{-- <input name="newpassword" type="password" class="form-control" id="password" autocomplete="new-password"> --}}
          <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />

          <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-4" />

        </div>
      </div>

      <div class="row mb-3">
        <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirme a nova senha</label>
        <div class="col-md-8 col-lg-9">
          {{-- <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"> --}}
          <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />

          <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-4" />
        </div>
      </div>

         
        <div class="text-center">
            <button type="submit" class="btn btn-primary ">Alterar Senha</button>
        </div>

           

        </div>
        </div>
    </form>
</section>
</div>