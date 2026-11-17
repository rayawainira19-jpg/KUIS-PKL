<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Pola Bintang - Kuis Tiara</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 30px; 
            background-color: #f4f7f6; 
            color: #333;
        }
        .container { 
            background: #ffffff; 
            padding: 25px; 
            border-radius: 10px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
            max-width: 650px; 
            margin: auto;
        }
        h2 { color: #007BFF; margin-top: 0; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; display: block; margin-bottom: 5px; }
        input[type="number"] { 
            padding: 8px; 
            width: 80px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }
        button { 
            padding: 8px 16px; 
            background: #007BFF; 
            color: #fff; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: bold;
        }
        button:hover { background: #0056b3; }
        pre { 
            font-family: 'Courier New', Courier, monospace; 
            background: #1e1e1e; 
            color: #4ec9b0; 
            padding: 15px; 
            border-radius: 6px; 
            overflow-x: auto; 
            line-height: 1.2;
            font-size: 16px;
        }
        .pattern-box { margin-top: 20px; }
        .pattern-box strong { color: #333; display: block; margin-bottom: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Generator Pola Bintang PHP</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nilai">Masukkan Jumlah Baris (1 - 20):</label>
            <input type="number" id="nilai" name="nilai" min="1" max="20" value="<?php echo isset($_POST['nilai']) ? intval($_POST['nilai']) : 5; ?>" required>
        </div>
        <button type="submit" name="submit">Tampilkan Pola</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n = intval($_POST['nilai']);
        
        // Batasi nilai input aman antara 1 sampai 20
        if ($n < 1) $n = 1;
        if ($n > 20) $n = 20;

        echo "<hr style='margin: 25px 0; border: 0; border-top: 1px solid #eee;'>";
        echo "<h3>Hasil Pola untuk N = $n</h3>";

        // 1. Piramida ke Atas (Ganjil: 1, 3, 5, ...)
        echo "<div class='pattern-box'>";
        echo "<strong>1. Piramida ke Atas (Deret Ganjil)</strong>";
        echo "<pre>";
        for ($i = 1; $i <= $n; $i++) {
            // Spasi penyeimbang menggunakan karakter spasi ganda agar pas dengan bintang
            echo str_repeat("  ", $n - $i); 
            // Cetak bintang sejumlah ganjil pada baris tersebut
            echo str_repeat("* ", (2 * $i) - 1); 
            echo "\n";
        }
        echo "</pre>";
        echo "</div>";

        // 2. Piramida ke Bawah (Terbalik dari nilai tertinggi ke 1)
        echo "<div class='pattern-box'>";
        echo "<strong>2. Piramida ke Bawah (Terbalik)</strong>";
        echo "<pre>";
        for ($i = $n; $i >= 1; $i--) {
            echo str_repeat("  ", $n - $i);
            echo str_repeat("* ", (2 * $i) - 1);
            echo "\n";
        }
        echo "</pre>";
        echo "</div>";

        // 3. Segitiga Samping Kiri
        echo "<div class='pattern-box'>";
        echo "<strong>3. Segitiga Samping Kiri</strong>";
        echo "<pre>";
        for ($i = 1; $i <= $n; $i++) {
            echo str_repeat("* ", $i);
            echo "\n";
        }
        echo "</pre>";
        echo "</div>";

        // 4. Segitiga Samping Kanan
        echo "<div class='pattern-box'>";
        echo "<strong>4. Segitiga Samping Kanan</strong>";
        echo "<pre>";
        for ($i = 1; $i <= $n; $i++) {
            echo str_repeat("  ", $n - $i); 
            echo str_repeat("* ", $i);
            echo "\n";
        }
        echo "</pre>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>