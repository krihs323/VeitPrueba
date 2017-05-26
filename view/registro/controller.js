var app = angular.module("myapp",[]);
 app.controller("userController", function($scope, $http){

     $scope.insertData = function(){
     	
           if($scope.nombres == null)
           {
               alert("El nombre es requerido, por favor llene el campo");
               $scope.nombres.$setDirty();
               return;
           }

           if($scope.nombres.length >= 50)
           {
               alert("El nombre no puede superar los 50 caracteres.");
               $scope.nombres.$setDirty();
               return;
           }


           if($scope.apellidos == null)
           {
               alert("El apellido es requerido, por favor llene el campo");
               $scope.apellidos.$setDirty();
               return;
           }

           if($scope.nombres.length >= 50)
           {
               alert("Los apellidos no pueden superar los 50 caracteres.");
               $scope.apellidos.$setDirty();
               $scope.apellidos.$setRequired();
               return;
           }

           

         /*if($scope.areainteresIdea == null)
           {
               alert("debe elegir un area de interes");
               return;
           }

         if($scope.descripcionIdea.trim() == null || $scope.descripcionIdea.trim() == '')
           {
               alert("La descripcion es requerida");
               return;
           }*/

         $http.post(
                     "crud_usuario.php",
                     {
                        'tituloIdea':$scope.tituloIdea,
                        'areainteresIdea':$scope.areainteresIdea,
                        'descripcionIdea':$scope.descripcionIdea.trim(),
                        'privadoIdea':$scope.privadoIdea,
                        'btnName':$scope.btnName
                     }
                ).success(function(data){
                     /*alert(data);

                     $scope.tituloIdea = null;
                     $scope.areainteresIdea = null;
                     $scope.descripcionIdea = null;
                     $scope.privadoIdea = null;
                     $scope.btnName = null;

                     $scope.btnName = "ADD";*/
                });
      }

      $scope.displayData = function(){
           /*$http.get("../model/crud_idea.php")
           .success(function(data){
                $scope.areas = data;
           });*/

          $scope.paises = ['Colombia','Panamá','Venezuela', 'Ecuador'];
          
          $scope.ciudades = ['Cali','Bogotá','Barranquilla', 'Medellin'];
      }


      /*$scope.updateData = function(id, nombreRol){  s
           $scope.id = id;
           $scope.nombreRol = nombreRol;

           $scope.btnName = "Update";
      } */
       /*$scope.deleteData = function(id){
           //$scope.btnName = "deleteData";
           $http.post("../model/crud_rol.php", {'id':id , 'btnName':"deleteData"}).success(function(data){
             alert(data);
               //$scope.btnName = "ADD";
               $scope.displayData();
           });
      } */
 });