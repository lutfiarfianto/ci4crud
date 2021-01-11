<?= $this->extend('Layout\Member\Main') ?>

<?= $this->section('content') ?>

<div class="bg-light">

  <div class="row">
    <div class="col-md-8 offset-md-2">

      <div class="card rounded border border-gray bg-white my-4">

        <div class="card-body">


          <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="nav-item">
                <a class="nav-link active" href="#main" aria-controls="main" role="tab" data-toggle="tab">Siswa</a>
              </li>
              <li role="presentation" class="nav-item">
                <a class="nav-link" href="#sec" aria-controls="sec" role="tab" data-toggle="tab">Orang Tua</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-4" style="min-height:350px;">
              <div role="tabpanel" class="tab-pane active" id="main">

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Nama Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->nama_siswa ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Alamat Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->alamat_siswa ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Kota Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->kota_siswa ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Fakultas Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->fakultas_siswa ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Jurusan Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->jurusan_siswa ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Angkatan Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->angkatan_siswa ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Ho Hp Siswa</label>
                  <div class="col-sm-8">
                    <?= $profil->ho_hp_siswa ?>
                  </div>
                </div>



              </div>
              <div role="tabpanel" class="tab-pane" id="sec">

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Nama Orang Tua</label>
                  <div class="col-sm-8">
                    <?= $profil->nama_orang_tua ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Alamat Orang Tua</label>
                  <div class="col-sm-8">
                    <?= $profil->alamat_orang_tua ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">No Hp Orang Tua</label>
                  <div class="col-sm-8">
                    <?= $profil->no_hp_orang_tua ?>
                  </div>
                </div>

              </div>
            </div>
          </div>



          <div class="d-flex justify-content-center">

            <div class="btn-group" role="group">

              <a href="<?= site_url('Member/Profil/edit/'.$profil->id) ?>" class="btn btn-primary">
                <i class="fas fa-edit    "></i>
                Edit

              </a>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>


<?= $this->endSection() ?>