<?=$this->extend('Layout\admin\Main')?>

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
        <a href="<?= site_url('admin/Jadwalkelas/new') ?>" class="btn btn-success"><i
            class="fas fa-plus-circle    "></i> New</a>
      </div>
    </div>

    <?= $this->include('admin/Jadwalkelas/index_filter')?>

        <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Nama Jadwal</th>
<th>Tanggal Jam</th>
<th>Mata Kuliah</th>
            <th class="table-head-action text-right" >Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
              <td><?=row_num($per_page,$key) ?></td>
              <td><?= $row->nama_jadwal ?></td>
<td><?= $row->tanggal_jam ?></td>
<td><?= $row->mata_kuliah_id ?></td>
              <td class="d-flex justify-content-end">
                  <div class="btn-group" role="group" aria-label="">
                  <a title="Edit" data-toggle="tooltip" href="<?=site_url('admin/Jadwalkelas/edit/' . $row->id)?>" type="button" class="btn btn-sm btn-default">
                      <i class="fas fa-edit    "></i>
                  </a>
                  <a title="Show" data-toggle="tooltip" href="<?=site_url('admin/Jadwalkelas/show/' . $row->id)?>" type="button" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye    "></i>
                  </a>
                  <a title="Delete" data-toggle="tooltip" href="<?=site_url('admin/Jadwalkelas/delete/' . $row->id)?>" type="button" class="btn btn-sm btn-danger">
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