<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open_multipart(site_url('Admin/Tryout/store') ) ?>

    <?=csrf_field()?>

    <?php if (isset($tryout->id) && $tryout->id): ?>
    <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$tryout->id]); ?>


    <?php endif;?>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Judul Tryout *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"judul_tryout","class"=>"form-control","type"=>"text","placeholder"=>"Judul Tryout","required"=>true,"value"=>$tryout->judul_tryout]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Thumbnail Tryout *</label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"url_thumbnail","id"=>"url_thumbnail","type"=>"file","placeholder"=>"Thumbnail","accept"=>"image/*"]) ?>
            <label class="custom-file-label" for="url_thumbnail">Choose file</label>
          </div>
          <?php if( $tryout->url_thumbnail ) : ?>
          <div class="input-group-append">
            <a class="input-group-text image-popup-vertical-fit"
              href="<?= base_url('uploads/'.$tryout->url_thumbnail) ?>">View</a>
          </div>
          <?php endif; ?>
        </div>

      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Waktu Tryout *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"waktu_tryout","class"=>"form-control","type"=>"number","placeholder"=>"Waktu Tryout","required"=>true,"value"=>$tryout->waktu_tryout]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Semester *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"semester","class"=>"form-control","type"=>"number","placeholder"=>"Semester","required"=>true,"value"=>$tryout->semester]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Mata Kuliah *</label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"mata_kuliah_id","class"=>"form-control","type"=>"select","placeholder"=>"Mata Kuliah","required"=>true,"selected"=>$tryout->mata_kuliah_id,"options"=>$options_mata_kuliah_id]) ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Status Tryout *</label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"status_tryout","class"=>"form-control","type"=>"select","placeholder"=>"Status Tryout","required"=>true,"value"=>$tryout->status_tryout,"options"=>$options_status_tryout]) ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tipe Tryout *</label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"tipe_tryout","class"=>"form-control","type"=>"select","placeholder"=>"Tipe Tryout","required"=>true,"value"=>$tryout->tipe_tryout,"options"=>$options_tipe_tryout]) ?>
      </div>
    </div>


    <div class="d-flex justify-content-center">
      <div class="btn-group " role="group" aria-label="button group">
        <a href="<?=site_url('Admin/Tryout')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
      </div>
    </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>