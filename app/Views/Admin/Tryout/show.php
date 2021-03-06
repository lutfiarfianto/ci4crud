<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Judul Tryout</label>
      <div class="col-sm-10">
        <?= $tryout->judul_tryout ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Waktu Tryout</label>
      <div class="col-sm-10">
        <?= $tryout->waktu_tryout ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Semester</label>
      <div class="col-sm-10">
        <?= $tryout->semester ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Mata Kuliah</label>
      <div class="col-sm-10">
        <?= $tryout->mata_kuliah_id ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Status Tryout</label>
      <div class="col-sm-10">
        <?= $tryout->status_tryout ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Tipe Tryout</label>
      <div class="col-sm-10">
        <?= $tryout->tipe_tryout ?>
      </div>
    </div>


    <div class="d-flex justify-content-center">

      <div class="btn-group" role="group">

        <a href="javascript: history.back();" class="btn btn-primary">
          <i class="fas fa-chevron-left    "></i>
          Kembali
        </a>

        <a href="<?= site_url('Admin/Tryout/edit/'.$tryout->id) ?>" class="btn btn-default">
          <i class="fas fa-edit    "></i>
          Edit

        </a>

      </div>

    </div>


  </div>

</div>

</div>

<?= $this->endSection() ?>