<?=$this->extend('Layout\Admin\Main')?>

<?=$this->section('content')?>

<div class="card">

  <div class="card-body">

    <div class="table-responsive">

      <div class="d-flex justify-content-end mb-2">
        <div class="btn-group" role="group" aria-label="button group">
          <a href="<?=site_url('Admin/Kontak/new')?>" class="btn btn-primary"><i class="fas fa-plus    "></i> Baru</a>
        </div>

      </div>

      <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th width="50px;">No</th>
            <th>Kontak</th>
            <th width="100px;">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>
          <tr>
            <td scope="row"><?=($key + 1)?></td>
            <td><?=$row->nama_kontak?></td>
            <td>
              <div class="btn-group" role="group" aria-label="">
                <a href="<?=site_url('Admin/Kontak/edit/' . $row->id)?>" type="button" class="btn btn-sm btn-default">
                  <i class="fas fa-edit    "></i>
                </a>
                <a href="<?=site_url('Admin/Kontak/show/' . $row->id)?>" type="button" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye    "></i>
                </a>
                <a href="#" type="button" class="btn btn-sm btn-danger">
                  <i class="fas fa-times    "></i>
                </a>
              </div>
            </td>
          </tr>
          <?php }?>

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

</div>


<?=$this->endSection()?>