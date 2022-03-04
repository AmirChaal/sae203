<?php
	$title="Recherche";
	$current = 'recherche';
require 'debut_html.php';
require 'header.php';
?>

<div class="slider">
        <div class="progress"></div>
      </div>
      <div class="range-input">
        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
      </div>
    </div>
    <script>
		const rangeInput = document.querySelectorAll(".range-input input"),
		priceInput = document.querySelectorAll(".price-input input"),
		range = document.querySelector(".slider .progress");
		let priceGap = 1000;
		priceInput.forEach(input =>{
			input.addEventListener("input", e =>{
				let minPrice = parseInt(priceInput[0].value),
				maxPrice = parseInt(priceInput[1].value);
				
				if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
					if(e.target.className === "input-min"){
						rangeInput[0].value = minPrice;
						range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
					}else{
						rangeInput[1].value = maxPrice;
						range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
					}
				}
			});
		});
</script>

<form action="reponse_recherche.php" method="POST" data-parsley-validate>
	<input type="number" name="anneemin" class="search" placeholder="Annee min" data-parsley-type="number">
	<input type="number" name="anneemax" class="search" placeholder="Annee max" data-parsley-type="number">
	
	<input type="text" name="auteur" list="auteurs" class="search" placeholder="Auteur" data-parsley-type="alphanum">
	<datalist id="auteurs">
		<option value="Lingua ignota">
		<option value="Have a Nice Life">
		<option value="Coil">
		<option value="Daughters">
		<option value="Nine Inch Nails">
		<option value="Massive Attack">
		<option value="Swans">
		<option value="Death in June">
		<option value="Death Grips">
		<option value="Front Line Assembly">
	</datalist>
	<div id="boutons">
		<input type="submit" name="submit" class="submit" value="Chercher">
	</div>
</form>

<?php
require 'footer.php';
require 'fin_html.php'
?>