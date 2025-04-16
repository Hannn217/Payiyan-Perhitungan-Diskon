<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header_form">
                <h2>Aplikasi Perhitungan Diskon</h2>
            </div>
            <div>
                <form method="post" action="">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" required oninput="this.value=this.value.replace(/[^0-9.,]/g, '')">
                    <br>
                    <label for="diskon">Diskon</label>
                    <input type="text" name="diskon" id="diskon" required oninput="this.value=this.value.replace(/[^0-9.,]/g, '')">
                    <button type="submit" name="hitung">Hitung</button>
                    <button type="reset" onclick="window.location.href=window.location.href">Reset</button>
                </form>
            </div>
 
            <?php
            function formatUang($angka) // Function untuk pemformatan Harga
            {
                return 'Rp. ' . number_format($angka, 2, ',', '.');
            }
            function formatDiskon($angka) // Function untuk format diskon
            {
                return rtrim(rtrim(number_format($angka, 2, '.', ''), '0'), '.');
            }
            if (isset($_POST['hitung'])) {
                $harga = str_replace('.', '', $_POST['harga']); // Variabel harga yg langsung mengubah nilai desimal menjadi float
                $harga = str_replace(',', '.', $harga); // Variabel harga yg langsung mengubah nilai menjadi desimal
                $diskon = str_replace(',', '.', ($_POST['diskon'])); // Variabel harga yg langsung mengubah nilai desimal menjadi float


                // Validation Harga, Diskon, & Nilai Diskon sekaligus hasil akhir
                if ($harga < 0) // Validasi harga kurang dari 0 Rupiah
                {
                    echo 'Harga harus lebih dari 0 Rupiah.';
                } elseif ($diskon < 0 || $diskon > 100) // Validasi untuk diskon agar tidak negatif dan juga tidak melebihi 100%
                {
                    echo 'Diskon Harus diantara 0% - 100%.';
                } else // Validasi untuk Nilai data & Total harga setelah diskon
                {
                    $nilaiDiskon = $harga * ($diskon / 100);
                    $totalHarga = $harga - $nilaiDiskon;

                    echo '<table style="display:flex; border-collapse:collapse;">';
                    echo '<tr><td style="padding:4px 10px 4px 0;;"><strong>Harga Awal : ' . formatUang($harga) . '</strong></td></tr>'; //Harga Awal
                    echo '<tr><td style="padding:4px 10px 4px 0;"><strong><p>Diskon : ' . formatDiskon($diskon) . ' %</strong></td></tr>'; //Diskon
                    echo '<tr><td style="padding:4px 10px 4px 0"><strong>Nilai Diskon : ' . formatUang($nilaiDiskon) . '</strong></td></tr>'; //Nilai Diskon
                    echo '<tr><td style="padding:4px 10px 4px 0"><strong>Total Harga : ' . formatUang($totalHarga) . '</strong></td></tr>'; //Harga setelah diskon
                    echo '</table>';
                }
            }
            ?>

        </div>

        <footer>
            &copy; 2025 Aplikasi Perhitungan Diskon. Dibuat oleh Varian Kashira Suryananda.
        </footer>
    </div>
</body>

</html>