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
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Aplication Name </td>
                            <td>:</td>
                            <th><strong><?= $parameter->aplication_name ?></strong></th>
                        </tr>
                        <tr>
                            <td>Initial </td>
                            <td>:</td>
                            <th><strong><?= $parameter->initial ?></strong></th>
                        </tr>
                        <tr>
                            <td>Address </td>
                            <td>:</td>
                            <th><strong><?= $parameter->address ?></strong></th>
                        </tr>
                        <tr>
                            <td>Telp </td>
                            <td>:</td>
                            <th><strong><?= $parameter->telp ?></strong></th>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a href="<?= site_url('parameter/update') ?>">
                        <button class="btn btn-info">
                            <i class="fa fa-pencil"></i> Edit
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>