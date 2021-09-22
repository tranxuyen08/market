<?php require(__dir__ . '/../partials/head.php'); ?>

    <h1>Admin Login Page</h1>
    <form method="POST" action="/admin/login">
        <label for="">Email:</label>
        <input type="text" name="email" >
        <label for="">Password:</label>
        <input type="password" name="password" >
        <button type="submit">Submit</button>
    </form>
    

<?php require(__dir__ .'/../partials/footer.php'); ?>