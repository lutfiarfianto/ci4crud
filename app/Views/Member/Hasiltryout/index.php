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

    <?= $this->include('Member/Hasiltryout/index_filter')?>

    <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Judul Tryout</th>
            <th>Skor Tryout</th>
            <th class="table-head-action text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
            <td><?=row_num($per_page,$key) ?></td>
            <td><?= $row->judul_tryout ?></td>
            <td><?= $row->skor_tryout ?></td>
            <td class="d-flex justify-content-end">
              <div class="btn-group" role="group" aria-label="">
                <a title="Show" data-toggle="tooltip" href="<?=site_url('Member/Hasiltryout/skor/' . $row->id)?>"
                  type="button" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye    "></i>
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