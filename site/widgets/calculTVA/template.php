<fieldset class="fieldset field-grid cf">
	<div class="field field-grid-item field-with-icon field-grid-item-1-2">
		<label class="label" for="PRIX">Prix<abbr title="Required">*</abbr></label>
		<div class="field-content">
			<input class="input" type="text" name="PRIX" id="PRIX" value="" onKeyUp="taux()">
			<div class="field-icon"><i class="icon fa fa-eur"></i></div>
		</div>
	</div><div class="field field-grid-item field-with-icon field-grid-item-1-2">
		<label class="label" for="TVA">TVA<abbr title="Required">*</abbr></label>
		<div class="field-content">
			<input class="input" type="text" name="TVA" id="TVA" value="20" onKeyUp="taux()">
			<div class="field-icon"><i class="icon fa fa-percent"></i></div>
		</div>
	</div>
	<div class="field field-grid-item field-with-icon field-grid-item-1-2">
		<label class="label" for="PARAM">HT ou TTC ?<abbr title="Required">*</abbr></label>
		<div class="field-content">
			<div class="input input-with-selectbox" data-focus="true">
				<div class="selectbox-wrapper">
					<select class="selectbox" name="PARAM" id="PARAM" onchange="taux()">
						<option value="HT" >HT</option>
						<option value="TTC">TTC</option>
					</select>
				</div>
			</div>
			<div class="field-icon"><i class="icon fa fa-chevron-down"></i></div>
		</div>
	</div><div class="field field-grid-item field-with-icon field-grid-item-1-2 field-is-readonly">
		<label class="label">Résultat</label>
		<div class="field-content">
			<input class="input input-is-readonly" type="text" value="Indiquez un prix" id="RESULTAT" tabindex="-1">
			<div class="field-icon"><i class="icon fa fa-eur"></i></div>
		</div>
	</div>
</fieldset>
<script>
	var TVA = document.getElementById("TVA");
	var PRIX = document.getElementById("PRIX");
	var PARAM = document.getElementById("PARAM");
	var RESULTAT = document.getElementById("RESULTAT");
	function calculTTC(){
		if (PRIX.value == "") {
			RESULTAT.value ="Indiquez un prix";
		} else if (TVA.value == "") {
			RESULTAT.value ="Indiquez un taux de TVA";
		} else {
			var PRIXTTC = Number(PRIX.value) + (Number(PRIX.value) * TVA.value)/100;
			RESULTAT.value = PRIXTTC.toFixed(2);
		}
	}
	function calculHT(){
		if (PRIX.value == "") {
			RESULTAT.value ="Indiquez un prix";
		} else if (TVA.value == "") {
			RESULTAT.value ="Indiquez un taux de TVA";
		} else {
			var PRIXHT = Number(PRIX.value)/(1+(TVA.value/100));
			RESULTAT.value = PRIXHT.toFixed(2);
		}
	}
	function taux(){
		if (PARAM.value === "TTC") {
			calculTTC();
		} else if (PARAM.value === "HT") {
			calculHT();
		}
	}
</script>