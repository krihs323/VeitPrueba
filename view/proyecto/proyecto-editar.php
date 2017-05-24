<h1 class="page-header">
    <?php echo $pro->id != null ? $pro->titulo : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Proyecto">Proyecto</a></li>
  <li class="active"><?php echo $pro->id != null ? $pro->titulo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-proyecto" action="?c=Proyecto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $pro->id; ?>" />
    <div class="form-group">
        <label>Título</label>
        <input type="text" name="titulo" value="<?php echo $pro->titulo; ?>" class="form-control" data-validacion-tipo="requerido|max:100" />
    </div>
    
    <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripcion" value="<?php echo $pro->descripcion; ?>" class="form-control"  data-validacion-tipo="requerido|max:255" />
    </div>
    
    <div class="form-group">
        <label>Alcance</label>
        <input type="text" name="alcance" value="" class="form-control" placeholder="Cantidad de Población" />
    </div>
	
	<div class="form-group">
        <label>Usuario Responsable</label>
        <select name="usuarios_id" class="form-control" data-validacion-tipo="requerido|numero">
		<option value="">Seleccione...</option>
		<?php foreach($this->modelUsuario->ListarComboProyecto() as $r): ?>
            <option <?php echo $pro->usuarios_id == $r->id ? 'selected' : ''; ?> value="<?php echo $r->id; ?>"><?php echo $r->nombre_apellido; ?></option>
		<?php endforeach; ?>
        </select>
    </div>
	
	<div class="form-group">
        <label>Tema</label>
        <select name="temas_id" class="form-control" data-validacion-tipo="requerido|numero">
		<option value="">Seleccione...</option>
		<?php foreach($this->modelTema->Listar() as $r): ?>
            <option <?php echo $pro->temas_id == $r->id ? 'selected' : ''; ?> value="<?php echo $r->id; ?>"><?php echo $r->tema; ?></option>
		<?php endforeach; ?>
        </select>
    </div>
    
   
	
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-proyecto").submit(function(){
            return $(this).validate();
        });
    })
</script>