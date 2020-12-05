<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Diskusi/store') ) ?>

    <?=csrf_field()?>

    <?php if (isset($diskusi->id) && $diskusi->id): ?>
    <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$diskusi->id]); ?>


    <?php endif;?>

    <div class="form-group row d-hide">
      <label class="col-sm-2 col-form-label">Parent Id *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"parent_id","class"=>"form-control","type"=>"text","placeholder"=>"Parent Id","required"=>true,"value"=>$diskusi->parent_id]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Judul Diskusi *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"judul_diskusi","class"=>"form-control","type"=>"text","placeholder"=>"Judul Diskusi","required"=>true,"value"=>$diskusi->judul_diskusi]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Comment *</label>
      <div class="col-sm-10">
        <?= form_textarea(["name"=>"comment","class"=>"form-control","type"=>"textarea","placeholder"=>"Comment","required"=>true,"value"=>$diskusi->comment]) ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar Soal *</label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="custom-file">
            <?= form_upload(["name"=>"gambar_soal", "id"=>"gambar_soal","type"=>"file","placeholder"=>"Gambar Soal","required"=>true,"value"=>$diskusi->gambar_soal]) ?>
            <label class="custom-file-label" for="gambar_soal">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text" data-src="{data_src}">View</span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Rating Soal *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"rating_soal","class"=>"form-control","type"=>"number","placeholder"=>"Rating Soal","required"=>true,"value"=>$diskusi->rating_soal]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">User Id *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"user_id","class"=>"form-control","type"=>"text","placeholder"=>"User Id","required"=>true,"value"=>$diskusi->user_id]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Publishing *</label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"publishing","class"=>"form-control","type"=>"select","placeholder"=>"Publishing","required"=>true,"value"=>$diskusi->publishing,"options"=>$options_publishing]) ?>
      </div>
    </div>


    <div class="d-flex justify-content-center">
      <div class="btn-group " role="group" aria-label="button group">
        <a href="<?=site_url('Admin/Diskusi')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
      </div>
    </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>