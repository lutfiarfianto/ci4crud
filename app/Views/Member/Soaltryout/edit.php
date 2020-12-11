<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Member/Soaltryout/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($soaltryout->id) && $soaltryout->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$soaltryout->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Soal *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"soal","class"=>"form-control","type"=>"text","placeholder"=>"Soal","required"=>true,"value"=>$soaltryout->soal]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul Tryout Id *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"judul_tryout_id","class"=>"form-control","type"=>"text","placeholder"=>"Judul Tryout Id","required"=>true,"value"=>$soaltryout->judul_tryout_id]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No Soal *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"no_soal","class"=>"form-control","type"=>"text","placeholder"=>"No Soal","required"=>true,"value"=>$soaltryout->no_soal]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar Soal *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"gambar_soal","class"=>"form-control","type"=>"text","placeholder"=>"Gambar Soal","required"=>true,"value"=>$soaltryout->gambar_soal]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban A *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_a","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban A","required"=>true,"value"=>$soaltryout->jawaban_a]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban B *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_b","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban B","required"=>true,"value"=>$soaltryout->jawaban_b]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban C *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_c","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban C","required"=>true,"value"=>$soaltryout->jawaban_c]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban D *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_d","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban D","required"=>true,"value"=>$soaltryout->jawaban_d]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar A *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"gambar_a","class"=>"form-control","type"=>"text","placeholder"=>"Gambar A","required"=>true,"value"=>$soaltryout->gambar_a]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar B *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"gambar_b","class"=>"form-control","type"=>"text","placeholder"=>"Gambar B","required"=>true,"value"=>$soaltryout->gambar_b]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar C *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"gambar_c","class"=>"form-control","type"=>"text","placeholder"=>"Gambar C","required"=>true,"value"=>$soaltryout->gambar_c]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar D *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"gambar_d","class"=>"form-control","type"=>"text","placeholder"=>"Gambar D","required"=>true,"value"=>$soaltryout->gambar_d]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban Soal Ganda *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_soal_ganda","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban Soal Ganda","required"=>true,"value"=>$soaltryout->jawaban_soal_ganda]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jawaban Soal Esay *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"jawaban_soal_esay","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban Soal Esay","required"=>true,"value"=>$soaltryout->jawaban_soal_esay]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pembahasan Jawaban *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"pembahasan_jawaban","class"=>"form-control","type"=>"text","placeholder"=>"Pembahasan Jawaban","required"=>true,"value"=>$soaltryout->pembahasan_jawaban]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gambar Pembahasan Jawaban *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"gambar_pembahasan_jawaban","class"=>"form-control","type"=>"text","placeholder"=>"Gambar Pembahasan Jawaban","required"=>true,"value"=>$soaltryout->gambar_pembahasan_jawaban]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Member/Soaltryout')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    <?= form_close() ?>

  </div>

</div>


<?=$this->endSection()?>