<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Siswa/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($siswa->id) && $siswa->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$siswa->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Siswa </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"nama_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Nama Siswa","value"=>$siswa->nama_siswa]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat Siswa *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"alamat_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Alamat Siswa","required"=>true,"value"=>$siswa->alamat_siswa]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kota Siswa </label>
        <div class="col-sm-10">
          <?= form_dropdown(["name"=>"kota_siswa","class"=>"form-control","type"=>"select","placeholder"=>"Kota Siswa","options"=>$options_kota_siswa,"selected"=>$siswa->kota_siswa,"value"=>$siswa->kota_siswa]) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Fakultas Siswa </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"fakultas_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Fakultas Siswa","value"=>$siswa->fakultas_siswa]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jurusan Siswa *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jurusan_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Jurusan Siswa","required"=>true,"value"=>$siswa->jurusan_siswa]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Angkatan Siswa </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"angkatan_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Angkatan Siswa","value"=>$siswa->angkatan_siswa]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ho Hp Siswa *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"ho_hp_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Ho Hp Siswa","required"=>true,"value"=>$siswa->ho_hp_siswa]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Orang Tua *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"nama_orang_tua","class"=>"form-control","type"=>"text","placeholder"=>"Nama Orang Tua","required"=>true,"value"=>$siswa->nama_orang_tua]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat Orang Tua *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"alamat_orang_tua","class"=>"form-control","type"=>"text","placeholder"=>"Alamat Orang Tua","required"=>true,"value"=>$siswa->alamat_orang_tua]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No Hp Orang Tua *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"no_hp_orang_tua","class"=>"form-control","type"=>"text","placeholder"=>"No Hp Orang Tua","required"=>true,"value"=>$siswa->no_hp_orang_tua]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Siswa')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>