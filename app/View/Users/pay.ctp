<div class="d-flex justify-content-center">
	<div class="row">
		<div class="col-12">
		    <div class="bkng-tb-cntnt">
			<div class="pymnts">
			    <form action="Users/processpay" method="POST" id="payment-form">
				<input type="hidden" name="token_id" id="token_id">
				<div class="pymnt-itm card active">
				    <h2>&iexcl;Bienvenido al registro de evaluaciones NOM-035!</h2>
				    <p><strong>Al realizar su pago, se le enviar&aacute; por correo su su usuario / contrase&ntilde;a </strong><br>El costo de la inscripci&oacute;n es de $5,000.00 MXN + I.V.A<br>
				    El pago le da derecho a realizar las evaluaciones necesarias para todos sus centros de trabajo. Y al terminar usted obtendr&aacute; el reporte completo</p>
				    <p>Paga continuar, por favor, llene todos los siguientes datos:<br></p>
				    <div class="pymnt-cntnt">
					<div class="sctn-row">
					    <div class="sctn-col l">
						<label>Nombre:</label><input type="text" placeholder="Primer nombre" autocomplete="off" name="name" value="">
					    </div>
					    <div class="sctn-col l">
						<label>Apellido:</label><input type="text" placeholder="Primer apellido" autocomplete="off" name="last_name" value="">
					    </div>
					    <div class="sctn-col l">
						<label>Telefono:</label><input type="text" placeholder="a 10 digitos" autocomplete="off" name="phone" value="">
					    </div>
					    <div class="sctn-col l">
						<label>Correo electronico:</label><input type="text" placeholder="Ser&aacute; su usuario" autocomplete="off" name="email" value="">
					    </div>
					 </div>

					    <div class="card-expl">
						<div class="credit"><h4>Tarjetas de cr&eacute;dito</h4></div>
						<div class="debit"><h4>Tarjetas de d&eacute;bito</h4></div>
					    </div>
					 <div class="sctn-row">
					    <div class="sctn-col l">
						<label>Nombre del titular</label><input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name" value="">
					    </div>
					    <div class="sctn-col l">
						<label>N&uacute;mero de tarjeta</label><input type="text" autocomplete="off" data-openpay-card="card_number" value="">
					    </div>
					    <div class="sctn-col l">
						<label>Fecha de expiraci&oacute;n</label>
						    <div class="sctn-col half l"><input type="text" placeholder="Mes" data-openpay-card="expiration_month" value=""></div>
						    <div class="sctn-col half l"><input type="text" placeholder="A&ntilde;o" data-openpay-card="expiration_year" value=""></div>
						</div>
					    <div class="sctn-col l">
						<div class="sctn-col cvv"><label>C&oacute;digo de seguridad</label>
						    <div class="sctn-col half l"><input type="text" placeholder="3 d&iacute;gitos" autocomplete="off" data-openpay-card="cvv2" value=""></div>
						</div>
					    </div>
					    <div class="openpay"><div class="logo"><small>Transacciones realizadas v&iacute;a:<br><br></small></div>
					    <div class="shield">Tus pagos se realizan de forma segura con encriptaci&oacute;n de 256 bits</div>
					</div>
					<div class="sctn-row">
						<div class="sctn-col 2">
							<a href="login" class="buttonback left" id="return">Volver</a>
						</div>
						<div class="sctn-col 2">
							<a class="button right" id="pay-button">Pagar</a>
						</div>
					</div>
				    </div>
				</div>
			    </form>
			</div>
		    </div>
		</div>
	</div>
</div>