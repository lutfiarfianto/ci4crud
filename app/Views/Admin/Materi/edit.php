<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Materi/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($materi->id) && $materi->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$materi->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul Materi </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"judul_materi","class"=>"form-control","type"=>"text","placeholder"=>"Judul Materi","value"=>$materi->judul_materi]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mata Kuliah </label>
        <div class="col-sm-10">
          <?= form_dropdown(["name"=>"mata_kuliah_id","class"=>"form-control","type"=>"select","placeholder"=>"Mata Kuliah","options"=>$options_mata_kuliah_id,"selected"=>$materi->mata_kuliah_id,"value"=>$materi->mata_kuliah_id]) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Semester </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"semester","class"=>"form-control","type"=>"text","placeholder"=>"Semester","value"=>$materi->semester]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Uraian Ringkas *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"uraian_ringkas","class"=>"form-control","type"=>"text","placeholder"=>"Uraian Ringkas","required"=>true,"value"=>$materi->uraian_ringkas]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Url Video </label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
  <div class="custom-file">
    <?= form_upload(["name"=>"url_video","type"=>"file","placeholder"=>"Url Video","value"=>$materi->url_video]) ?>
    <label class="custom-file-label" for="url_video" >Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" data-src="{data_src}" >View</span>
  </div>
</div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Url Pdf </label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
  <div class="custom-file">
    <?= form_upload(["name"=>"url_pdf","type"=>"file","placeholder"=>"Url Pdf","value"=>$materi->url_pdf]) ?>
    <label class="custom-file-label" for="url_pdf" >Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" data-src="{data_src}" >View</span>
  </div>
</div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pengajar *</label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"pengajar","class"=>"form-control","type"=>"text","placeholder"=>"Pengajar","required"=>true,"value"=>$materi->pengajar]); ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Materi')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>