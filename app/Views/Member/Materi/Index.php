<?=$this->extend('Layout\Member\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

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

    <?= $this->include('Member/Materi/index_filter')?>

    <div class="row">

      <?php foreach ($rows as $key => $row) {?>

      <div class="col-md-3 col-sm-6 mb-3">
        <div class="row">
          <div class="col-md-12 mb-2">

            <a title="Show" data-toggle="tooltip" href="<?=site_url('Member/Materi/show/' . $row->id)?>">
              <img src="<?= base_url('uploads/'. $row->url_thumbnail) ?>" class="img-fluid">
            </a>

          </div>
          <div class="col-md-12">
            <h5>
              <?= $row->judul_materi ?>
            </h5>
            <div>
              <?= $row->nama_mata_kuliah ?>
            </div>

          </div>
        </div>

      </div>
      <?php } ?>
    </div>

    <div class="d-flex justify-content-end mt-3">
      <?=$pager->links()?>
    </div>



  </div>

</div>


<?=$this->endSection()?>