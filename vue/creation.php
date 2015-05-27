<form action="" method="post">
    Modèle de soutiens gorge
    <input type="radio" name="bra" value="profond" checked>Grand maintien, bonnets profonds et minimiseur
    <input type="radio" name="bra" value="balconnet">Soutien gorge balconnet
    <input type="radio" name="bra" value="armature">Armature ou emboitant
    <input type="radio" name="bra" value="corbeille">Corbeille ou demi coupe corbeille
    <input type="radio" name="bra" value="pushup">Soutien Push up
    <input type="radio" name="bra" value="plunge">Soutiens gorge Plunge
    <input type="radio" name="bra" value="coque">Coques et paddés
    <input type="radio" name="bra" value="bandeau">Bandeau ou sans bretelles
    <input type="radio" name="bra" value="triangle">Triangle
    <input type="radio" name="bra" value="invisible">Invisibles et moulés
    <input type="radio" name="bra" value="nu">Soutien gorge dos nu
    <input type="radio" name="bra" value="brassiere">Brassière et soutien gorge de sport

    Tissus
    <input type="radio" name="material" value="coton" checked>Coton
    <input type="radio" name="material" value="dentelle">Dentelle
    <input type="radio" name="material" value="soie">Soie
    <input type="radio" name="material" value="satin">Satin
    <input type="radio" name="material" value="tulle">Tulle brodé

    Modèle de culotte
    <input type="radio" name="underwear" value="miniString"checked>Mini-string
    <input type="radio" name="underwear" value="string">String
    <input type="radio" name="underwear" value="tanga">Tanga
    <input type="radio" name="underwear" value="hotTanga">Hot tanga
    <input type="radio" name="underwear" value="slipFemme">Slip femme
    <input type="radio" name="underwear" value="slipItalien">Slip italien
    <input type="radio" name="underwear" value="culotte">Culotte
    <input type="radio" name="underwear" value="shorty">Shorty
    <input type="radio" name="underwear" value="boxerFemme">Boxer femme
    <input type="radio" name="underwear" value="invisible">Invisible
    <input type="radio" name="underwear" value="stanga">Stanga

    <input type="submit" value="Créer">
</form>

<?php
$_SESSION['creation'] = ['bra' => $_POST['bra'], 'material' => $_POST['material'], 'underwear' => $_POST['underwear']];
?>