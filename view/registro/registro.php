<!DOCTYPE html>
 <html>
      <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      </head>

      <body>
		<h1>Registro de usuarios</h1>

      	<form action="">

      		<label>Nombres</label>
            <input type="text" name="nombre" class="form-control"  required/>
            <br /> 
			
			<label>Apellidos</label>
            <input type="text" name="apellido" class="form-control"  required/>
            <br />

            <label>Pais</label>
            <select name="pais" id="">
            	<option value="">--</option>
            	<option value="Colombia">Colombia</option>
            </select>
            <br />

            <label>Ciudad</label>
            <select name="ciudad" id="">
            	<option value="">--</option>
            	<option value="Cali">Cali</option>
            </select>
            <br />

            <label>Nit</label>
            <input type="text" name="nit" class="form-control"  required/>
            <br />

            <label>Razón Social</label>
            <input type="text" name="razonSocial" class="form-control"  required/>
            <br />

            <label>PBX</label>
            <input type="text" name="pbx" class="form-control"  required/>
            <br />

            <label>Telefono</label>
            <input type="text" name="telefono" class="form-control"  required/>
            <br />

            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control"  required/>
            <br />

			<label>Adjuntar Cédula</label>
            <input type="file" id="input" name="cedula">
            <br />

            <label>Adjuntar Certificado Camara y Comercio</label>
            <input type="file" id="input" name="camaraComercio">
            <br />
			
			<input type="submit" value="Registrar">
      		
      	</form>