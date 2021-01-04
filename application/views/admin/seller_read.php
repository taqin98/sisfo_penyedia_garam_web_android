<?php 
    if($this->session->flashdata('notification')){
        ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?= $this->session->flashdata('notification'); ?>
            <!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
?>

<a href="?content=seller_add" class="btn btn-success mt-2 mb-3">Tambah Penyedia Garam</a>
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="min-width: 30px;">UserID</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Status</th>
            <th style="min-width: 100px;">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = $this->db->get_where('users', array('level' => 2))->result();
    foreach ($query as $key) {
        ?>
        <tr>
            <td><?= $key->user_id ?></td>
            <td><?= $key->email ?></td>
            <td><?= $key->username ?></td>
            <td><?= substr($key->password, 1, 10) . '...etc' ?></td>
            <td><?= $key->level ?></td>
            <td><?= $key->information ?></td>
            <td>
                <a href="dashboard_admin?content=seller_detail&userid=<?= $key->user_id ?>" class="btn btn-sm btn-success">Detail</a>
                <a href="dashboard_admin?content=seller_edit&userid=<?= $key->user_id ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('users/seller_delete') . '/' . $key->user_id ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>