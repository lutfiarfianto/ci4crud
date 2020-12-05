<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <?= form_open(site_url('Admin/Program/store') ) ?>

      <?=csrf_field()?>

      <?php if (isset($program->id) && $program->id): ?>
            <?= form_input(["name"=>"id","class"=>"form-control","type"=>"hidden","placeholder"=>"Id","required"=>true,"value"=>$program->id]); ?>


      <?php endif;?>

            <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Program </label>
        <div class="col-sm-10">
          <?= form_input(["name"=>"nama_program","class"=>"form-control","type"=>"text","placeholder"=>"Nama Program","value"=>$program->nama_program]); ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Uraian </label>
        <div class="col-sm-10">
          <?= form_textarea(["name"=>"uraian","class"=>"form-control","type"=>"text","rows"=>3,"placeholder"=>"Uraian","value"=>$program->uraian]) ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Program')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Cancel</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Save</button>
        </div>
      </div>

    </form>

  </div>

</div>


<?=$this->endSection()?>