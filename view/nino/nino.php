<h1 class="page-header">Niños</h1>

<div class="well well-sm text-right">
  <a class="btn btn-primary" href="?c=Nino&a=Crud&comunidades_id=<?php echo $get_id_comunidad; ?>">Nuevo Niño</a>
</div>

<ol class="breadcrumb">
  <li><a href="?c=Comunidad&a=Index">Comunidades </a></li>
  <li><a href="?c=Nino&a=Index&id=<?php echo $get_id_comunidad; ?>"><?php echo $comunidad->comunidad; ?> </a></li>
  <li href="?c=Nino&a=Index&id=<?php echo $get_id_comunidad; ?>" class="active">Niños</li>
</ol>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombres</th>
            <th>Apellidos</th>
            <th>Número de Documento</th>
            <th>Fecha de Nacimiento</th>
			 <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($nin as $r): ?>
        <tr>
            <td><?php echo $r->nombres; ?></td>
            <td><?php echo $r->apellidos; ?></td>
			<td><?php echo $r->num_documento; ?></td>
            <td><?php echo $r->fecha_nacimiento; ?></td>
			<td>
                <a href="?c=Nino&a=Crud&id=<?php echo $r->id; ?>&comunidades_id=<?php echo $get_id_comunidad; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Nino&a=Eliminar&id=<?php echo $r->id; ?>&comunidades_id=<?php echo $get_id_comunidad; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
