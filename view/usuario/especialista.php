<h1 class="page-header">Especialistas</h1>

<div class="well well-sm text-right">
  <a class="btn btn-primary" href="?c=Usuario&a=Crud&especialistas_id=<?php echo $get_id_especialista; ?>">Nuevo Especialista</a>
</div>

<ol class="breadcrumb">
  <li><a href="?c=Proyecto&a=Index">Proyecto </a></li>
  <li><a href="?c=Usuario&a=Index&id=<?php echo $get_id_especialista; ?>"><?php echo $proyecto->titulo; ?> </a></li>
  <li href="?c=Usuario&a=Index&id=<?php echo $get_id_especialista; ?>" class="active">Especialistas</li>
</ol>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Título</th>
            <th>Descripción</th>
            <th>Alcance</th>
            <th>Especialista</th>
			 <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($esp as $r): ?>
        <tr>
            <td><?php echo $r->titulo; ?></td>
            <td><?php echo $r->descripcion; ?></td>
			<td><?php echo $r->alcance; ?></td>
            <td><?php echo $r->nombres_apellidos; ?></td>
			<td>
                <a href="?c=Usuario&a=Crud&id=<?php echo $r->id; ?>&especialistas_id=<?php echo $get_id_especialista; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&id=<?php echo $r->id; ?>&especialistas_id=<?php echo $get_id_especialista; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
