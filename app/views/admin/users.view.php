<?php require(__dir__ . '/../partials/admin/header.php'); ?>

    <h1>List User</h1>
    <p><b>Total User: <?= $totalUsers ?></b></p>
    <table>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Gender</th>
        </tr>
        <?php foreach($listUsers as $key => $value): ?>
        <tr>
            <td><?= ($key  + 1) + ($page - 1) * $limit ?></td>
            <td><?= $value['id'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['phone_number'] ?></td>
            <td><?= $value['gender'] == 1 ? 'Male' : 'Female' ?></td>
            <td><a href="/admin/user/detail?id=<?= $value['id'] ?>">Edit</a></td>
            <td><a href="/admin/user/delete?id=<?= $value['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div style="display:flex; text-align:center;">
        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
            <div style="margin:10px;">
                <a href="/admin/user?page=<?= $i ?>"><?= $i ?></a>
            </div>
        <?php endfor; ?>
    </div>
    <div><a href="/admin/user/insert">Insert</a></div>

<?php require(__dir__ .'/../partials/admin/footer.php'); ?>