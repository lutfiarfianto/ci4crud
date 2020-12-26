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

    <div class="card bg-dark text-white">
      <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
      <img src="..." class="card-img-top" alt="...">
      <div class="card-img-overlay">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="btn btn-primary">Card button</a>
      </div>
    </div>


    <div class="table-responsive">

      <table class="table table-sm table-striped ">
        <thead class="thead-dark">
          <tr>
            <th class="table-head-number">No</th>
            <th>Judul Materi</th>
            <th>Mata Kuliah</th>
            <th>Semester</th>
            <th class="table-head-action text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $key => $row) {?>

          <tr>
            <td><?=row_num($per_page,$key) ?></td>
            <td><?= $row->judul_materi ?></td>
            <td><?= $row->nama_mata_kuliah ?></td>
            <td><?= $row->semester ?></td>
            <td class="d-flex justify-content-end">
              <div class="btn-group" role="group" aria-label="">
                <a title="Show" data-toggle="tooltip" href="<?=site_url('Member/Materi/show/' . $row->id)?>"
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