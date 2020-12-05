<div class="alert alert-info" role="alert">
      
      <div class="row">
        <div class="col-md-2">
        <strong>Tema Soal:</strong>  
        </div>
        <div class="col-md-10">
        <?= $tryout->judul_tryout ?>  
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        <strong>Waktu</strong>
        </div>
        <div class="col-md-10">
        <?= $tryout->waktu_tryout ?> menit
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        <strong>Jenis Tryout</strong>
        </div>
        <div class="col-md-10">
        <?= $tryout->tipetryout ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        <strong>Semester</strong>
        </div>
        <div class="col-md-10">
        <?= $tryout->semester ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        <strong>Mata Kuliah</strong>
        </div>
        <div class="col-md-10">
        <?= $tryout->matakuliah->nama_mata_kuliah ?>
        </div>
      </div>
    </div>

