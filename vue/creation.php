<?php
if(isset($_POST['bra'], $_POST['material'], $_POST['underwear'])) {
    $_SESSION['creation'] = ['bra' => $_POST['bra'], 'material' => $_POST['material'], 'underwear' => $_POST['underwear'], 'stylist' => $_POST['stylist']];

    header('Location: ?page=creationResum');

    exit;
}
?>
<form action="" class="formCreation" method="post">
    <div class="BLOCK">
        <h2 class="titleFormCreation">Modèle de soutiens gorge</h2>
        <div class="blockCreation">
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Profond" checked>Grand maintien, bonnets profonds et minimiseur<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Balconnet">Soutien gorge balconnet<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Armature">Armature ou emboitant<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Corbeille">Corbeille ou demi coupe corbeille<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Pushup">Soutien Push up<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Plunge">Soutiens gorge Plunge<br>
        </div>
        <div class="blockCreation">
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Coque">Coques et paddés<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Bandeau">Bandeau ou sans bretelles<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Triangle">Triangle<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Invisible">Invisibles et moulés<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Nu">Soutien gorge dos nu<br>
            <input type="radio" name="bra" class="modele-soutiensGorge" value="Brassiere">Brassière et soutien gorge de sport<br>
        </div>
    </div>
    <div class="BLOCK">
        <div class="tissusCreation">
            <h2 class="titleFormCreation">Tissus</h2>
            <input type="radio" name="material" class="modele-soutiensGorge" value="Coton" checked>Coton<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="Dentelle">Dentelle<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="Soie">Soie<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="Satin">Satin<br>
            <input type="radio" name="material" class="modele-soutiensGorge" value="Tulle">Tulle brodé
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
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="Mini-string"checked>Mini-string<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="String">String<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="Tanga">Tanga<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="Hot-tanga">Hot tanga<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="Slip-femme">Slip femme<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="Slip-italien">Slip italien<br>
        </div>
        <div id="modelRight">
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="culotte">Culotte<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="shorty">Shorty<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="Boxer-femme">Boxer femme<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="invisible">Invisible<br>
            <input type="radio" name="underwear" class="modele-soutiensGorge" value="stanga">Stanga<br>
        </div>
    </div>

    <select name="stylist">
        <option value="Marine-Anton">Marine Anton</option>
        <option value="Sophie-Dufrane">Sophie Dufrane</option>
    </select>
    <input type="submit" class="submitDCAS" value="Créer">
</form>