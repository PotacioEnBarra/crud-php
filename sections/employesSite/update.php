<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
  $txtID = ($_GET['txtID']) ? $_GET['txtID'] : "";
  $sentecia = $con->prepare("SELECT * FROM tbl_puestos WHERE id=:id");
  $sentecia->bindParam(":id", $txtID);
  $sentecia->execute();
  $registro = $sentecia->fetch(PDO::FETCH_LAZY);
  $nombredelpuesto = $registro["nombredelpuesto"];
}
if ($_POST) {
  $txtID = ($_POST['txtID']) ? $_POST['txtID'] : "";
  //recolectamos los datos del petodo POST
  $nombredelpuesto = (isset($_POST["nombredelpuesto"]) ? $_POST["nombredelpuesto"] : "");
  //Preparar colocar datos
  $sentecia = $con->prepare("UPDATE tbl_puestos SET nombredelpuesto=:nombredelpuesto WHERE id=:id ");

  // asignando los valores que vienen del metodo POST
  $sentecia->bindParam(":nombredelpuesto", $nombredelpuesto);
  $sentecia->bindParam(":id", $txtID); 
  $sentecia->execute();
  header("Location:index.php");
}

?>

<?php include("../../templates/header.php"); ?>
<br>
<div class="card">
  <div class="card-header">
    Puestos
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input type="text" value="<?php echo $txtID ?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
      </div>
      <div class="mb-3">
        <label for="nombredelpuesto" class="form-label">Nombre del puesto:</label>
        <input type="text" value="<?php echo $nombredelpuesto ?>" class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="Nombre del puesto">
      </div>
      <button type="submit" class="btn btn-success">Actualizar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>
<?php include("../../templates/footer.php"); ?>