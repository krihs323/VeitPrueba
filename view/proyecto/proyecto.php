<h1 class="page-header">Proyectos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Proyecto&a=Crud">Nuevo Proyecto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Proyecto</th>
            <th>Tema</th>
            <th>Responsable</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Especialistas</th>
			<th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
	
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->titulo; ?></td>
            <td><?php echo $r->tema; ?></td>
            <td><?php echo $r->responsable; ?></td>
            <td><?php echo $r->titulo; ?></td>
            <td><?php echo $r->descripcion; ?></td>
			<td>
			
                <a href="?c=Usuario&a=IndexEspecialistas&id=<?php echo $r->id; ?>" class="glyphicon glyphicon-user" data-toggle="tooltip" title="Agregar Especialistas">  </a>
            </td>
            <td>
                <a href="?c=Proyecto&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Proyecto&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
