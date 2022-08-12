<?php

	$url = "https://www.canalti.com.br/api/pokemons.json";

	$pokemons = json_decode(file_get_contents($url));

	/*echo "<pre>";
	print_r(json_decode($pokemons));
	exit;*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pokedex</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<h1>Lista de Pokemons</h1>
		<?php if(count($pokemons->pokemon)) {
			$i = 0;

			foreach($pokemons->pokemon as $Pokemon){
				$i++;
		?>

		<div id="bloco">
			<p>
				<img src="<?php echo $Pokemon->img; ?>">
			</p>
		</div>

		<?php }  } else { ?>
			<strong>Nenhum Pokemon retornado pelo API.</strong>
		<?php } ?>

		<img src="<?php echo $Pokemon->img ?>">
		<h4><?php $Pokemon->name ?></h4>

		<?php
			if(count($Pokemon->next_evolution)){
				echo "Próximas evoluções: ";

			foreach($Pokemon->next_evolution as $ProximaEvolucao) {
				$ProximaEvolucao->name . " ";
			}
			} echo "Não possui próximas evoluções.";
		?>
	</div>
</body>
</html>