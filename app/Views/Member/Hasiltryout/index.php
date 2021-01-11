<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>

<?= $this->include('Member/Hasiltryout/index_filter')?>

<div class="card">

  <div class="card-body">

    <div class="row">

      <div class="col-12">

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

      </div>

      <?php foreach ($rows as $key => $row): ?>
      <div class="col-md-2 col-sm-4 col-6 mb-4">

        <img src="<?=base_url('uploads/' . $row->url_thumbnail)?>" alt="img-thumbnail" class="img-fluid mb-2">

        <h5><?=word_limiter($row->judul_tryout, 6)?></h5>

        <div class="badge badge-success">Skor: <?=$row->skor_tryout ?></div>

        <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Button group">
          <a title="Detail" data-toggle="tooltip" href="<?=site_url('Member/Tryout/show/' . $row->id)?>" type="button"
            class="btn btn-sm btn-warning">
            Info
          </a>
          <a title="Start" data-toggle="tooltip" href="<?=site_url('Member/Hasiltryout/skor/' . ($row->id))?>"
            type="button" class="btn btn-sm btn-success">
            Hasil
          </a>
        </div>

      </div>

      <?php endforeach; ?>

    </div>
  </div>

  <div class="d-flex justify-content-end mt-3">
    <?=$pager->links()?>
  </div>

</div>



<?=$this->endSection()?>