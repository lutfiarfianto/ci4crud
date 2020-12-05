<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Jawabansoaltryout/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($jawabansoaltryout->id) && $jawabansoaltryout->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$jawabansoaltryout->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Siswa Id *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"siswa_id","class"=>"form-control","type"=>"text","placeholder"=>"Siswa Id","required"=>true,"value"=>$jawabansoaltryout->siswa_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul Tryout Id *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"judul_tryout_id","class"=>"form-control","type"=>"text","placeholder"=>"Judul Tryout Id","required"=>true,"value"=>$jawabansoaltryout->judul_tryout_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Lembar Tryout Id *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"lembar_tryout_id","class"=>"form-control","type"=>"text","placeholder"=>"Lembar Tryout Id","required"=>true,"value"=>$jawabansoaltryout->lembar_tryout_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Soal Tryout Id </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"soal_tryout_id","class"=>"form-control","type"=>"text","placeholder"=>"Soal Tryout Id","value"=>$jawabansoaltryout->soal_tryout_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban Pilihan </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_pilihan","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban Pilihan","value"=>$jawabansoaltryout->jawaban_pilihan]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Skor Pilihan </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"skor_pilihan","class"=>"form-control","type"=>"text","placeholder"=>"Skor Pilihan","value"=>$jawabansoaltryout->skor_pilihan]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban Esay </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_esay","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban Esay","value"=>$jawabansoaltryout->jawaban_esay]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Skor Esay </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"skor_esay","class"=>"form-control","type"=>"text","placeholder"=>"Skor Esay","value"=>$jawabansoaltryout->skor_esay]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Jawabansoaltryout')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>