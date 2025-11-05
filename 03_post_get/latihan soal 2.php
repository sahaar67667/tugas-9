<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penghitungan Pecahan Uang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 400px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label, input, button { display: block; margin-bottom: 10px; }
        input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button[type="reset"] { background-color: #6c757d; margin-top: 5px; }
        .result { margin-top: 20px; padding: 10px; border: 1px dashed #007bff; background-color: #e9f7ff; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>💰 Hitung Jumlah Pecahan Uang</h2>

    <form method="post" action="">
        <label for="jumlah_uang">Masukkan Jumlah Uang (Contoh: 1575250):</label>
        <input type="number" id="jumlah_uang" name="jumlah_uang" min="0" required 
               value="<?php echo isset($_POST['jumlah_uang']) ? htmlspecialchars($_POST['jumlah_uang']) : '1575250'; ?>">
        
        <button type="submit" name="submit">Hitung Pecahan</button>
        <button type="reset">Reset</button>
    </form>

    <?php
    // Memproses data setelah tombol submit diklik
    if (isset($_POST['submit']) && isset($_POST['jumlah_uang'])) {
        // Ambil input dan pastikan itu adalah bilangan bulat positif
        $jumlahUang = (int)$_POST['jumlah_uang'];

        echo "<div class='result'>";
        echo "<h3>Hasil Pecahan untuk Rp. " . number_format($jumlahUang, 0, ',', '.') . "</h3>";
        
        // Cek jika input valid
        if ($jumlahUang < 0) {
            echo "<p style='color: red;'>Masukkan jumlah uang yang valid (bilangan positif).</p>";
        } else {
            $sisaUang = $jumlahUang;

            // Daftar pecahan dan variabel hasilnya
            $pecahan = [
                100000 => 'a',
                50000 => 'b',
                20000 => 'c', // Menggunakan 20.000 sesuai kode awal
                5000 => 'd',
                100 => 'e',   // Menggunakan 100 sesuai kode awal
                50 => 'f',
            ];
            
            // Loop untuk menghitung pecahan
            $hasil = [];
            foreach ($pecahan as $nilai => $var_name) {
                // Hitung jumlah pecahan
                $jumlah = intdiv($sisaUang, $nilai);
                // Simpan hasil
                $hasil[$nilai] = $jumlah;
                // Update sisa uang
                $sisaUang %= $nilai;
            }

            // Tampilkan hasil
            foreach ($hasil as $nilai => $jumlah) {
                echo "Jumlah Rp. " . number_format($nilai, 0, ',', '.') . " : **" . $jumlah . "**<br />";
            }
            
            // Tampilkan sisa jika ada
            if ($sisaUang > 0) {
                 echo "<hr>";
                 echo "Sisa uang yang tidak bisa dipecah: **Rp. " . number_format($sisaUang, 0, ',', '.') . "**";
            }
        }
        echo "</div>";
    }
    ?>

</div>

</body>
</html>