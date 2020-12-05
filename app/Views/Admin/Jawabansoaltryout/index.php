<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <div class="row">
      <div class="col">
        <?= $this->include('Admin/Jawabansoaltryout/index_tryout') ?>
      </div>
      <div class="col">
        <?= $this->include('Admin/Jawabansoaltryout/index_siswa') ?>
      </div>
    </div>

    <div class="d-flex justify-content-between mb-2">
      <div>
        <?= $filter_info ?>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="<?= site_url('Admin/Lembartryout/') ?>" class="btn btn-warning">
          <i class="fas fa-backward    "></i> Lembar Tryout</a>
        <button type="button" class="btn btn-primary margin-5" data-toggle="modal" data-target="#index_filter">
          <i class="fas fa-search    "></i> Filter
        </button>
      </div>
    </div>

    <?= $this->include('Admin/Jawabansoaltryout/index_filter')?>

    <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Soal Tryout Id</th>
            <?php if ($tryout->tipe_tryout=='ganda'): ?>
            <th>Jawaban Pilihan</th>
            <th>Skor Pilihan</th>
            <?php endif; ?>
            <?php if ($tryout->tipe_tryout=='esai'): ?>
            <th>Jawaban Esay</th>
            <th>Skor Esay</th>
            <?php endif; ?>
            <th class="d-none table-head-action text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
            <td><?=row_num($per_page,$key) ?></td>
            <td><?= $row->soal ?></td>
            <?php if ($tryout->tipe_tryout=='ganda'): ?>
            <td><?= $row->jawaban_pilihan ?></td>
            <td><?= $row->skor_pilihan ?></td>
            <?php endif; ?>
            <?php if ($tryout->tipe_tryout=='esai'): ?>
            <td><?= $row->jawaban_esay ?></td>
            <td><?= $row->skor_esay ?></td>
            <?php endif; ?>
            <td class="d-none d-flex justify-content-end">
              <div class="btn-group" role="group" aria-label="">
                <a title="Edit" data-toggle="tooltip" href="<?=site_url('Admin/Jawabansoaltryout/edit/' . $row->id)?>"
                  type="button" class="btn btn-sm btn-default">
                  <i class="fas fa-edit    "></i>
                </a>
                <a title="Show" data-toggle="tooltip" href="<?=site_url('Admin/Jawabansoaltryout/show/' . $row->id)?>"
                  type="button" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye    "></i>
                </a>
                <a title="Delete" data-toggle="tooltip"
                  href="<?=site_url('Admin/Jawabansoaltryout/delete/' . $row->id)?>" type="button"
                  class="btn btn-sm btn-danger">
                  <i class="fas fa-times    "></i>
                </a>
              </div>

            </td>
          </tr>

          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="80">
              <div class="d-flex justify-content-end">
                <?=$pager->links()?>
              </div>
            </td>
          </tr>
        </tfoot>
      </table>

    </div>


  </div>

</div>


<?=$this->endSection()?>