<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Lembartryout/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($lembartryout->id) && $lembartryout->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$lembartryout->id]); ?>


      <?php endif;?>

            <?= form_input(["name"=>"siswa_id","class"=>"form-control","type"=>"hidden","placeholder"=>"Siswa Id","required"=>true,"value"=>$lembartryout->siswa_id]); ?>


      <?= form_input(["name"=>"judul_tryout_id","class"=>"form-control","type"=>"hidden","placeholder"=>"Judul Tryout Id","required"=>true,"value"=>$lembartryout->judul_tryout_id]); ?>


      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Semester </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"semester","class"=>"form-control","type"=>"text","placeholder"=>"Semester","value"=>$lembartryout->semester]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Jam Tryout *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"tanggal_jam_tryout","class"=>"form-control","type"=>"date","placeholder"=>"Tanggal Jam Tryout","required"=>true,"value"=>$lembartryout->tanggal_jam_tryout]); ?>
        </div>
      </div>

      <?= form_input(["name"=>"skor_tryout","class"=>"form-control","type"=>"hidden","placeholder"=>"Skor Tryout","required"=>true,"value"=>$lembartryout->skor_tryout]); ?>



      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Lembartryout')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>