<?= $this->extend('Layout\Member\Main') ?>

<?= $this->section('content') ?>

<div class="container">

  <div class="row  my-4">
    <div class="col-md-8 ">

      <!-- video -->
      <div id="video-sticky">

        <div class="iframe-embed-wrapper iframe-embed-responsive-16by9">
          <iframe class="iframe-embed" src="<?= $url_video ?>"></iframe>
        </div>

      </div>

      <div id="after-video" class="after-sticky">

        <h5 class="mt-3"><?= $materi->judul_materi ?></h5>

        <span class="badge badge-primary"><?= ucwords( $materi->nama_mata_kuliah) ?></span>

        <div class="mb-4">
          <?= $materi->uraian_ringkas ?>
        </div>

        <!-- comment -->

        <p>
          <button class="btn btn-primary btn-sm" data-toggle="collapse" href="#commentForm" aria-expanded="false"
            aria-controls="commentForm">
            Diskusi
          </button>
        </p>
        <div class="collapse mb-4" id="commentForm">

          <?= form_open(site_url('/Member/Materi/Postcomment')) ?>
          <?= form_hidden('post_id', $materi->id) ?>

          <div class="form-group">
            <label for="judul_diskusi">Subject</label>
            <input type="text" name="judul_diskusi" id="judul_diskusi" class="form-control" placeholder="Subject"
              required aria-describedby="hlp_judul_diskusi">
          </div>

          <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea type="text" name="comment" id="comment" class="form-control" placeholder="Isi Komentar" rows="3"
              required></textarea>
          </div>

          <input type="submit" class="btn btn-primary btn-sm" value="Kirim Komentar">

          <?= form_close() ?>

          <h5 class="mt-4">Komentar Terakhir</h5>

          <?php foreach ($diskusi as $key => $row) : ?>



          <?php endforeach; ?>

        </div>


      </div>



    </div>

    <div class="col-md-4 ">
      <!-- related video -->

      <div class="row">
        <?php foreach ($materi_related as $key => $row) : ?>

        <div class="col-md-12">

          <div class="row">
            <div class="col-md-5">

              <a href="<?= site_url('/Member/Materi/Show/'.$row->id) ?>">
                <img src="<?= base_url('uploads/'. $row->url_thumbnail ) ?>" alt="img-thumb" class="img-fluid mb-2">
              </a>

            </div>
            <div class="col-md-7 mb-2">

              <div>
                <a href="<?= site_url('/Member/Materi/Show/'.$row->id) ?>" class="materi-txt">
                  <?= word_limiter($row->judul_materi,6) ?>
                </a>
              </div>
              <div><span class="badge badge-primary"><?= $row->nama_mata_kuliah ?></span></div>

            </div>
          </div>

        </div>

        <?php endforeach; ?>

      </div>

    </div>
  </div>

</div>

<?= $this->endSection() ?>