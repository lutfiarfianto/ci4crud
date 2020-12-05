    <!-- Modal: SEARCH FILTER -->
    <div class="modal fade" id="index_filter" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
      aria-hidden="true ">
      <div class="modal-dialog" role="document ">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title text-white" id="filterModalLabel">
              <i class="fas fa-search    "></i>
              Search Filter</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true ">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open(site_url('Admin/Siswa/Filter'),['method'=>'get'])?>

                        <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nama Siswa</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"nama_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Nama Siswa","value"=>$table_filter->nama_siswa]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Kota Siswa</label>
              <div class="col-sm-8">
                <?= form_dropdown(["name"=>"kota_siswa","class"=>"form-control","type"=>"select","placeholder"=>"Kota Siswa","options"=>$options_kota_siswa,"selected"=>$table_filter->kota_siswa]) ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Fakultas Siswa</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"fakultas_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Fakultas Siswa","value"=>$table_filter->fakultas_siswa]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Angkatan Siswa</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"angkatan_siswa","class"=>"form-control","type"=>"text","placeholder"=>"Angkatan Siswa","value"=>$table_filter->angkatan_siswa]); ?>
              </div>
            </div>




            <div class="d-flex justify-content-center">
              <div class="btn-group " role="group" aria-label="button group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search    "></i> Search</button>
              </div>
            </div>


            <?= form_close() ?>
          </div>
        </div>
      </div>
    </div>

