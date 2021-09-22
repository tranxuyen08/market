<?php require(__dir__ . '/../partials/admin/header.php'); ?>
    <form method="POST" action="/admin/user/insert_sql">
        <div>
            <label for="">Email:</label>
            <input type="text" name="email" value="">
        </div>
        <div>
            <label for="">Password:</label>
            <input type="password" name="password" value="">
        </div>
        <div>
            <label for="">Phone Number:</label>
            <input type="text" name="phone_number" value="">
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" name="name" value="">
        </div>
        <div>
            <label for="">Gender:</label>
            <input type="radio" name="gender" checked value="1">
            <label for="">Nam</label>
            <input type="radio" name="gender" value="0">
            <label for="">Nu</label>
        </div>
        <a href="users.view.php">Back</a>
        <button type="submit">Submit</button>
    </form>