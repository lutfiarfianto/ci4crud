<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <div class="d-flex justify-content-end mb-2">
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="<?= site_url('Admin/Tryout/new') ?>" class="btn btn-secondary"><i
            class="fas fa-plus-circle    "></i> New</a>
      </div>
    </div>

        <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Judul Tryout</th>
            <th class="table-head-action d-flex justify-content-end" >Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
              <td><?=row_num($per_page,$key) ?></td>
              <td><?= $row->judul_tryout ?></td>
              <td class="d-flex justify-content-end">
                  <div class="btn-group" role="group" aria-label="">
                  <a title="Edit Soal Tryout" data-toggle="tooltip" href="<?=site_url('Admin/Soaltryout/session/' . id_encode($row->id))?>" type="button" class="btn btn-sm btn-success ">
                      <i class="fas fa-plus    "></i>
                  </a>
                  <a title="Edit" data-toggle="tooltip" href="<?=site_url('Admin/Tryout/edit/' . $row->id)?>" type="button" class="btn btn-sm btn-default">
                      <i class="fas fa-edit    "></i>
                  </a>
                  <a title="Show" data-toggle="tooltip" href="<?=site_url('Admin/Tryout/show/' . $row->id)?>" type="button" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye    "></i>
                  </a>
                  <a title="Delete" data-toggle="tooltip" href="<?=site_url('Admin/Tryout/delete/' . $row->id)?>" type="button" class="btn btn-sm btn-danger">
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