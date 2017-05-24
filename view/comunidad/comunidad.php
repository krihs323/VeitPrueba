<h1 class="page-header">Comunidades</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Comunidad&a=Crud">Nueva comunidad</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Comunidad</th>
            <th>Descripción</th>
            <th>Población</th>
            <th>Etnia</th>
            <th>Niños</th>
			<th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
	
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->comunidad; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->poblacion; ?></td>
            <td><?php echo $r->etnia; ?></td>
			<td>
                <a href="?c=Nino&a=Index&id=<?php echo $r->id; ?>">+ Niños</a>
            </td>
            <td>
                <a href="?c=Comunidad&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Comunidad&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
