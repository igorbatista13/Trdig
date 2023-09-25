<style>
    .alert-dismissible.fade.show {
        max-width: 600px;
        margin: 60px auto 0 auto;
        position: fixed;
        top: 20px;
        right: 10px;
        z-index: 9999;
    }
    
    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            display: none;
        }
    }
    
    .fadeOut {
        animation: fadeOut 0.5s ease 1 forwards;
    }
    
    </style>
    
    {{-- INICIO ---- MENSAGENS ALERTAS --}}


    {{-- CREATE --}}
    @if (session('create'))
      <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" id="myAlert" role="alert">
      <i class="bi bi-check-circle me-1 text-light"></i>
      {{session('create')}} 
        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    {{-- EDIT --}}
    @if (session('edit'))
      <div class="alert alert-warning bg-warning border-0  alert-dismissible fade show" id="myAlert3" role="alert">
      <i class="bi bi-exclamation-triangle me-1"></i>
      {{session('edit')}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- DELETE --}}
    @if (session('delete'))
      <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" id="myAlert2" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
      {{session('delete')}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


        {{-- DELETE --}}
        @if (session('error'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" id="myAlert2" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{session('error')}} 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    
    {{-- FIM ---- MENSAGENS ALERTAS --}}


    <script>
        setTimeout(function() {
            var alert = document.getElementById('myAlert');
            alert.style.display = 'none';
        }, 7000); // 5000ms (5 segundos)
      </script>
      <script>
        setTimeout(function() {
            var alert = document.getElementById('myAlert2');
            alert.style.display = 'none';
        }, 7000); // 5000ms (5 segundos)
      </script>
      <script>
        setTimeout(function() {
            var alert = document.getElementById('myAlert3');
            alert.style.display = 'none';
        }, 7000); // 5000ms (5 segundos)
      </script>