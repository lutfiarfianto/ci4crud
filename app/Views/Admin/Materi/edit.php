<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open_multipart(site_url('Admin/Materi/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($materi->id) && $materi->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$materi->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul Materi *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"judul_materi","class"=>"form-control","type"=>"text","placeholder"=>"Judul Materi","required"=>true,"value"=>$materi->judul_materi]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mata Kuliah </label>
        <div class="col-sm-10">
          <?= form_dropdown(["name"=>"mata_kuliah_id","class"=>"form-control","type"=>"select","placeholder"=>"Mata Kuliah","value"=>$materi->mata_kuliah_id,"options"=>$options_mata_kuliah_id,"selected"=>$materi->mata_kuliah_id]) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Semester *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"semester","class"=>"form-control","type"=>"text","placeholder"=>"Semester","required"=>true,"value"=>$materi->semester]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Uraian Ringkas </label>
        <div class="col-sm-10">
          <?= form_textarea(["name"=>"uraian_ringkas","class"=>"form-control","type"=>"text","placeholder"=>"Uraian Ringkas","rows"=>3,"value"=>$materi->uraian_ringkas]) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Thumbnail </label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
  <div class="custom-file">
    <?= form_upload(["name"=>"url_thumbnail","id"=>"url_thumbnail","type"=>"file","placeholder"=>"Thumbnail","value"=>$materi->url_thumbnail]) ?>
    <label class="custom-file-label" for="url_thumbnail" >Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" data-src="<?= $materi->url_thumbnail ?>" >View</span>
  </div>
</div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Url Video </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"url_video","class"=>"form-control","type"=>"text","placeholder"=>"Url Video","value"=>$materi->url_video]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">PDF File </label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
  <div class="custom-file">
    <?= form_upload(["name"=>"url_pdf","id"=>"url_pdf","type"=>"file","placeholder"=>"PDF File","value"=>$materi->url_pdf]) ?>
    <label class="custom-file-label" for="url_pdf" >Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" data-src="<?= $materi->url_pdf ?>" >View</span>
  </div>
</div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pengajar </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"pengajar","class"=>"form-control","type"=>"text","placeholder"=>"Pengajar","value"=>$materi->pengajar]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Materi')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    <?= form_close() ?>

  </div>

</div>


<?=$this->endSection()?>