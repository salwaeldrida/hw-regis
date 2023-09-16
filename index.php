<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas - Javascript</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <ul>
        <li>
            <a href="#formRegistrasi"> Form Registrasi </a>
        </li>
        <li>
            <a href="#tampilDataRegistrasi"> List Pendaftar </a>
        </li>
    </ul>

    <div class="form-container active" id="registrasi">
        <form id="formRegis">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="namaLengkap" required>
            </div>
            <div class="form-group">
                <label>Umur</label>
                <input type="number" class="form-control" id="umur" min="25" required>
            </div>
            <div class="form-group">
                <label>Uang Saku (Rp100.000 - Rp1.000.000)</label>
                <input type="number" class="form-control" id="uangSaku" min="100000" max="1000000" required>
            </div>
            <button type="submit" class="btn-primary">Registrasi</button>
        </form>
    </div>

    <div class="table-container" id="tabelRegistrasi">
        <table>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Usia</th>
                    <th>Uang Saku</th>
                </tr>
            </thead>
            <tbody id="listDataRegistrasi">
            </tbody>
        </table>
        <div id="hasilAkhir"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="data.js" type="module"></script>
    <script src="main.js" type="module"></script>

    <script>
        function showElementBasedOnHash() {
            var hash = window.location.hash;

            if (hash === '#tampilDataRegistrasi') {
                $('.table-container').addClass('active');
                $('.form-container').removeClass('active');
            } else {
                $('.form-container').addClass('active');
                $('.table-container').removeClass('active');
            }
        }
        $(document).ready(function() {
            showElementBasedOnHash();

            $(window).on('hashchange', function() {
                showElementBasedOnHash();
            });
        });
    </script>
</body>

</html>