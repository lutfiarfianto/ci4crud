<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Nama Program</label>
        <div class="col-sm-10">
          <?= $program->nama_program ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Uraian</label>
        <div class="col-sm-10">
          <?= $program->uraian ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Admin/Program/edit/'.$program->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
