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
        <a href="<?= site_url('Admin/Materi/new') ?>" class="btn btn-success"><i
            class="fas fa-plus-circle    "></i> New</a>
      </div>
    </div>

    <?= $this->include('Admin/Materi/index_filter')?>

        <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Judul Materi</th>
<th>Mata Kuliah</th>
<th>Semester</th>
            <th class="table-head-action text-right" >Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
              <td><?=row_num($per_page,$key) ?></td>
              <td><?= $row->judul_materi ?></td>
<td><?= $row->mata_kuliah_id ?></td>
<td><?= $row->semester ?></td>
              <td class="d-flex justify-content-end">
                  <div class="btn-group" role="group" aria-label="">
                  <a title="Edit" data-toggle="tooltip" href="<?=site_url('Admin/Materi/edit/' . $row->id)?>" type="button" class="btn btn-sm btn-default">
                      <i class="fas fa-edit    "></i>
                  </a>
                  <a title="Show" data-toggle="tooltip" href="<?=site_url('Admin/Materi/show/' . $row->id)?>" type="button" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye    "></i>
                  </a>
                  <a title="Delete" data-toggle="tooltip" href="<?=site_url('Admin/Materi/delete/' . $row->id)?>" type="button" class="btn btn-sm btn-danger">
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
            </td>
          </tr>
        </tfoot>
      </table>
        
    </div>

    <div class="d-flex justify-content-end mt-3">
      <?=$pager->links()?>
    </div>



  </div>

</div>


<?=$this->endSection()?>