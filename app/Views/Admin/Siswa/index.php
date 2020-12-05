<?=$this->extend('Layout\Admin\Main')?>

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
        <a href="<?= site_url('Admin/Siswa/new') ?>" class="btn btn-success"><i class="fas fa-plus-circle    "></i>
          New</a>
      </div>
    </div>

    <?= $this->include('Admin/Siswa/index_filter')?>

    <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Nama Siswa</th>
            <th>Kota Siswa</th>
            <th>Fakultas Siswa</th>
            <th>Angkatan Siswa</th>
            <th class="table-head-action text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
            <td><?=row_num($per_page,$key) ?></td>
            <td><?= $row->nama_siswa ?></td>
            <td><?= $row->kota_siswa ?></td>
            <td><?= $row->fakultas_siswa ?></td>
            <td><?= $row->angkatan_siswa ?></td>
            <td class="d-flex justify-content-end">
              <div class="btn-group" role="group" aria-label="">

                <a title="Lembar Tryout" data-toggle="tooltip" href="<?=site_url('Admin/Lembartryout/session/' . id_encode($row->id))?>" type="button"
                  class="btn btn-sm btn-success">
                  <i class="fas fa-graduation-cap    "></i>
                </a>
                <a title="Edit" data-toggle="tooltip" href="<?=site_url('Admin/Siswa/edit/' . $row->id)?>" type="button"
                  class="btn btn-sm btn-default">
                  <i class="fas fa-edit    "></i>
                </a>
                <a title="Show" data-toggle="tooltip" href="<?=site_url('Admin/Siswa/show/' . $row->id)?>" type="button"
                  class="btn btn-sm btn-primary">
                  <i class="fas fa-eye    "></i>
                </a>
                <a title="Delete" data-toggle="tooltip" href="<?=site_url('Admin/Siswa/delete/' . $row->id)?>"
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