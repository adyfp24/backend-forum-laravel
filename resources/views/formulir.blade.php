<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulir</title>
</head>
<body>
    <form action="/formulir/proses/" method="POST">
        <h1>nama</h1>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <input type="text" name="nama" placeholder="nama">
        <input type="text" name="nim" placeholder="nim">
        <button type="submit" name="simpan" value="simpan">simpan</button>
    </form>
</body>
</html>