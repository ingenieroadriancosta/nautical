<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo barco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">






        <!-- -->
        <div class="container table-dark">
          <form method="POST">
            <!-- -->
            <!-- -->
            <div class="form-row">


              <!-- -->
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Matricula</label>
                <input maxlength="18" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="matricula" type="text" class="form-control" placeholder="Matrícula" value="" required>
              </div>

              <!-- -->
              <div class="col-md-6 mb-3">
                <label for="validationDefault02">Nombre</label>
                <input maxlength="31" onkeydown="return /[a-z ]/i.test(event.key)" name="nombres" type="text" class="form-control" placeholder="Nombre" value="" required>
              </div>
              <!-- -->
            </div>

            <!-- -->
            <!-- -->
            <!-- -->
            <div class="form-row">
              <!-- -->
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">ID Amarre</label>
                <input maxlength="18" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="idamarre" type="text" class="form-control" placeholder="ID Amarre" required>
              </div>
              <!-- -->
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">Costo del amarre</label>
                <input maxlength="18" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="costoamarre" type="text" class="form-control" placeholder="Costo del amarre" required>
              </div>



              <!-- -->

              <!-- -->

            </div>


            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">Documento del Propietario</label>
                <input maxlength="18" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="id_socios" type="text" class="form-control" placeholder="Documento del propietario" required>
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