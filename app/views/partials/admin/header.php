<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<header>
    <?php if (!empty($_SESSION['admin_info'])): ?>
    <div style="display:flex;">
        <p>Name : <?= $_SESSION['admin_info']['name'] ?> </p>
        <p>Email : <?= $_SESSION['admin_info']['email'] ?> </p>
        <p><a href="/admin/logout">logout</a></p>
    </div>
    <?php endif ?>
</header>