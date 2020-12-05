<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">User</label>
      <div class="col-sm-10">
        <?= $testimoni->email ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Testimoni</label>
      <div class="col-sm-10">
        <?= $testimoni->testimoni ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Saran</label>
      <div class="col-sm-10">
        <?= $testimoni->saran ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Kritik</label>
      <div class="col-sm-10">
        <?= $testimoni->kritik ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Post Status</label>
      <div class="col-sm-10">
        <?= $testimoni->post_status ?>
      </div>
    </div>


    <div class="d-flex justify-content-center">

      <div class="btn-group" role="group">

        <a href="javascript: history.back();" class="btn btn-primary">
          <i class="fas fa-chevron-left    "></i>
          Kembali
        </a>

        <a href="<?= site_url('Admin/Testimoni/edit/'.$testimoni->id) ?>" class="btn btn-default">
          <i class="fas fa-edit    "></i>
          Edit

        </a>

      </div>

    </div>


  </div>

</div>

</div>

<?= $this->endSection() ?>