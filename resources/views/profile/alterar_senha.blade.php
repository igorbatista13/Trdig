<div class="tab-pane fade pt-3" id="profile-change-password">
    <!-- Change Password Form -->

<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
@csrf
@method('put')

      <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
      <!-- Resto do seu formulário aqui -->
      <div class="row mb-3">
        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha atual</label>
        <div class="col-md-8 col-lg-9">
          <input name="password" type="password" class="form-control" id="currentPassword">
        </div>
      </div>

      <div class="row mb-3">
        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
        <div class="col-md-8 col-lg-9">
          <input name="newpassword" type="password" class="form-control" id="newPassword">
        </div>
      </div>

      <div class="row mb-3">
        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Redigite a sua nova senha</label>
        <div class="col-md-8 col-lg-9">
          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Alterar Senha</button>
      </div>
    </form><!-- End Change Password Form -->

  </div>