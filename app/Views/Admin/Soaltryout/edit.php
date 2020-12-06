<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= $this->include('Admin/Soaltryout/infotryout') ?>

    <?= form_open_multipart(site_url('Admin/Soaltryout/store') ) ?>

    <?=csrf_field()?>

    <?php if (isset($soaltryout->id) && $soaltryout->id): ?>
    <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$soaltryout->id]); ?>


    <?php endif;?>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Soal *</label>
      <div class="col-sm-10">
        <?= form_textarea(["name"=>"soal","class"=>"form-control","type"=>"textarea","rows"=>3,"placeholder"=>"Soal","required"=>true,"value"=>$soaltryout->soal]) ?>
      </div>
    </div>

    <?= form_input(["name"=>"judul_tryout_id","class"=>"form-control","type"=>"hidden","placeholder"=>"Judul Tryout Id","required"=>true,"value"=>($soaltryout->judul_tryout_id?:session()->get('judul_tryout_id'))]); ?>


    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar Soal </label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_soal","id"=>"gambar_soal","type"=>"file","placeholder"=>"Gambar Soal","value"=>$soaltryout->gambar_soal]) ?>
            <label class="custom-file-label" for="gambar_soal">Choose file</label>
          </div>
          <div class="input-group-append">
            <a class="input-group-text image-popup-vertical-fit" href="<?= base_url('uploads/'.$soaltryout->gambar_soal) ?>">View</a>
          </div>
        </div>
      </div>
    </div>

    <?php if($tryout->tipe_tryout=='ganda'): ?>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Jawaban A </label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"jawaban_a","class"=>"form-control","type"=>"text","placeholder"=>"Jawaban A","value"=>$soaltryout->jawaban_a]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Jawaban B </label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"jawaban_b","class"=>"form-control","type"=>"textarea","rows"=>3,"placeholder"=>"Jawaban B","value"=>$soaltryout->jawaban_b]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Jawaban C </label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"jawaban_c","class"=>"form-control","type"=>"textarea","rows"=>3,"placeholder"=>"Jawaban C","value"=>$soaltryout->jawaban_c]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Jawaban D </label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"jawaban_d","class"=>"form-control","type"=>"textarea","rows"=>3,"placeholder"=>"Jawaban D","value"=>$soaltryout->jawaban_d]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar A </label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_a","id"=>"gambar_a","type"=>"file","placeholder"=>"Gambar A","value"=>$soaltryout->gambar_a]) ?>
            <label class="custom-file-label" for="gambar_a">Choose file</label>
          </div>
          <div class="input-group-append">
            <a class="input-group-text image-popup-vertical-fit" href="<?= base_url('uploads/'.$soaltryout->gambar_a) ?>">View</a>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar B </label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_b","id"=>"gambar_b","type"=>"file","placeholder"=>"Gambar B","value"=>$soaltryout->gambar_b]) ?>
            <label class="custom-file-label" for="gambar_b">Choose file</label>
          </div>
          <div class="input-group-append">
            <a class="input-group-text image-popup-vertical-fit" href="<?= base_url('uploads/'.$soaltryout->gambar_b) ?>">View</a>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar C </label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_c","id"=>"gambar_c","type"=>"file","placeholder"=>"Gambar C","value"=>$soaltryout->gambar_c]) ?>
            <label class="custom-file-label" for="gambar_c">Choose file</label>
          </div>
          <div class="input-group-append">
            <a class="input-group-text image-popup-vertical-fit" href="<?= base_url('uploads/'.$soaltryout->gambar_c) ?>">View</a>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar D </label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_d","id"=>"gambar_d","type"=>"file","placeholder"=>"Gambar D","value"=>$soaltryout->gambar_d]) ?>
            <label class="custom-file-label" for="gambar_d">Choose file</label>
          </div>
          <div class="input-group-append">
            <a class="input-group-text image-popup-vertical-fit" href="<?= base_url('uploads/'.$soaltryout->gambar_d) ?>">View</a>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Jawaban Soal Ganda </label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"jawaban_soal_ganda","class"=>"form-control","type"=>"select","placeholder"=>"Jawaban Soal Ganda","selected"=>$soaltryout->jawaban_soal_ganda,"options"=>$options_jawaban_soal_ganda]) ?>
      </div>
    </div>

    <?php endif;?>
    <?php if($tryout->tipe_tryout=='esai'): ?>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Jawaban Soal Esay </label>
      <div class="col-sm-10">
        <?= form_textarea(["name"=>"jawaban_soal_esay","class"=>"form-control","rows"=>5,"type"=>"textarea","placeholder"=>"Jawaban Soal Esay","value"=>$soaltryout->jawaban_soal_esay]) ?>
      </div>
    </div>

    <?php endif; ?>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Pembahasan Jawaban </label>
      <div class="col-sm-10">
        <?= form_textarea(["name"=>"pembahasan_jawaban","class"=>"form-control","rows"=>5,"type"=>"textarea","placeholder"=>"Pembahasan Jawaban","value"=>$soaltryout->pembahasan_jawaban]) ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar Pembahasan Jawaban </label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_pembahasan_jawaban","id"=>"gambar_pembahasan_jawaban","type"=>"file","placeholder"=>"Gambar Pembahasan Jawaban","value"=>$soaltryout->gambar_pembahasan_jawaban]) ?>
            <label class="custom-file-label" for="gambar_pembahasan_jawaban">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text" data-src="{data_src}">View</span>
          </div>
        </div>
      </div>
    </div>


    <div class="d-flex justify-content-center">
      <div class="btn-group " role="group" aria-label="button group">
        <a href="<?=site_url('Admin/Soaltryout')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
      </div>
    </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>