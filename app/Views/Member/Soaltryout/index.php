<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>


<?= $this->include('Member/Soaltryout/index_filter')?>


<div class="card bg-light">
  <?= form_open('Member/Jawabantryout/store') ?>
  <?= form_hidden('lembar_tryout_id',$lembar_id) ?>
  <?= form_hidden('judul_tryout_id',$tryout_id) ?>


  <?= csrf_field() ?>

  <div class="card-body">

    <div class="mb-2">
      <div class="row">
        <div class="col-md-8 offset-md-2 d-flex justify-content-between ">
          <div>
            <?= $filter_info ?>
          </div>
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary margin-5" data-toggle="modal" data-target="#index_filter">
              <i class="fas fa-search    "></i> Filter
            </button>
          </div>
        </div>
      </div>
    </div>


    <?php foreach ($rows as $key => $row) { ?>

    <div class="card">
      <div class="card-body ">
        <div class="card-text">

          <div class="row">

            <div class="col-md-8 offset-md-2 group-soal">
              <!-- soal -->
              <div class="row ">
                <div class="col-md-12">
                  <div class="text-soal">
                    <?=row_num($per_page,$key) ?>. <?= $row->soal ?>
                    <?php if($row->gambar_soal):?>
                    <p><img src="<?= base_url('uploads/'.$row->gambar_soal)?>" class="img-fluid" ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!--  jawaban A -->
              <?php $opsi = ['a','b','c','d']; ?>
              <?php foreach ($opsi as $i => $opsi_item ) : ?>
              <?php $opsi_gambar = "gambar_".$opsi_item;?>
              <?php $opsi_jawaban = "jawaban_".$opsi_item;?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check custom-group">
                    <label class="form-check-label ">
                      <input type="radio" class="form-check-input" name="jawaban_soal_id[<?= $row->id ?>]"
                        id="jawaban_soal_<?= $row->id ?>" value="<?=$opsi_item ?>">
                      <div class="custom-text">
                        <?php if($row->$opsi_gambar):?>
                        <p><img src="<?= base_url('uploads/'. $row->$opsi_gambar) ?>" class="img-fluid " alt=""></p>
                        <?php endif; ?>
                        <?= $row->$opsi_jawaban ?>
                      </div>
                    </label>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </div>
    </div>


    <?php } ?>

  </div>

  <div class="container mt-3">

    <div class="row">
      <div class="col-md-8 offset-md-2 d-flex justify-content-center mb-3">

        <div class="btn-group" role="group" aria-label="">
          <a href="javascript:history.back();" class="btn btn-sm btn-warning"><i
              class="fas fa-chevron-circle-left mr-1   "></i> Kembali</a>
          <button class="btn btn-sm btn-primary">Kirim <i class="fas fa-paper-plane ml-1   "></i></button>
        </div>

      </div>
    </div>

  </div>



</div>

<?= form_close() ?>
</div>


<?=$this->endSection()?>