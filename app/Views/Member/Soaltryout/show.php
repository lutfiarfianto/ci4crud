<?= $this->extend('Layout\Member\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Soal</label>
        <div class="col-sm-10">
          <?= $soaltryout->soal ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Judul Tryout Id</label>
        <div class="col-sm-10">
          <?= $soaltryout->judul_tryout_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">No Soal</label>
        <div class="col-sm-10">
          <?= $soaltryout->no_soal ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar Soal</label>
        <div class="col-sm-10">
          <?= $soaltryout->gambar_soal ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban A</label>
        <div class="col-sm-10">
          <?= $soaltryout->jawaban_a ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban B</label>
        <div class="col-sm-10">
          <?= $soaltryout->jawaban_b ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban C</label>
        <div class="col-sm-10">
          <?= $soaltryout->jawaban_c ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban D</label>
        <div class="col-sm-10">
          <?= $soaltryout->jawaban_d ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar A</label>
        <div class="col-sm-10">
          <?= $soaltryout->gambar_a ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar B</label>
        <div class="col-sm-10">
          <?= $soaltryout->gambar_b ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar C</label>
        <div class="col-sm-10">
          <?= $soaltryout->gambar_c ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar D</label>
        <div class="col-sm-10">
          <?= $soaltryout->gambar_d ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban Soal Ganda</label>
        <div class="col-sm-10">
          <?= $soaltryout->jawaban_soal_ganda ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Jawaban Soal Esay</label>
        <div class="col-sm-10">
          <?= $soaltryout->jawaban_soal_esay ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Pembahasan Jawaban</label>
        <div class="col-sm-10">
          <?= $soaltryout->pembahasan_jawaban ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar Pembahasan Jawaban</label>
        <div class="col-sm-10">
          <?= $soaltryout->gambar_pembahasan_jawaban ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Member/Soaltryout/edit/'.$soaltryout->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
