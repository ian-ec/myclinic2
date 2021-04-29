<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Parameter Aplikasi</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Parameter Aplikasi</a></li>
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
                <form action="<?= site_url('parameter/process') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Aplication Name *</label>
                        <input type="text" name="aplication_name" value="<?= $parameter->aplication_name ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Initial *</label>
                        <input type="text" name="initial" value="<?= $parameter->initial ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address *</label>
                        <input type="text" name="address" value="<?= $parameter->address ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telp *</label>
                        <input type="text" name="telp" value="<?= $parameter->telp ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <a href="<?= site_url('parameter') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>