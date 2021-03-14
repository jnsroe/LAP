<?php
$regex = '/^\S+@\S+\.\S+$/';
$
if (isset($_POST['email']))
{
    if (preg_match($regex,$_POST['email']))
    {
        echo'<div>Email: correct</div>';
    }
    else
    {

    }
}
if (isset($_POST['submit']))
{
    echo '<h2>' . $_POST['name'] . '</h2>';
}
else {
    echo '
<form method="post">
<div class="container">
    <p>Please select your gender:</p>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Herr</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Frau</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Sonstige</label>

    <br>
    <label for="titel">Titel:</label>
    <select name="titel" id="titel">
        <option value="none">none</option>
        <option value="Mag.">Mag.</option>
        <option value="Dr. / Dres.">Dr. / Dres.</option>
        <option value="DDr.">DDr.</option>
        <option value="Dipl">Dipl</option>
    </select>
    <br>
    <label>Name</label>
    <input type="text" name="name"><br>
    <label>E-Mail</label>
    <input type="text" name="email"><br>
    <LABEL>Ankunftsdatum:</LABEL>
    <input type="datetime-local" name="ankunft"><br>

    <LABEL>Nächte:</LABEL>
    <input type="number"  name="nächte" min="1" max="5">
    <br>
    <a class="btn btn-secondary" href="?menu=hotelabfrage">Anzeigen</a>
    <input type="submit" name="submit">
    </div>
</form>';
}
?>