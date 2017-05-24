<h1 class="page-header">
    <?php echo $com->id != null ? $com->comunidad : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Comunidad">Comunidades</a></li>
  <li class="active"><?php echo $com->id != null ? $com->comunidad : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-comunidad" action="?c=Comunidad&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $com->id; ?>" />
    
    <div class="form-group">
        <label>Comunidad</label>
        <input type="text" name="comunidad" value="<?php echo $com->comunidad; ?>" class="form-control" data-validacion-tipo="requerido|max:100" />
    </div>
    
    <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripcion" value="<?php echo $com->descripcion; ?>" class="form-control"  data-validacion-tipo="requerido|max:255" />
    </div>
    
    <div class="form-group">
        <label>Población</label>
        <input type="text" name="poblacion" value="<?php echo $com->poblacion; ?>" class="form-control" placeholder="Cantidad de Población" data-validacion-tipo="requerido|numero|max:11"  />
    </div>
    
    <div class="form-group">
        <label>Etnia</label>
        <select name="etnias_id" class="form-control">
		<?php foreach($this->modelEtnia->Listar() as $r): ?>
            <option <?php echo $com->etnias_id == $r->id ? 'selected' : ''; ?> value="<?php echo $r->id; ?>"><?php echo $r->etnia; ?></option>
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
        $("#frm-comunidad").submit(function(){
            return $(this).validate();
        });
    })
</script>