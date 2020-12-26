<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Judul Materi</label>
        <div class="col-sm-10">
          <?= $materi->judul_materi ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Mata Kuliah</label>
        <div class="col-sm-10">
          <?= $materi->mata_kuliah_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Semester</label>
        <div class="col-sm-10">
          <?= $materi->semester ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Uraian Ringkas</label>
        <div class="col-sm-10">
          <?= $materi->uraian_ringkas ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Thumbnail</label>
        <div class="col-sm-10">
          <?= $materi->url_thumbnail ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Url Video</label>
        <div class="col-sm-10">
          <?= $materi->url_video ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">PDF File</label>
        <div class="col-sm-10">
          <?= $materi->url_pdf ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Pengajar</label>
        <div class="col-sm-10">
          <?= $materi->pengajar ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Admin/Materi/edit/'.$materi->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
