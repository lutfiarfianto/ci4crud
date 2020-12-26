<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>


<?= $this->include('Member/Soaltryout/index_filter')?>


<div class="card">

  <div class="card-body">
    <div class="row">
      <div class="col-md-12">

      </div>
    </div>


    <div class="d-flex justify-content-between mb-2">
      <div>
        <?= $filter_info ?>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary margin-5" data-toggle="modal" data-target="#index_filter">
          <i class="fas fa-search    "></i> Filter
        </button>
      </div>
    </div>


    <?php foreach ($rows as $key => $row) { ?>

    <div class="card">
      <div class="card-body">
        <p class="card-text">

          <div class="row">
            <div class="col-num">
              <?=row_num($per_page,$key) ?>
            </div>
            <div class="col-md-8">
              <!-- soal -->
              <div class="row">
                <div class="col-md-12">
                  <?php if($row->gambar_soal):?>
                  <p><img src="<?= base_url('uploads/'.$row->gambar_soal)?>" class="img-fluid" ?></p>
                  <?php endif; ?>
                  <?= $row->soal ?>
                </div>
              </div>
              <!--  jawaban A~D -->
              <?php $opsi = ['a','b','c','d']; ?>
              <?php foreach ($opsi as $i => $opsi_item ) : ?>
              <?php $opsi_gambar = "gambar_".$opsi_item;?>
              <?php $opsi_jawaban = "jawaban_".$opsi_item;?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check">
                    <label class="form-check-label <?php 
                                if($opsi_item==$row->jawaban_soal_ganda && $opsi_item==$row->jawaban_pilihan) echo 'bg-success';
                                elseif($opsi_item!=$row->jawaban_soal_ganda && $opsi_item==$row->jawaban_pilihan) echo 'bg-danger';

                                
                                ?>  ">
                      <i class="far <?php 
                                  if($opsi_item==$row->jawaban_soal_ganda && $opsi_item==$row->jawaban_pilihan) echo 'fa-check-circle';
                                  elseif($opsi_item==$row->jawaban_pilihan&&$opsi_item!=$row->jawaban_soal_ganda) echo 'fa-times-circle';
                                  else echo 'fa-circle';
                                  ?>    "></i>
                      <?php if($row->$opsi_gambar):?>
                      <p><img src="<?= base_url('uploads/'. $row->$opsi_gambar) ?>" class="img-fluid " alt=""></p>
                      <?php endif; ?>
                      <?= $row->$opsi_jawaban ?>
                    </label>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>
              <div class="row">
                <div class="col-md-12">
                  <span class="badge badge-pill badge-primary mt-3">
                    Jawaban Benar: <?= $row->jawaban_soal_ganda ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">

                  <div class="card bg-light my-3">
                    <div class="card-body">
                      <h5 class="badge badge-success">Pembahasan</h5>
                      <p class="card-text">
                        <?= $row->gambar_pembahasan_jawaban?'<div><img src="'.base_url($row->gambar_pembahasan_jawaban).'" class="img-fluid" ></div>':'' ?>
                        <?= $row->pembahasan_jawaban ?>
                      </p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </p>
      </div>
    </div>


    <?php } ?>

  </div>

  <div class="container my-3">

    <div class="row">
      <div class="col-md-6">

        <div class="btn-group" role="group" aria-label="">
          <a href="<?= site_url('/Member/Hasiltryout') ?>" class="btn btn-sm btn-warning"><i
              class="fas fa-chevron-circle-left mr-1   "></i> Selesai</a>
        </div>

      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?=$this->endSection()?>