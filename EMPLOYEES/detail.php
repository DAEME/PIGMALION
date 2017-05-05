<head>
  <title>EMPLEADOS</title>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="bootstrap/css/main.css" rel="stylesheet" media="screen">
</head>
<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('employees.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["employees"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('employees.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["playlist"];
    $jsonfile = $jsonfile[$id];

    $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
    $post["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
    $post["phone"] = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $post["address"] = isset($_POST["address"]) ? $_POST["address"] : "";
	$post["position"] = isset($_POST["position"]) ? $_POST["position"] : "";
	$post["salary"] = isset($_POST["salary"]) ? $_POST["salary"] : "";

    if ($jsonfile) {
        unset($all["employees"][$id]);
        $all["employees"][$id] = $post;
        $all["employees"] = array_values($all["employees"]);
        file_put_contents("test.json", json_encode($all));
    }
    header("Location: http://localhost:8080/CRUD/index.php");
}
?>
<?php if (isset($_GET["id"])): ?>
    <form action="http://localhost:8080/EMPLOYEES/detail.php" method="POST">
	<h2>Detalle</h2>
	<table class="table" >
	<tr>
		<td>Nombre:</td>
		<td><?php echo $jsonfile["name"] ?></td>
	</tr>
	<tr>
		<td>Correo:</td>
		<td><?php echo $jsonfile["email"] ?></td>
	</tr>
	<tr>
		<td>Teléfono:</td>
		<td><?php echo $jsonfile["phone"] ?></td>
	</tr>
	<tr>
		<td>Dirección:</td>
		<td><?php echo $jsonfile["address"] ?></td>
	</tr>
	<tr>
		<td>Puesto:</td>
		<td><?php echo $jsonfile["position"] ?></td>
	</tr>
	<tr>
		<td>Salario:</td>
		<td><?php echo $jsonfile["salary"] ?></td>
	</tr>
		<tr>
		<td>Habilidades:</td>
		<td>
		<?php 
		$listskills=array();
		$listskills=$jsonfile["skills"];
		for ($i = 0; $i < count($listskills); $i++)
		{
			$resultado =  $listskills[$i];				
			$result=implode($resultado);			
			echo $result.'</br>';	
		}
		?></td>
	</tr>
	</table>
    </form>
	<h2><a href="http://localhost:8080/EMPLOYEES/index.php">Regresar</a></h2>
<?php endif; ?>