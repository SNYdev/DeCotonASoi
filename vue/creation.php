<?php
if(isset($_POST['bra'], $_POST['material'], $_POST['underwear'])) {
    $_SESSION['creation'] = ['bra' => $_POST['bra'], 'material' => $_POST['material'], 'underwear' => $_POST['underwear']];

    header('Location: ?page=creationResum');

    exit;
}
?>
<form action="" class="formCreation" method="post">
    <div class="BLOCK">
        <h2 class="titleFormCreation">Modèle de soutiens gorge</h2>
        <div class="blockCreation">
            <input type="radio" name="bra" class="modele-soutiensGorge" value="profond" checked>Grand maintien, bonnets profonds et minimiseur<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="balconnet">Soutien gorge balconnet<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="armature">Armature ou emboitant<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="corbeille">Corbeille ou demi coupe corbeille<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="pushup">Soutien Push up<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="plunge">Soutiens gorge Plunge<br>
        </div>
        <div class="blockCreation">
            <input type="radio" name="bra" class="modele-soutiensGorge" value="coque">Coques et paddés<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="bandeau">Bandeau ou sans bretelles<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="triangle">Triangle<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="invisible">Invisibles et moulés<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="nu">Soutien gorge dos nu<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="brassiere">Brassière et soutien gorge de sport<br>
        </div>
    </div>
    <div class="BLOCK">
        <div class="tissusCreation">
            <h2 class="titleFormCreation">Tissus</h2>
            <input type="radio" name="material" class="modele-soutiensGorge" value="coton" checked>Coton<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="dentelle">Dentelle<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="soie">Soie<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="satin">Satin<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="tulle">Tulle brodé
        </div>
        <div class="img3D">
            <img src="vue/img/model3D.jpg" width="160px">
        </div>
        <div class="patternsSelect">
            <img src="vue/img/patternUser.jpg" width="160px">
        </div>
    </div>
    <div class="BLOCK">
        <h2 class="titleFormCreation">Modèle de Culotte</h2><br>
        <div id="modelLeft">
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="miniString"checked>Mini-string<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="string">String<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="tanga">Tanga<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="hotTanga">Hot tanga<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="slipFemme">Slip femme<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="slipItalien">Slip italien<br>
        </div>
        <div id="modelRight">
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="culotte">Culotte<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="shorty">Shorty<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="boxerFemme">Boxer femme<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="invisible">Invisible<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="stanga">Stanga<br>
        </div>
    </div>
    <input type="submit" class="submitDCAS" value="Créer">
</form>