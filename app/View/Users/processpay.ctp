
    <div class="row">
        <div class="col">
            
	    <?php 
		if ($result['error_message'] !== null ) {

			echo 'ERROR: ' . h($result['error_message']); 
		
		} else {
	     ?>	
		<?php echo 'Identificador = ' . h($result['id']); ?><br>
		<?php echo 'Monto = ' . h($result['amount']); ?><br>
		<?php echo 'Numero de autorizacion = ' . h($result['authorization']); ?><br>
		<?php echo 'Estatus = ' . h($result['status']); ?><br>
		<?php echo 'Descripcion = ' . h($result['description']); ?><br>

	    <?php 
		}
	    ?>
	   

        </div>
    </div>