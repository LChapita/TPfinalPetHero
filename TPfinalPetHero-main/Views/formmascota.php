<?php
require_once('nav.php');

?>
<main>

	<body>
		<form action="<?php echo FRONT_ROOT . "Pet/RegisterPet" ?>" method="POST">


		
		<!-- 
			< ?php var_dump($this->dueñoPet) ?>
			<input type="hidden" name="ownerId" value="< ?php echo $this->dueñoPet->getId() ?>">
			<input type="hidden" name="ownerName" value="< ?php echo $this->dueñoPet->getName() ?>">
			<input type="hidden" name="ownerSurName" value="< ?php echo $this->dueñoPet->getSurName() ?>">
			<input type="hidden" name="ownerDni" value="< ?php echo $this->dueñoPet->getDni() ?>">
			<input type="hidden" name="ownerO" value="< ?php echo $this->dueñoPet->getOwner() ?>">


			< ?php var_dump($this->dueñoPet->getDni()) ?>

			 -->
			<label for="foto" name="foto">Load Photo</label>
			<input type="text" name="foto" placeholder="Photo" /><br />

			<label for="name" name="name">Name Pet</label>
			<input type="text" name="name" placeholder="Name"><br />

			<label for="vaccinationschendle" name="vaccinationschendle">Vaccination Schendle</label>
			<input type="text" name="vaccinationschendle" placeholder="Vaccination Schendle" /><br />

			<label for="race" name="race">Race</label>
			<input type="text" name="race" placeholder="Race" /><br />

			<label for="video" name="video">Video</label>
			<input type="text" name="video" placeholder="Video" /><br />

			<button type="submit">Add Pet</button>
		</form>
	</body>
</main>