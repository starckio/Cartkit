<fieldset class="fieldset field-grid cf">
<form name="calcultva" onsubmit="return false;">
	<div class="field field-grid-item field-with-icon field-grid-item-1-2">

		<label class="label" for="PRIX">Montant HT<abbr title="Required">*</abbr></label>
		<div class="field-content">
			<input type="text" name="mnt" maxlength="9" onkeyup="convertMNTtoTVA()" onblur="convertMNTtoTVA()" onclick="convertMNTtoTVA()" class="input" value="1">
			<div class="field-icon"><i class="icon fa fa-eur"></i></div>
		</div>

	</div><div class="field field-grid-item field-with-icon field-grid-item-1-2">

		<label class="label" for="PRIX">Montant TTC<abbr title="Required">*</abbr></label>
		<div class="field-content">
			<input type="text" name="tva" maxlength="9" onkeyup="convertTVAtoMNT()" onblur="convertTVAtoMNT()" onclick="convertTVAtoMNT()" class="input">
			<div class="field-icon"><i class="icon fa fa-eur"></i></div>
		</div>

	</div>
	<div class="field field-grid-item field-with-icon field-is-readonly">

		<label class="label">Résultat - TVA 20%</label>
		
		<div class="dashboard-box">
		  <span class="dashboard-item">
		    <figure>
		      <span class="dashboard-item-icon dashboard-item-icon-with-border"><i class="fa fa-eur"></i></span>
		      <figcaption class="dashboard-item-text" id="taxe"></figcaption>
		    </figure>
		  </span>
		</div>

	</div>
</form>
</fieldset>
<script>
function forceValidFloat(n)
{
    if(n.length == 0) return '';
    var valids = '0123456789';
    var hasDot = false;
    var r = '';
    var c;
    for(var i = 0; i < n.length; ++i)
    {
        c = n.charAt(i);
        if((c == '.' || c == ',') && !hasDot)
        {
            r += (r.length == 0) ? '0.' : '.';
            hasDot = true;
        }
        else if(valids.indexOf(c) != -1)
        {
            r += c;
        }
    }

    return r;
}

function convertMNTtoTVA()
{
    document.calcultva.tva.value = '';
    if(document.calcultva.mnt.value.length > 9) document.calcultva.mnt.value = document.calcultva.mnt.value.substr(0, 9);
    var temp = forceValidFloat(document.calcultva.mnt.value);
    if(temp.length == 0) return;
    if(temp.charAt(temp.length-1) != '.' && temp.charAt(temp.length-1) != '0')
        temp = (Math.round(parseFloat(temp)*100)/100)%100000;
    document.calcultva.mnt.value = temp;
    document.calcultva.tva.value = Math.round(parseFloat(document.calcultva.mnt.value)*1.200*100)/100;
    document.getElementById('taxe').innerHTML=(Math.round((parseFloat(document.calcultva.tva.value)-temp)*100)/100)+'&nbsp;';
}

function convertTVAtoMNT()
{
    document.calcultva.mnt.value = '';
    if(document.calcultva.tva.value.length > 9) document.calcultva.tva.value = document.calcultva.tva.value.substr(0, 9);
    var temp = forceValidFloat(document.calcultva.tva.value);
    if(temp.length == 0) return;
    if(temp.charAt(temp.length-1) != '.' && temp.charAt(temp.length-1) != '0')
        temp = (Math.round(parseFloat(temp)*100)/100)%100000;
    document.calcultva.tva.value = temp;
    document.calcultva.mnt.value = Math.round(parseFloat(document.calcultva.tva.value)/1.200*100)/100;
    document.getElementById('taxe').innerHTML=(Math.round((temp-parseFloat(document.calcultva.mnt.value))*100)/100)+'&nbsp;';
}
</script>