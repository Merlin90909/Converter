<?php

require __DIR__ . '/../../partials/header.php';

echo '<body>
<h1>Admin-Dashboard</h1>
<form action="" method="POST">
    <input type="hidden" name="destroySession" value="1">
    <input type="submit" value="LogOut" />
</form>
    <br>
    <br>
<h2>Zahlensystem-Konverter</h2>
<form action="/functions" method="POST">
    <input type="hidden" name="action" value="universal_convert">
    <label for="from">von was? in was?:</label>
    <select name="from" id="from">
        <option value="dec_in_bin">Dec --> Bin</option>
        <option value="dec_in_oc">Dec --> Oc</option>
        <option value="dec_in_hex">Dec --> Hex</option>
        <option value="dec_in_rom">Dec --> Rom</option>
        <option value="bin_in_dec">Bin --> Dec</option>
        <option value="oc_in_dec">Oc --> Dec</option>
        <option value="hex_in_dec">Hex --> Dec</option>
        <option value="rom_in_dec">Rom --> Dec</option>
    </select>
    <br><br>

    <label for="number">Zahl:</label>
    <input type="text" id="number" name="number" required>
    <br><br>

    <input type="submit" value="ausrechnen">
</form>
<br><br>
';
echo "Ausgabe:   " . (isset($_SESSION['solution']) ? $_SESSION['solution'] : '');

echo '
<br>
<br>
<br>';
require __DIR__ . '/../../partials/footer.php';

echo '</body></html>';


# Session beenden
$destroySessionFlag = filter_input(INPUT_POST, 'destroySession');
if ($destroySessionFlag == 1) {
    session_destroy();
    header('Location: login');
}