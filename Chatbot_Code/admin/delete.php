<?php
	// se relizan los delte de cada pregunta y respuesta de la interfaz
	require 'database.php';
	$id = 0;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// realizar un seguimiento de los valores de las publicaciones
		$id = $_POST['id'];
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM preguntas WHERE idPre = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>
	<!-- se identifa el contenedor del chatbot y se realiza un delete de la pregunta -->
	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
			    	<h3>Eliminar una pregunta</h3>
			    </div>

			    <form class="form-horizontal" action="delete.php" method="post">
		    		<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<p class="alert alert-error">¿Estas seguro que quieres eliminar esta pregunta?</p>
					<div class="form-actions">
						<button type="submit" class="btn btn-danger">Si</button>
						<a class="btn" href="index.php">No</a>
					</div>
				</form>
			</div>
	    </div> <!-- /container -->
	</body>
</html>