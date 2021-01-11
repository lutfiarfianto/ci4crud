<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?=$this->include('Member/Tryout/index_filter')?>

    <div class="">

      <div class="row">
        <div class="col-12">

          <div class="d-flex justify-content-between mb-2">
            <div>
              <?=$filter_info?>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-primary margin-5" data-toggle="modal" data-target="#index_filter">
                <i class="fas fa-search    "></i> Filter
              </button>
            </div>
          </div>

        </div>
      </div>


      <div class="row">
        <?php foreach ($rows as $key => $row): ?>

        <div class="col-md-2 col-sm-4 col-6 mb-4">

          <img src="<?=base_url('uploads/' . $row->url_thumbnail)?>" alt="img-thumbnail" class="img-fluid mb-2">

          <h5><?=word_limiter($row->judul_tryout, 6)?></h5>

          <div class="badge badge-success"><?=$row->nama_mata_kuliah?></div>

          <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Button group">
            <a title="Detail" data-toggle="tooltip" href="<?=site_url('Member/Tryout/show/' . $row->id)?>" type="button"
              class="btn btn-sm btn-primary">
              Intro
            </a>
            <a title="Start" data-toggle="tooltip"
              href="<?=site_url('Member/Soaltryout/session/' . id_encode($row->id))?>" type="button"
              class="btn btn-sm btn-danger">
              Mulai
            </a>
          </div>

        </div>

        <?php endforeach;?>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <?=$pager->links()?>
        </div>
      </div>
    </div>

  </div>

</div>


<?=$this->endSection()?>