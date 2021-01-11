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
            <?= form_open(site_url('Member/Diskusi/Filter'),['method'=>'get'])?>

                        <div class="form-group row">
              <label class="col-sm-4 col-form-label">Judul Diskusi</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"judul_diskusi","class"=>"form-control","type"=>"text","placeholder"=>"Judul Diskusi","value"=>$table_filter->judul_diskusi]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Parent Id</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"parent_id","class"=>"form-control","type"=>"text","placeholder"=>"Parent Id","value"=>$table_filter->parent_id]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Tipe Diskusi</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"tipe_diskusi","class"=>"form-control","type"=>"text","placeholder"=>"Tipe Diskusi","value"=>$table_filter->tipe_diskusi]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Comment</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"comment","class"=>"form-control","type"=>"text","placeholder"=>"Comment","value"=>$table_filter->comment]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Gambar Soal</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"gambar_soal","class"=>"form-control","type"=>"text","placeholder"=>"Gambar Soal","value"=>$table_filter->gambar_soal]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Rating Soal</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"rating_soal","class"=>"form-control","type"=>"text","placeholder"=>"Rating Soal","value"=>$table_filter->rating_soal]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">User Id</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"user_id","class"=>"form-control","type"=>"text","placeholder"=>"User Id","value"=>$table_filter->user_id]); ?>
              </div>
            </div>



            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Publishing</label>
              <div class="col-sm-8">
                <?= form_input(["name"=>"publishing","class"=>"form-control","type"=>"text","placeholder"=>"Publishing","value"=>$table_filter->publishing]); ?>
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

