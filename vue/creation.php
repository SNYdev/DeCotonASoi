<form action="" method="post">
    Modèle de soutiens gorge
    <input type="radio" name="bra" value="Profond" checked>Grand maintien, bonnets profonds et minimiseur
    <input type="radio" name="bra" value="Balconnet">Soutien gorge balconnet
    <input type="radio" name="bra" value="Armature">Armature ou emboitant
    <input type="radio" name="bra" value="Corbeille">Corbeille ou demi coupe corbeille
    <input type="radio" name="bra" value="Pushup">Soutien Push up
    <input type="radio" name="bra" value="Plunge">Soutiens gorge Plunge
    <input type="radio" name="bra" value="Coque">Coques et paddés
    <input type="radio" name="bra" value="Bandeau">Bandeau ou sans bretelles
    <input type="radio" name="bra" value="Triangle">Triangle
    <input type="radio" name="bra" value="Invisible">Invisibles et moulés
    <input type="radio" name="bra" value="Nu">Soutien gorge dos nu
    <input type="radio" name="bra" value="Brassiere">Brassière et soutien gorge de sport

    Tissus
    <input type="radio" name="material" value="Coton" checked>Coton
    <input type="radio" name="material" value="Dentelle">Dentelle
    <input type="radio" name="material" value="Soie">Soie
    <input type="radio" name="material" value="Satin">Satin
    <input type="radio" name="material" value="Tulle">Tulle brodé

    Modèle de culotte
    <input type="radio" name="underwear" value="Mini-string"checked>Mini-string
    <input type="radio" name="underwear" value="String">String
    <input type="radio" name="underwear" value="Tanga">Tanga
    <input type="radio" name="underwear" value="Hot-tanga">Hot tanga
    <input type="radio" name="underwear" value="Slip-femme">Slip femme
    <input type="radio" name="underwear" value="Slip-italien">Slip italien
    <input type="radio" name="underwear" value="Culotte">Culotte
    <input type="radio" name="underwear" value="Shorty">Shorty
    <input type="radio" name="underwear" value="Boxer-femme">Boxer femme
    <input type="radio" name="underwear" value="Invisible">Invisible
    <input type="radio" name="underwear" value="Stanga">Stanga

    <input type="submit" value="Créer">
</form>

<?php
if(isset($_POST['bra'], $_POST['material'], $_POST['underwear'])) {
    $_SESSION['creation'] = ['bra' => $_POST['bra'], 'material' => $_POST['material'], 'underwear' => $_POST['underwear']];

    header('Location: ?page=creationResum');

    exit;
}
?>