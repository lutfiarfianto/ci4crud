<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Testimoni/store') ) ?>

    <?=csrf_field()?>

    <?php if (isset($testimoni->id) && $testimoni->id): ?>
    <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$testimoni->id]); ?>

    <?php endif;?>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">User </label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"user_id","class"=>"form-control","type"=>"select","placeholder"=>"User Id","options"=>$options_user_id,"selected"=>$testimoni->user_id,"value"=>$testimoni->user_id]) ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Testimoni *</label>
      <div class="col-sm-10">
        <?= form_input(["name"=>"testimoni","class"=>"form-control","type"=>"text","placeholder"=>"Testimoni","required"=>1,"value"=>$testimoni->testimoni]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Saran </label>
      <div class="col-sm-10">
        <?= form_textarea(["name"=>"saran","class"=>"form-control","rows"=>"3","placeholder"=>"Saran","value"=>$testimoni->saran]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Kritik </label>
      <div class="col-sm-10">
        <?= form_textarea(["name"=>"kritik","class"=>"form-control","rows"=>"3","placeholder"=>"Kritik","value"=>$testimoni->kritik]); ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Post Status </label>
      <div class="col-sm-10">
        <?= form_dropdown(["name"=>"post_status","class"=>"form-control","type"=>"select","placeholder"=>"Post Status","value"=>$testimoni->post_status,"options"=>$options_post_status,"selected"=>$testimoni->post_status]) ?>
      </div>
    </div>


    <div class="d-flex justify-content-center">
      <div class="btn-group " role="group" aria-label="button group">
        <a href="<?=site_url('Admin/Testimoni')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
      </div>
    </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>