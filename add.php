<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set cookie untuk setiap input formulir
    setcookie("txtNama", $_POST["txtNama"], time() + (86400 * 30), "/"); // 86400 = 1 hari
    setcookie("bgColor", $_POST["bgColor"], time() + (86400 * 30), "/");
    setcookie("headColor", $_POST["headColor"], time() + (86400 * 30), "/");
    setcookie("h1Align", $_POST["h1Align"], time() + (86400 * 30), "/");
    setcookie("pColor", $_POST["pColor"], time() + (86400 * 30), "/");
    setcookie("pFontSize", $_POST["pFontSize"], time() + (86400 * 30), "/");
    
    // Redirect ke halaman yang sama untuk menghindari resubmission formulir
    header("Location: index.php");
    exit;
}
// Membaca nilai cookie untuk menampilkan sebagai nilai default di formulir
$txtNama = isset($_COOKIE["txtNama"]) ? $_COOKIE["txtNama"] : '';
$bgColor = isset($_COOKIE["bgColor"]) ? $_COOKIE["bgColor"] : '#FFFFFF'; // Default putih jika tidak ada cookie
$headColor = isset($_COOKIE["headColor"]) ? $_COOKIE["headColor"] : '#000000'; // Default hitam
$h1Align = isset($_COOKIE["h1Align"]) ? $_COOKIE["h1Align"] : 'left'; // Default kiri
$pColor = isset($_COOKIE["pColor"]) ? $_COOKIE["pColor"] : '#000000'; // Default hitam
$pFontSize = isset($_COOKIE["pFontSize"]) ? $_COOKIE["pFontSize"] : '14'; // Default ukuran 14
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Theme</title>
</head>
<body>
    <form method="POST" action="add.php">
        <p><label>Name of Your Theme : </label><input type="text" name="txtNama" id="txtNama" value="<?php echo $txtNama; ?>" required></p>
        <p><label>Color of Page Background : </label><input type="color" name="bgColor" id="bgColor" value="<?php echo $bgColor; ?>"></p>
        <p><label>Color of Heading 1 : </label><input type="color" name="headColor" id="headColor" value="<?php echo $headColor; ?>"></p>
        <p>
            <label>Alignment of Heading 1 : </label>
            <select name="h1Align" id="h1Align">
                <option value="left" <?php echo $h1Align == 'left' ? 'selected' : ''; ?>>Left</option>
                <option value="center" <?php echo $h1Align == 'center' ? 'selected' : ''; ?>>Center</option>
                <option value="right" <?php echo $h1Align == 'right' ? 'selected' : ''; ?>>Right</option>
            </select>
        </p>
        <p><label>Color of Paragraph : </label><input type="color" name="pColor" id="pColor" value="<?php echo $pColor; ?>"></p>
        <p><label>Font size of Paragraph : </label><input type="number" name="pFontSize" id="pFontSize" min="1" value="<?php echo $pFontSize; ?>"> px</p>
        <p><button type="submit">Save</button></p>
    </form>
</body>
</html>
