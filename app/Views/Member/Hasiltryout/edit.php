<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Member/Hasiltryout/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($hasiltryout->id) && $hasiltryout->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$hasiltryout->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Siswa Id *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"siswa_id","class"=>"form-control","type"=>"text","placeholder"=>"Siswa Id","required"=>true,"value"=>$hasiltryout->siswa_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul Tryout Id *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"judul_tryout_id","class"=>"form-control","type"=>"text","placeholder"=>"Judul Tryout Id","required"=>true,"value"=>$hasiltryout->judul_tryout_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Semester *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"semester","class"=>"form-control","type"=>"text","placeholder"=>"Semester","required"=>true,"value"=>$hasiltryout->semester]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Jam Tryout *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"tanggal_jam_tryout","class"=>"form-control","type"=>"text","placeholder"=>"Tanggal Jam Tryout","required"=>true,"value"=>$hasiltryout->tanggal_jam_tryout]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Skor Tryout *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"skor_tryout","class"=>"form-control","type"=>"text","placeholder"=>"Skor Tryout","required"=>true,"value"=>$hasiltryout->skor_tryout]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Member/Hasiltryout')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    <?= form_close() ?>

  </div>

</div>


<?=$this->endSection()?>