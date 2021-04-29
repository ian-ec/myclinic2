<?php if ($this->session->has_userdata('success')) { ?>
    <div id="success" data-success="<?= $this->session->flashdata('success') ?>"></div>

    <!-- <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i>
    <?= $this->session->flashdata('success') ?>
</div> -->
<?php } ?>

<?php if ($this->session->has_userdata('danger')) { ?>
    <div id="danger" data-danger="<?= $this->session->flashdata('danger') ?>"></div>

    <!-- <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <?= $this->session->flashdata('danger') ?>
    </div> -->
<?php } ?>

<?php if ($this->session->has_userdata('info')) { ?>
    <div id="info" data-info="<?= $this->session->flashdata('info') ?>"></div>

    <!-- <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <?= $this->session->flashdata('info') ?>
    </div> -->
<?php } ?>

<?php if ($this->session->has_userdata('warning')) { ?>
    <div id="warning" data-warning="<?= $this->session->flashdata('warning') ?>"></div>

    <!-- <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <?= $this->session->flashdata('warning') ?>
    </div> -->
<?php } ?>


<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i>
        <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error'))) ?>
    </div>
<?php } ?>