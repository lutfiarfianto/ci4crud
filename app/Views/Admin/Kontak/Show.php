<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
      <div class="form-group row">
        <label class="col-sm-3 col-form-label font-weight-bold">Nama Kontak</label>
        <div class="col-sm-9">
          <?= $kontak->nama_kontak?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label font-weight-bold">No. Telp</label>
        <div class="col-sm-9">  
          <?= $kontak->no_hp ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
        <div class="col-sm-9">   
          <?= $kontak->email ?>
        </div>
      </div>

      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('Admin/Kontak/edit/'.$kontak->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>


<?= $this->endSection() ?>
