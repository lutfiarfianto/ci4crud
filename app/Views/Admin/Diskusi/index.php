<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <div class="d-flex justify-content-end mb-2">
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="<?= site_url('Admin/Diskusi/new') ?>" class="btn btn-secondary"><i
            class="fas fa-plus-circle    "></i> New</a>
      </div>
    </div>

        <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Judul Diskusi</th>
<th>Gambar Soal</th>
<th>User Id</th>
<th>Publishing</th>
            <th class="table-head-action" >Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
              <td><?=row_num($per_page,$key) ?></td>
              <td><?= $row->judul_diskusi ?></td>
<td><?= $row->gambar_soal ?></td>
<td><?= $row->user_id ?></td>
<td><?= $row->publishing ?></td>
              <td>
                  <div class="btn-group" role="group" aria-label="">
                  <a href="<?=site_url('Admin/Diskusi/edit/' . $row->id)?>" type="button" class="btn btn-sm btn-default">
                      <i class="fas fa-edit    "></i>
                  </a>
                  <a href="<?=site_url('Admin/Diskusi/show/' . $row->id)?>" type="button" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye    "></i>
                  </a>
                  <a href="<?=site_url('Admin/Diskusi/delete/' . $row->id)?>" type="button" class="btn btn-sm btn-danger">
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