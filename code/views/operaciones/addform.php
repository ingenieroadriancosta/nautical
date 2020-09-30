<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar operación</h5>
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
                <label for="example-date-input" >Fecha de salida</label>
                <div class="col-10">
                  <input name="fecha_salida" class="form-control" type="date" value="" 
                      id="datePicker" 
                      >
                </div>
              </div>
              <!-- -->
            </div>

            <!-- -->
            <!-- -->
            <!-- -->
            <div class="form-row">
              <!-- -->
              <div class="col-md-6 mb-3">
                <label for="example-date-input" >Hora de salida</label>
                <div class="col-10">
                  <input name="tiempo_salida" value="00:00:00" type="time" name="appt-time" value="13:30">
                </div>
              </div>
              <!-- -->
              <!-- -->
              <!-- -->
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">Destino</label>
                <input maxlength="31"  onkeydown="return /[a-z ]/i.test(event.key)" 
                     name="destino" type="text" class="form-control" placeholder="Destino" required>
              </div>
              <!-- -->
              <!-- -->
              <!-- -->
              <!-- -->
            </div>


            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault03">Documento del comandante</label>
                <input maxlength="18" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="idsocios" type="text" class="form-control" placeholder="Documento del propietario" required>
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


<script>
  document.getElementById('datePicker').valueAsDate = new Date();
</script>
