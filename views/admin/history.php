<?php include_once('./views/common/header_admin.php'); ?>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th> ID </th>
        <th> Name </th>
        <th> Phone </th>
        <th> Comment </th>
        <th> Data </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><a href="<?= FULL_SITE_ROOT . 'history/view/' . $order['order_id'] ?>"><?= $order['order_id']; ?></a> </td>
            <td> <?= $order['order_user_name']; ?> </td>
            <td> <?= $order['order_user_phone']; ?> </td>
            <td> <?= $order['order_user_comment']; ?> </td>
            <td> <?= $order['order_data']; ?> </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_once('./views/common/footer.php'); ?>
