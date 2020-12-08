<?=$this->extend('Layout\admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('admin/Jadwalkelas/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($jadwalkelas->id) && $jadwalkelas->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$jadwalkelas->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Jadwal </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"nama_jadwal","class"=>"form-control","type"=>"text","placeholder"=>"Nama Jadwal","value"=>$jadwalkelas->nama_jadwal]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Uraian </label>
        <div class="col-sm-10">
          <?= form_textarea(["name"=>"uraian","class"=>"form-control","type"=>"textarea","placeholder"=>"Uraian","rows"=>3,"value"=>$jadwalkelas->uraian]) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Jam </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"tanggal_jam","class"=>"form-control","type"=>"datetime","placeholder"=>"Tanggal Jam","value"=>$jadwalkelas->tanggal_jam]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mata Kuliah </label>
        <div class="col-sm-10">
          <?= form_dropdown(["name"=>"mata_kuliah_id","class"=>"form-control","type"=>"select","placeholder"=>"Mata Kuliah","options"=>$options_mata_kuliah_id,"selected"=>$jadwalkelas->mata_kuliah_id,"value"=>$jadwalkelas->mata_kuliah_id]) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ruang *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"ruang","class"=>"form-control","type"=>"text","placeholder"=>"Ruang","required"=>true,"value"=>$jadwalkelas->ruang]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tautan Daring *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"tautan_daring","class"=>"form-control","type"=>"text","placeholder"=>"Tautan Daring","required"=>true,"value"=>$jadwalkelas->tautan_daring]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('admin/Jadwalkelas')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    <?= form_close() ?>

  </div>

</div>


<?=$this->endSection()?>