<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>

<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-md-8 offset-md-2 pt-4">


      <div class="card border border-gray rounded bg-white">

        <div class="card-body">

          <h4>Data Siswa</h4>

          <?php if (isset($validation)): ?>
          <?=$validation->listErrors()?>
          <?php endif;?>

          <?= form_open(site_url('Member/Profil/store') ) ?>

          <?=csrf_field()?>

          <?php if (isset($profil->id) && $profil->id): ?>
          <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$profil->id]); ?>


          <?php endif;?>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"nama_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Nama Siswa","required"=>true,"value"=>$profil->nama_siswa]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Alamat Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"alamat_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Alamat Siswa","required"=>true,"value"=>$profil->alamat_siswa]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Kota Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"kota_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Kota Siswa","required"=>true,"value"=>$profil->kota_siswa]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Fakultas Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"fakultas_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Fakultas Siswa","required"=>true,"value"=>$profil->fakultas_siswa]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jurusan Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"jurusan_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Jurusan Siswa","required"=>true,"value"=>$profil->jurusan_siswa]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Angkatan Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"angkatan_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Angkatan Siswa","required"=>true,"value"=>$profil->angkatan_siswa]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Ho Hp Siswa *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"ho_hp_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Ho Hp Siswa","required"=>true,"value"=>$profil->ho_hp_siswa]); ?>
            </div>
          </div>

          <h4>Data Orang Tua/Wali</h4>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama Orang Tua *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"nama_orang_tua","class"=>"form-control","type"=>"text","placeholder"=>"Nama Orang Tua","required"=>true,"value"=>$profil->nama_orang_tua]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Alamat Orang Tua </label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"alamat_orang_tua","class"=>"form-control","type"=>"text","placeholder"=>"Alamat Orang Tua","value"=>$profil->alamat_orang_tua]); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">No Hp Orang Tua *</label>
            <div class="col-sm-8">
              <?= form_input(["name"=>"no_hp_orang_tua","class"=>"form-control","type"=>"text","placeholder"=>"No Hp Orang Tua","required"=>true,"value"=>$profil->no_hp_orang_tua]); ?>
            </div>
          </div>


          <div class="d-flex justify-content-center">
            <div class="btn-group " role="group" aria-label="button group">
              <a href="<?=site_url('Member/Profil')?>" class="btn btn-warning"><i class="fas fa-times    "></i>&nbsp; Batal</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i>&nbsp;  Simpan</button>
            </div>
          </div>

          <?= form_close() ?>

        </div>

      </div>

    </div>
  </div>
</div>



<?=$this->endSection()?>