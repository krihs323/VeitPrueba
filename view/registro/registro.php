<!DOCTYPE html>
 <html>
      <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
            <script src="controller.js"></script>
            <link rel="stylesheet" href="style.css" />
            
      </head>

      <body>
		<h1>Registro de usuarios</h1>

      	<div ng-app="myapp" ng-controller="userController" ng-init="displayData()">

                  <form name="userForm">

                        <input type="hidden" ng-model="id" />

            		<label for="nombres">Nombres</label>
                        <input type="text" name="nombres" ng-model="nombres" ng-required="true" class="form-control" />
                        <span ng-show="!userForm.$pristine && userForm.nombres.$error.required"> </span>
                        <br /><br />
      			
      			<label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" ng-model="apellidos" class="form-control" ng-required="true"/>
                        <span ng-show="!userForm.$pristine && userForm.apellidos.$error.required">El apellido es Obligatorio</span>
                        <br /><br />

                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="example@email.com" name="email" ng-model="email" ng-required="true" ng-class="{ error: userForm.email.$error.required && !userForm.$pristine, warning: userForm.email.$error.email }">
                        <span ng-show="!userForm.$pristine && userForm.email.$error.required"></span>
                        <br /><br />

                        <label for="pais">Pais</label>
                        <select ng-model="pais" ng-options="idx as pais for (idx, pais) in paises" class="form-control" ng-required="true">
                           </select>
                        <span ng-show="!userForm.$pristine && userForm.pais.$error.required"></span>
                        <br /><br />

                        <label for="ciudad">Ciudad</label>
                        <select ng-model="ciudad" ng-options="idx as ciudad for (idx, ciudad) in ciudades" class="form-control" ng-required="true">
                        </select>
                        <span ng-show="!userForm.$pristine && userForm.pais.$error.required"></span>
                        <br /><br />

                        <label for="nit">Nit</label>
                        <input type="text" name="nit" ng-model="nit" class="form-control" ng-required="true"/>
                        <span ng-show="!userForm.$pristine && userForm.nit.$error.required"></span>
                        <br /><br />

                        <label for="razonSocial">Razón Social</label>
                        <input type="text" name="razonSocial" ng-model="razonSocial" class="form-control" ng-required="true"/>
                        <span ng-show="!userForm.$pristine && userForm.razonSocial.$error.required"></span>
                        <br /><br />

                        <label for="pbx">PBX</label>
                        <input type="text" name="pbx" ng-model="pbx" class="form-control" ng-required="true"/>
                        <span ng-show="!userForm.$pristine && userForm.pbx.$error.required"></span>
                        <br /><br />

                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" ng-model="telefono" class="form-control" ng-required="true"/>
                        <span ng-show="!userForm.$pristine && userForm.telefono.$error.required"></span>
                        <br /><br />

                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" ng-model="direccion" class="form-control" ng-required="true"/>
                        <span ng-show="!userForm.$pristine && userForm.direccion.$error.required"></span>
                        <br /><br />

            		<label for="cedula">Adjuntar Cédula</label>
                        <input type="file" id="input" ng-model="cedula" name="cedula" ng-required="true">
                        <br /><br />

                        <label for="camaraComercio">Adjuntar Certificado Camara y Comercio</label>
                        <input type="file" id="input" ng-model="camaraComercio" name="camaraComercio" ng-required="true">
                        <br /><br />
            		
                        <input type="submit" ng-click="insertData()" value="Registrar" name="btnInsert">
      	
                  </form>
      	</div>

                  
      </body>
</html>