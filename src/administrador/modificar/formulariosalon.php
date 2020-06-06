
    <div class="well" align="left">
    <h3>Nuevo Salon</h3>
        <form  class="shake"  method="POST" >
        
            <div class="form-row">
              <div class="col">
                <input name= "Salon" type="text" class="form-control" placeholder="Salon Nuevo">
              </div>
              
            </div>
            <br>
            </br>
            <button type="submit"   class="btn btn-success btn-lg pull-left"  align="right" onclick="nene()">Agregar </button>
        </form>
        <script>

  function nene(){
    var opcion = confirm("¿Desea agregar Salon?");
    if (opcion == true) {
        
        mensaje="Se ha eliminado";
        //var Salon=null;
       // Salon=document.getElementsByName("Salon")[0].value;
        //insertarSalon(Salon);
        alert('se ha agregado'+Salon);
        //action="/RegistroNuevoIngreso-ESCOM/src/administrador/modificar/insertgrupo.php";
        
	} else {
      
      alert('cancelado');
	}  
	
}
    </script>



    </div>

