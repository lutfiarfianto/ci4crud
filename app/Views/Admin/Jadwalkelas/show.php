<?= $this->extend('Layout\admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">
  
            <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Nama Jadwal</label>
        <div class="col-sm-10">
          <?= $jadwalkelas->nama_jadwal ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Uraian</label>
        <div class="col-sm-10">
          <?= $jadwalkelas->uraian ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Tanggal Jam</label>
        <div class="col-sm-10">
          <?= $jadwalkelas->tanggal_jam ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Mata Kuliah</label>
        <div class="col-sm-10">
          <?= $jadwalkelas->mata_kuliah_id ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Ruang</label>
        <div class="col-sm-10">
          <?= $jadwalkelas->ruang ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 font-weight-bold">Tautan Daring</label>
        <div class="col-sm-10">
          <?= $jadwalkelas->tautan_daring ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
      
        <div class="btn-group" role="group">
        
          <a href="javascript: history.back();" class="btn btn-primary">
            <i class="fas fa-chevron-left    "></i>
            Kembali
          </a>

          <a href="<?= site_url('admin/Jadwalkelas/edit/'.$jadwalkelas->id) ?>" class="btn btn-default">
            <i class="fas fa-edit    "></i>
            Edit
          
          </a>
        
        </div>
      
      </div>

    
    </div>

  </div>

</div>

<?= $this->endSection() ?>
