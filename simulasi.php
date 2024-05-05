<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acak Soal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">SIMULASI PENGACAKAN SOAL QUIS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Jika ingin menambahkan item navbar lainnya, bisa ditambahkan di sini -->
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-right">No</th>
                            <th scope="col" class="text-left">Soal</th>
                        </tr>
                    </thead>
                    <tbody id="soal-container">
                        <?php
                            // Koneksi ke database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "kelompok";

                            // Buat koneksi
                            $conn = new mysqli($servername, $username, $password, $database);

                            // Periksa koneksi
                            if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);
                            }

                            // Query untuk mengambil semua soal
                            $sql = "SELECT * FROM banksoal";
                            $result = $conn->query($sql);

                            // Simpan data soal dalam array
                            $soalArray = array();
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $soalArray[] = $row;
                                }
                            } else {
                                echo "0 results";
                            }

                            // Acak urutan array soal
                            shuffle($soalArray);

                            // Tampilkan data soal
                            foreach ($soalArray as $soal) {
                                echo "<tr>";
                                echo "<td class='text-right'>" . $soal["No"] . "</td>";
                                echo "<td class='text-left'>" . $soal["Soal"] . "</td>";
                                echo "</tr>";
                            }
                            $conn->close();
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary btn-block" onclick="acakSoal()">Tampilkan Soal</button>
            </div>
        </div>
    </div>

    <script>
        function acakSoal() {
            // Refresh halaman untuk mengacak soal kembali dari database
            location.reload();
        }
    </script>
</body>
</html>
