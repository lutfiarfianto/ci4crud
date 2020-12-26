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
            <?= form_open(site_url('Member/Jawabantryout/Filter'),['method'=>'get'])?>

                        <div class="form-group row">
              <label class="col-sm-4 col-form-label">Soal Tryout Id</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"soal_tryout_id","class"=>"form-control","type"=>"text","placeholder"=>"Soal Tryout Id","value"=>$table_filter->soal_tryout_id]); ?>
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

