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
            <?= form_open(site_url('Admin/Testimoni/Filter'),['method'=>'get'])?>

            <div class="form-group row">
              <label class="col-sm-4 col-form-label">User</label>
              <div class="col-sm-8">
                <?= form_dropdown(["name"=>"user_id","class"=>"form-control","type"=>"select","placeholder"=>"User Id","options"=>$options_user_id,"selected"=>$table_filter->user_id]) ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Testimoni</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"testimoni","class"=>"form-control","type"=>"text","placeholder"=>"Testimoni","value"=>$table_filter->testimoni]); ?>
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