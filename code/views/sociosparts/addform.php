<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo socio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">






        <!-- -->
        <div class="container table-dark">
          <form  method="POST">

            <!-- -->
            <div class="form-row">

              <!-- -->
              <div class="col-md-3 mb-3">
                <label for="validationDefault01">Nombres</label>
                <input name="nombres" type="text" class="form-control"  placeholder="Nombres"
                  value="" required>
              </div>

              <!-- -->
              <div class="col-md-3 mb-3">
                <label for="validationDefault02">Apellidos</label>
                <input name="apellidos" type="text" class="form-control" 
                  placeholder="Apellidos" value="" required>
              </div>

              <!-- -->
              <div class="col-md-5 mb-3">
                <label for="validationDefaultUsername">Tipo de documento</label>
                <select name="tipo_documento" class="form-control" >
                  <option>Cédula</option>
                  <option>Pasaporte</option>
                </select>
              </div>

              <!-- -->
            </div>

            <!-- -->
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationDefault03">Documento</label>
                <input name="documento" type="text" class="form-control"  placeholder="Documento" required>
              </div>
              
              <!-- -->
              <div class="col-md-4 mb-3">
                <label for="validationDefault03">Telefono</label>
                <input name="telefono" type="text" class="form-control"  placeholder="Telefono" required>
              </div>
              <!-- -->
              
              <!-- -->
              <div class="col-md-4 mb-3">
                <label for="validationDefault03">Celular</label>
                <input name="celular" type="text" class="form-control"  placeholder="Telefono" required>
              </div>
            </div>

            

            <!-- -->
            <button class="btn btn-primary" type="submit">Agregar</button>
            <br>
            <br>
            <br>
          </form>
        </div>




      </div>
      
    </div>
  </div>
</div>