<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <?= $this->include('Admin/Lembartryout/index_siswa') ?>

    <div class="d-flex justify-content-between mb-2">
      <div>
        <?= $filter_info ?>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="<?= site_url('Admin/Siswa') ?>" class="btn btn-warning"><i class="fas fa-backward    "></i> Index
          Siswa</a>
        <button type="button" class="btn btn-primary margin-5" data-toggle="modal" data-target="#index_filter">
          <i class="fas fa-search    "></i> Filter
        </button>
        <a href="<?= site_url('Admin/Lembartryout/new') ?>" class="btn btn-success"><i
            class="fas fa-plus-circle    "></i> New</a>
      </div>
    </div>

    <?= $this->include('Admin/Lembartryout/index_filter')?>

    <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Judul Tryout</th>
            <th>Semester</th>
            <th>Tanggal Jam Tryout</th>
            <th>Skor Tryout</th>
            <th class="table-head-action text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
            <td><?=row_num($per_page,$key) ?></td>
            <td><?= $row->judul_tryout ?></td>
            <td><?= $row->semester ?></td>
            <td><?= $row->tanggal_jam_tryout ?></td>
            <td><?= $row->skor_tryout ?></td>
            <td class="d-flex justify-content-end">
              <div class="btn-group" role="group" aria-label="">
                <a href="<?=site_url('Admin/Jawabansoaltryout/session/' . id_encode($row->id))?>"
                  type="button" class="btn btn-sm btn-default">
                  Lihat Jawaban
                </a>
                <a class="d-none" title="Show" data-toggle="tooltip" href="<?=site_url('Admin/Lembartryout/show/' . $row->id)?>"
                  type="button" class="btn btn-sm btn-primary">
                  Lihat Detil
                </a>
                <a class="d-none" title="Delete" data-toggle="tooltip" href="<?=site_url('Admin/Lembartryout/delete/' . $row->id)?>"
                  type="button" class="btn btn-sm btn-danger">
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