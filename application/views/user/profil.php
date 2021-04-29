<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Profile</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $this->view('messages') ?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-4 align-self-end">
                                <img src="<?= base_url() ?>assets/plugins/images/profile.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-8">
                                <div class="text-primary p-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>:</td>
                                                    <td><?= $row->username ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Hak Akses</td>
                                                    <td>:</td>
                                                    <td><?= $row->username == 1 ? 'Admin' : 'Kasir' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $row->address ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><a href="<?= site_url('profile/edit/' . $row->user_id) ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="avatar-lg profile-user-wid mb-4 text-center">
                                    <img src="<?= base_url() ?>assets/plugins/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-center"><?= $row->name ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>