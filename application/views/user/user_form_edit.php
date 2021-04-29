<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Users</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                        <label for="">Name *</label>
                        <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                        <input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name ?>" class="form-control">
                        <?= form_error('fullname') ?>
                    </div>
                    <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                        <label for="">Username *</label>
                        <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control" style="background-color: lavender;" readonly>
                        <?= form_error('username') ?>
                    </div>
                    <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                        <label for="">Password *</label><small>(Biarkan kosong jika tidak di ganti)</small>
                        <input type="password" name="password" class="form-control" value="<?= $this->input->post('password') ?>">
                        <?= form_error('password') ?>
                    </div>
                    <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                        <label for="">Password Konfirm *</label>
                        <input type="password" name="passconf" class="form-control" value="<?= $this->input->post('passconf') ?>">
                        <?= form_error('passconf') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Address </label>
                        <textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
                    </div>
                    <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                        <label for="">Level *</label>
                        <select name="level" class="form-control">
                            <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                            <option value="1" <?= $level == 1 ? 'selected' : null ?>>Admin</option>
                            <option value="2" <?= $level == 2 ? 'selected' : null ?>>Kasir</option>
                        </select>
                        <?= form_error('level') ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <a href="<?= $this->uri->segment(1) == 'user' ? site_url('user') : site_url('profile/info/') . $row->user_id ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>