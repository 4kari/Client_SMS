<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <?= $this->session->flashdata('mt'); ?>
    <!-- Page Heading -->
    <h1 style="text-align: center;" class="h3 mb-4 text-gray-800"><?= "Timeline Skripsi" ?></h1>
    
    <ul class="timeline" id="timeline">
        <?php if($skripsi){
            for ($i=0;$i<count($status);$i++){
                if($skripsi['status']>=$status[$i]['id']){
                    echo "<li class='li complete'>";
                }else{
                    echo "<li class='li'>";
                }
                echo "<div class='timestamp'>";
                    if ($skripsi['status'] == $status[$i]['id']){
                        echo "<span class='date'>Proses<span>";
                    }elseif($skripsi['status'] > $status[$i]['id']){
                        echo "<span class='date'>Selesai<span>";
                    }else{
                        echo "<span class='date'>Belum<span>";
                    }
                echo "</div>";
                $ket = $status[$i]['status'];
                echo "<div class='status'><h4> $ket </h4></div>";
            }
        }else{
            echo "<li class='li'>";
                echo "<div class='timestamp'>";
                    echo "<span class='date'>Belum<span>";
                echo "</div>";
                echo "<div class='status'><h4> $ket </h4></div>";
        }
        ?>
        </li>
    </ul>
    <h1 style="text-align: center;" class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4 text-center">
                <img src="<?= base_url('assets/img/profile/') . $data['gambar']; ?>" class="card-img" alt="gambar"><BR>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#FotoBaru"><i class="fa fa-fw fa-user"></i> Ubah Foto</a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['nama']; ?></h5>
                    <p class="card-text"><?= $user['username']; ?></p>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#PassBaru"><i class="fa fa-fw fa-key"></i> Ubah Password</a>
                </div>
            </div>
        </div>
    </div> -->

    <section class="hero-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-text">
                                <h2><?= $data['nama']; ?></h2>
                                <p><?= $data['nim']; ?></p>
                            </div>
                            <hr>
                            <div class="hero-info">
                                <h2>Profil</h2>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <span>Tanggal Lahir</span>
                                    </div>
                                    <div class="col-lg-7">
                                        <span><?= $data['tanggal_lahir']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <span>Jenis Kelamin</span>
                                    </div>
                                    <div class="col-lg-7">
                                        <span><?= $data['jenis_kelamin']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <span>Alamat</span>
                                    </div>
                                    <div class="col-lg-7">
                                        <span><?= $data['alamat']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-lg-7">
                                        <span><?= $data['email']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <span>No.Hp</span>
                                    </div>
                                    <div class="col-lg-7">
                                        <span><?= $data['no_hp']; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <span><a href="<?= base_url('Mahasiswa/updateProfile/') . $data['username']; ?>"> >Klik untuk ubah profil</a></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 text-md-center">
                            <figure class="hero-image">
                                <img class="img-fluid w-50" src="<?= base_url('assets/img/profile/') . $data['gambar']; ?>" alt="5">
                            </figure>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#FotoBaru"><i class="fa fa-fw fa-user"></i> Ubah Foto</a>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#PassBaru"><i class="fa fa-fw fa-key"></i> Ubah Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- Modal -->
<div class="modal fade" id="FotoBaru" tabindex=" -1" role="dialog" aria-labelledby="FotoBaru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FotoBaru">Upload Foto Profil Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('Mahasiswa/UbahFoto/') . $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ktp" aria-describedby="inputGroupFileAddon01" name="UbahFoto" required>
                            <label class="custom-file-label" for="ktp">Choose file</label>
                        </div>
                    </div>
                    <div class="txtprof">
                        <p>*Ekstensi yang diperbolehkan .jpeg / .jpg / .png</p>
                        <!-- <p>*Maksimal ukuran gambar 500 x 500</p> -->
                        <p>*Maksimal 2 MB</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Foto</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Password-->
<div class="modal fade" id="PassBaru" tabindex=" -1" role="dialog" aria-labelledby="PassBaru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PassBaru">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('Mahasiswa/changePassword/') . $user['id']; ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="curpass">Masukkan Password Lama</label>
                            <div class="inputWithIcon">
                                <input type="password" class="form-control" id="curpass" name="curpass" placeholder="Masukan Password Lama" autocomplete="off">
                                <i class=" fas fa-fw fa-unlock-alt" aria-hidden="true"></i> </div>
                            <?= form_error('curpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('ms'); ?>
                        </div>
                        <div class="form-group">
                            <label for="newpass">Masukkan Password Baru</label>
                            <div class="inputWithIcon">
                                <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukan Password Baru" autocomplete="off">
                                <i class=" fas fa-fw fa-lock" aria-hidden="true"></i> </div>
                            <?= form_error('newpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('msg'); ?>
                        </div>
                        <div class="form-group">
                            <label for="conpass1">Ulangi Password Baru</label>
                            <div class="inputWithIcon">
                                <input type="password" class="form-control" id="conass" name="conpass" placeholder="Masukan Lagi" autocomplete="off">
                                <i class=" fas fa-fw fa-lock" aria-hidden="true"></i> </div>
                            <?= form_error('conpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
            </form>

        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->