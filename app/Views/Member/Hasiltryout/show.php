<?= $this->extend('Layout\Member\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Siswa Id</label>
        <div class="col-sm-10">
          <?= $hasiltryout->siswa_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Judul Tryout Id</label>
        <div class="col-sm-10">
          <?= $hasiltryout->judul_tryout_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Semester</label>
        <div class="col-sm-10">
          <?= $hasiltryout->semester ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Tanggal Jam Tryout</label>
        <div class="col-sm-10">
          <?= $hasiltryout->tanggal_jam_tryout ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Skor Tryout</label>
        <div class="col-sm-10">
          <?= $hasiltryout->skor_tryout ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Member/Hasiltryout/edit/'.$hasiltryout->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
