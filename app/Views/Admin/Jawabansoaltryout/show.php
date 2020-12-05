<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Siswa Id</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->siswa_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Judul Tryout Id</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->judul_tryout_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Lembar Tryout Id</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->lembar_tryout_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Soal Tryout Id</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->soal_tryout_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban Pilihan</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->jawaban_pilihan ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Skor Pilihan</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->skor_pilihan ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban Esay</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->jawaban_esay ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Skor Esay</label>
        <div class="col-sm-10">
          <?= $jawabansoaltryout->skor_esay ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Admin/Jawabansoaltryout/edit/'.$jawabansoaltryout->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
