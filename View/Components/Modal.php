  <!-- Edit Modal HTML -->
  <div id="addNewPedido" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
      
          <div class="modal-header">            
            <h4 class="modal-title">Nueva Pregunta</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">


            <div class="form-group">
              <label>Edicion</label>
              <select name="  " id="Select-Encuesta-Edicion" class="form-control" required>
                   
              </select>
            </div>

            <div class="form-group">
              <label>Seleccione Grupo</label>
              <select name="  " id="Select-Encuesta-Grupo" class="form-control" onchange="Load_Ultima_Pregunta()" required>
                   
              </select>
            </div>






            <div class="form-group">
              <label>Pregunta N°</label> <span class="label label-success" id="MOSTRAR-ULTIMA-PREGUNTA"> 1</span>
               <textarea  class="md-textarea form-control" rows="10" id="Encuesta-Descripcion"  required autofocus> </textarea> 
            
            </div>







        
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="button" class="btn btn-success" value="Crear" onclick="Crear_PREGUNTA();">
          </div>
        
      </div>
    </div>
  </div>



    <!-- Delete Modal HTML -->
  <div id="Confirmar_Atencion" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">            
            <h4 class="modal-title">Confirmar Atencion</h4>
            
          </div>
          <div class="modal-body">          
            

            <div class="form-group">
              <label>Ingrese el N# REFERENCIA</label>
              <input type="text" class="form-control" id="NREFERENCIA-Inicio"  onkeypress="return convertir_numero(event);" required autofocus>
            </div>

            
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="button" class="btn btn-info" value="Confirmar  Pedido" onclick="Confirmar_Pedido();">
            
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Delete Modal HTML -->
  <div id="SesionExpirada" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">            
            <h4 class="modal-title">Sesión Expirada</h4>
            
          </div>
          <div class="modal-body">          
            <p>Su Sesión ha Expirado</p>
            
          </div>
          <div class="modal-footer">
            <a href="." class="form-control">OK</a>
           
          </div>
        </form>
      </div>
    </div>
  </div>









    <!-- Delete Modal HTML -->
  <div id="Cancelar_Pedido" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">            
            <h4 class="modal-title">Estás Seguro De Cancelar el Pedido?</h4>
            
          </div>
          <div class="modal-body">          
            <input type="text" style="display: none;" id="Flag_force">

            <div class="form-group">
              <label>Escribe el Motivo de La Anulación</label>
              <textarea name="Cancelar_Motivo" id="Cancelar_Motivo" cols="50" rows="10"></textarea>
            </div>

            
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="button" class="btn btn-info" value="Cancelar Pedido" onclick="Eliminar_Pedido();">
            
          </div>
        </form>
      </div>
    </div>
  </div>

  