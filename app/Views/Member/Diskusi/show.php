<?= $this->extend('Layout\Member\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Judul Diskusi</label>
        <div class="col-sm-10">
          <?= $diskusi->judul_diskusi ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Parent Id</label>
        <div class="col-sm-10">
          <?= $diskusi->parent_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Tipe Diskusi</label>
        <div class="col-sm-10">
          <?= $diskusi->tipe_diskusi ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Comment</label>
        <div class="col-sm-10">
          <?= $diskusi->comment ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Gambar Soal</label>
        <div class="col-sm-10">
          <?= $diskusi->gambar_soal ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Rating Soal</label>
        <div class="col-sm-10">
          <?= $diskusi->rating_soal ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">User Id</label>
        <div class="col-sm-10">
          <?= $diskusi->user_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Publishing</label>
        <div class="col-sm-10">
          <?= $diskusi->publishing ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Member/Diskusi/edit/'.$diskusi->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
