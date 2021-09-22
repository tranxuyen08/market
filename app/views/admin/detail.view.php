<?php require(__dir__ . '/../partials/admin/header.php'); ?>
    <form method="POST" action="/admin/user/update">
        <div>
            ID:<?= $user['id']?>
            <input type="hidden" name="id" value="<?= $user['id']?>">
        </div>
        <div>
            <label for="">Email:</label>
            <input type="text" name="email" value="<?= $user['email']?>">
        </div>
        <div>
            <label for="">Password:</label>
            <input type="password" name="password" value="">
        </div>
        <div>
            <label for="">Phone Number:</label>
            <input type="text" name="phone_number" value="<?= $user['phone_number']?>">
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" name="name" value="<?= $user['name']?>">
        </div>
        <div>
            <label for="">Gender:</label>
            <label for="">Gender:</label>
            <input type="radio" name="gender" <?= $user['gender'] == 1 ? 'checked' : '' ?> value="1">
            <label for="">Nam</label>
            <input type="radio" name="gender" <?= $user['gender'] == 0 ? 'checked' : '' ?> value="0">
            <label for="">Nu</label>
        </div>
        <a href="users.view.php">Back</a>
        <button type="submit">Submit</button>
    </form>