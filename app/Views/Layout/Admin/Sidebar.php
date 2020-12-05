        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">

                        <?= sidebar_item(['link'=>site_url('/Admin/Dashboard'),'icon'=>'fas fa-home','caption'=>'Dashboard']) ?>

                        <?= sidebar_item(['link'=>'#','icon'=>'fas fa-paperclip','caption'=>'Referensi','has_child'=>1]) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Matakuliah'),'icon'=>'','caption'=>'Mata Kuliah']) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Materi'),'icon'=>'','caption'=>'Materi']) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Program'),'icon'=>'','caption'=>'Plan Kursus']) ?>
                        <?= sidebar_child_close() ?>

                        <?= sidebar_item(['link'=>'#','icon'=>'fas fa-check-square','caption'=>'Tryout','has_child'=>1]) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Tryout'),'icon'=>'','caption'=>'Judul Tryout']) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Siswa'),'icon'=>'','caption'=>'Peserta Tryout']) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Rekaphasil'),'icon'=>'','caption'=>'Rekap Hasil Tryout']) ?>
                        <?= sidebar_child_close() ?>

                        <?= sidebar_item(['link'=>'#','icon'=>'fas fa-comments','caption'=>'Interaksi','has_child'=>1]) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Diskusi'),'icon'=>'','caption'=>'Diskusi']) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Testimoni'),'icon'=>'','caption'=>'Testimoni']) ?>
                        <?= sidebar_child_close() ?>

                        <?= sidebar_item(['link'=>'#','icon'=>'fas fa-user','caption'=>'Pengguna','has_child'=>1]) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Siswa'),'icon'=>'','caption'=>'Siswa']) ?>
                            <?= sidebar_item(['link'=>site_url('/Admin/Pengajar'),'icon'=>'','caption'=>'Pengajar']) ?>
                        <?= sidebar_child_close() ?>

                        <?= sidebar_item(['link'=>site_url('/Logout'),'icon'=>'fas fa-sign-out-alt','caption'=>'Logout']) ?>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->