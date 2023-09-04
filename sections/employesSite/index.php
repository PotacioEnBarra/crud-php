<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
  $txtID = ($_GET['txtID']) ? $_GET['txtID'] : "";
  $sentecia = $con->prepare("DELETE FROM tbl_puestos WHERE id=:id");
  $sentecia->bindParam(":id", $txtID);
  $sentecia->execute();
}

$sentencia = $con->prepare("SELECT * FROM `tbl_puestos`");
$sentencia->execute();
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include("../../templates/header.php"); ?>
<br>
<div class="card">
  <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="create.php" role="button">Agregar Registro</a>
  </div>
  <div class="card-body">
    <div class="table-responsive-sm">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre del puesto</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lista_tbl_puestos as $registro) { ?>
            <tr class="">
              <td scope="row"><?php echo $registro['id']; ?></td>
              <td><?php echo $registro['nombredelpuesto']; ?></td>
              <td>
                <a class="btn btn-info" href="update.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                |
                <a class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id']; ?>" role="button">Eliminar</a>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>



<?php include("../../templates/footer.php"); ?>