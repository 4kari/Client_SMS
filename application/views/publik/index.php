
<!-- Masthead-->
<header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Universitas Trunojoyo Madura</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Universitas Trunojoyo merupakan satu-satunya perguruan tinggi negeri yang dimiliki oleh masyarakat Pulau Madura. Sebagai perguruan tinggi negeri, Universitas Trunojoyo dilengkapi dengan berbagai macam fasilitas akademik. </p>
                        <a class="btn btn-primary btn-xl" href="#tentang">Tentang</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- tentang-->
        <section class="page-section bg-primary" id="tentang">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Sistem Manajemen Skripsi UTM</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Sistem manajemen skripi merupakan sebuah sistem yang ditujukan untuk mempermudah proses pelaksanaan
                            skripsi di universitas trunojoyo madura khususnya pada jurusan teknik informatika. sistem ini juga memberikan informasi-informasi
                            terkait pelaksanaan skripsi yang dapat diakses secara umum seperti jadwal pelaksanaan seminar/sidang skripsi, alur dan berkas-berkas untuk pelaksanaan skripsi.<br>
                            silahkan login untuk mengakses lebih banyak fitur dalam sistem.
                        </p>
                        <a class="btn btn-light btn-xl" href="#login">Log in!</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- jadwal-->
        <section class="page-section" id="jadwal">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Jadwal Pelaksanaan Skripsi</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Jadwal Seminar Proposal</h3>
                            <p class="text-muted mb-0">Unduh file jadwal seminar proposal berdasarkan periode</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Jadwal Sidang Skripsi</h3>
                            <p class="text-muted mb-0">Unduh file jadwal sidang skripsi berdasarkan periode</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <form action="<?= base_url('publik/unduh_sempro/');?>" method="POST">
                                <label for="periode">Periode</label>
                                <select name="periode" id="periode" class="form-control mb-2">
                                    <?php
                                        // untuk kalau sudah ada data
                                        // foreach ($prodi as $p) {
                                        //     if ($p['prodi'] == $u['prodi']) {
                                        //         echo "<option value='$p[kode_prodi]' selected>$p[prodi]</option>";
                                        //     } else {
                                        //         echo "<option value='$p[kode_prodi]'>$p[prodi]</option>";
                                        //     }
                                        // }
                                    ?>
                                    <?php for ($x = 2010; $x <= 2021; $x++){
                                            echo "<option value=$x>$x</option>";
                                    }?>
                                </select>
                                <div class="mb-2"><button type="submit" class="btn btn-primary btn-xl">Unduh</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <form action="<?= base_url('publik/unduh_sidang/');?>" method="POST">
                                <label for="periode">Periode</label>
                                <select name="periode" id="periode" class="form-control mb-2">
                                    <?php
                                        // untuk kalau sudah ada data
                                        // foreach ($prodi as $p) {
                                        //     if ($p['prodi'] == $u['prodi']) {
                                        //         echo "<option value='$p[kode_prodi]' selected>$p[prodi]</option>";
                                        //     } else {
                                        //         echo "<option value='$p[kode_prodi]'>$p[prodi]</option>";
                                        //     }
                                        // }
                                    ?>
                                    <?php for ($x = 2010; $x <= 2021; $x++){
                                            echo "<option value=$x>$x</option>";
                                    }?>
                                </select>
                                <div class="mb-2"><button type="submit" class="btn btn-primary btn-xl">Unduh</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kontak -->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Selamat Datang!</h2>
                <a class="btn btn-light btn-xl" href="#login">Masuk Sekarang!</a>
            </div>
        </section>
        <!-- Login -->
        <section class="page-section" id="login">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Login Akun</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Login untuk akses informasi lebih dalam!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="<?= base_url('Auth/login/');?>" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN" >
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="username" type="text" name="username" placeholder="Enter your username..." data-sb-validations="required" />
                                <label for="username">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">An username is required.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password" name="password" placeholder="password" data-sb-validations="required" />
                                <label for="password">password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.</div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" type="submit">Login</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+62 852-0358-0638</div><div>A. Khairi R.</div>
                    </div>
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+62 852-3340-8998</div><div>Sya'ban</div>
                    </div>
                </div>
            </div>
        </section>