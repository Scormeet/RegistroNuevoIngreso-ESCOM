
    <div class="well" align="left">
    <h3>Nuevo Horario</h3>
        <form  class="shake"  method="POST" action="/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/inserthorario.php">
        
            <div class="form-row">
              
              <div class="col">
                <input type="time" required name="inicio" class="form-control" placeholder="Hora de inicio">
              </div>
              <div class="col">
                <input type="time" required name="final" class="form-control" placeholder="Hora de termino">
              </div>
            </div>
            <br>
            </br>
            <button type="submit"   class="btn btn-success btn-lg pull-left"  align="right" onclick="myFunct()">Agregar</button>
        </form>
        <script>
function myFunct() {
  confirm("Seguro que deseas agregar horario");
}
</script>
    </div>

