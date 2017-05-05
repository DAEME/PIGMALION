<?php
$getfile = file_get_contents('employees.json');
$jsonfile = json_decode($getfile);
?>
<head>
  <title>CRUD</title>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="bootstrap/css/main.css" rel="stylesheet" media="screen">
</head>

<div class="container">
  <h2>Lista de empleados</h2>

  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busqueda por salario..">
<table align="center" class="table"  id="myTable">
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Puesto</th>
        <th>Salario</th>
		<th>Acción</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonfile->employees as $index => $obj): ?>
            <tr>
                <td><?php echo $obj->name; ?></td>
                <td><?php echo $obj->email; ?></td>
                <td><?php echo $obj->position; ?></td>
                <td><?php echo $obj->salary; ?></td>
                <td>
                    <a href="http://localhost:8080/EMPLOYEES/detail.php?id=<?php echo $index; ?>">Detalle</a>
                  
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
	<!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="bootstrap/js/jquery-2.1.4.js"></script>

    <!-- Todos los plugins JavaScript de Bootstrap -->
    <script src="bootstrap/js/bootstrap.js"></script>
	<script>
		function myFunction() {
		  // Declare variables 
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			} 
		  }
		}
</script>