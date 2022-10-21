<html>
	<head><title>mainmascota.php</title></head>
	<body>
		<form action="<?php echo FRONT_ROOT."" ?>" method="POST">
			<?php echo var_dump($user) ?>
			<label for="foto" name="foto">cargar foto</label>
			<input type="text" name="foto" value="foto"/><br/>
			
			<label for="name" name="name">name</label>
			<input type="text" name="name" value="name"><br/>
			
			<label for="vaccinationschendle" name="vaccinationschendle">vaccinationschendle</label>
			<input type="text" name="vaccinationschendle" value="vaccinationschendle"/><br/>
			
			<label for="raza" name="raza">raza</label>
			<input type="text" name="raza" value="raza"/><br/>
			
			<label for="video" name="video"></label>
			<input type="text" name="video" value="video"/><br/>

			<button type="submit">agregar mascota</button>
		</form>
	</body>
</html>
