<?= $this->extend('Layout\Admin\Main') ?>

<?= $this->section('content') ?>

<div class="card">

  <div class="card-body">

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Nama Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->nama_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Alamat Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->alamat_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Kota Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->kota_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Fakultas Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->fakultas_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Jurusan Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->jurusan_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Angkatan Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->angkatan_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Ho Hp Siswa</label>
      <div class="col-sm-10">
        <?= $siswa->ho_hp_siswa ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Nama Orang Tua</label>
      <div class="col-sm-10">
        <?= $siswa->nama_orang_tua ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">Alamat Orang Tua</label>
      <div class="col-sm-10">
        <?= $siswa->alamat_orang_tua ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 font-weight-bold">No Hp Orang Tua</label>
      <div class="col-sm-10">
        <?= $siswa->no_hp_orang_tua ?>
      </div>
    </div>


    <div class="d-flex justify-content-center">

      <div class="btn-group" role="group">

        <a href="javascript: history.back();" class="btn btn-primary">
          <i class="fas fa-chevron-left    "></i>
          Kembali
        </a>

        <a href="<?= site_url('Admin/Siswa/edit/'.$siswa->id) ?>" class="btn btn-default">
          <i class="fas fa-edit    "></i>
          Edit

        </a>

      </div>

    </div>


  </div>

</div>

</div>

<?= $this->endSection() ?>