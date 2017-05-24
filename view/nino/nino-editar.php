<h1 class="page-header">
    <?php echo $nin->id != null ? $nin->nombres : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Nino&a=Index">Niños </a></li>
  <li><a href="?c=Nino&a=Index&id=<?php echo $get_id_comunidad; ?>"><?php echo $comunidad->comunidad; ?> </a></li>
  <li class="active"><?php echo $nin->id != null ? $nin->nombres : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-nino" action="?c=Nino&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $nin->id; ?>" />
	<input type="hidden" name="comunidades_id" value="<?php echo $get_id_comunidad; ?>" />
    
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="<?php echo $nin->nombres; ?>" class="form-control" data-validacion-tipo="requerido|max:100" />
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $nin->apellidos; ?>" class="form-control"  data-validacion-tipo="requerido|max:100" />
    </div>
 
	
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-nino").submit(function(){
            return $(this).validate();
        });
    })
</script>