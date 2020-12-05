<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?php if (isset($validation)): ?>
    <?=$validation->listErrors()?>
    <?php endif;?>

    <form action="<?=route_to('admin_kontak_store')?>" method="post">

      <?=csrf_field()?>

      <?php if (isset($kontak->id) && $kontak->id): ?>
      <input type="hidden" name="id" value="<?=$kontak->id?>">
      <?php endif;?>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Kontak</label>
        <div class="col-sm-10">
          <?= form_input(['class'=>'form-control','name'=>'nama_kontak','value'=>$kontak->nama_kontak,'placeholder'=>'Nama Kontak','required'=>'true'])  ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No. Telp</label>
        <div class="col-sm-10">
          <?= form_input(['class'=>'form-control','name'=>'no_hp','value'=>$kontak->no_hp,'placeholder'=>'08xxxxxxxxx','type'=>'tel','pattern'=>'[0-9]{8,14}']) ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <?= form_input(['name'=>'email','value'=>$kontak->email,'class'=>'form-control','required'=>'true','type'=>'email','placeholder'=>'username@gmail.com']) ?>
        </div>
      </div>


      <div class="d-flex justify-content-center">
        <div class="btn-group " role="group" aria-label="button group">
          <a href="<?=route_to('Admin/Kontak')?>" class="btn btn-warning"><i class="fas fa-times    "></i> Batal</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Simpan</button>
        </div>
      </div>

    </form>




  </div>

</div>


<?=$this->endSection()?>