
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Náutica</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Inicio <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/socios">Socios </a>
            <a class="nav-item nav-link" href="/barcos">Barcos </a>
            <a class="nav-item nav-link" href="/operaciones">Operaciones </a>
            <button class="btn btn-secondary" id="clsssn" onclick="closeses()">Cerrar sesión </button>
            </div>
        </div>
    </nav>
    
    
  
    <script>
        function closeses(){
            if( confirm( "¿Desea cerrar sesión?" ) ){
                location.href = "/?acc=true";
            }
        }
    </script>

    
  
  
    