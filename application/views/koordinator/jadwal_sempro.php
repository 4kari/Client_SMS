        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk memudahkan pengelolaan data mahasiswa</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?>
                <span class="float-right text-white mr-4">
                  <a href="" data-toggle="modal" data-target="#TambahMhs" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i>tambah</a>
                  <a href="" data-toggle="modal" data-target="#ImportMhs" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i>import</a>
                </span>
              </h6>
            </div>
            <div class="card-body">
				<h2>Seminar Proposal</h2>
				<?php if ($sempro) { ?>
					<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
							<th>No</th>
							<th>Nim</th>
							<th>Judul</th>
							<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
							<th>No</th>
							<th>Nim</th>
							<th>Judul</th>
							<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $num=1; foreach ($sempro as $s){ ?>
							<tr>
								<td><?= $num++ ?></td>
								<td><?= $s['data_skripsi']['nim']; ?></td>
								<?php if($s['data_skripsi']['judul']){
									echo "<td>".$s['data_skripsi']['judul']."</td>";
								}else{
									echo "<td>belum ada</td>";
								}
								?> 
								<td>
									<a href="" data-toggle="modal" data-target="#detail<?=$s['id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-eye"></i>lihat data</a>
									<a href="" data-toggle="modal" data-target="#update<?=$s['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-fw fa-edit"></i>edit</a>
									<a href="<?= base_url($aktor); ?>/mulai_acara/?id=<?= $s['id']; ?>&page=Koordinator/jadwal_sempro" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-check"></i>mulai</a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
					<?php }else{ ?>
						<tr>
							<td colspan="12">
								<div class="alert alert-danger" role="alert">
									Data not found!
								</div>
							</td>
						</tr>
				<?php } ?>
				<br>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      <!-- </div> -->
      <!-- End of Main Content -->

	  <?php foreach ($sempro as $sp) : ?>
            <!-- modal detail -->
            <div class="modal fade displaycontent" id="detail<?= $sp['id'] ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Skripsi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <tbody>
                                  <?php
                                    echo "<tr>";
                                      echo "<td>judul</td>";
                                      if($sp['data_skripsi']['judul']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sp[data_skripsi][judul]</td>";
                                      }
                                    echo "</tr>";

                                    echo "<tr>";
                                      echo "<td>topik</td>";
                                      echo "<td>".$sp['data_skripsi']['ktopik']."</td>";
                                    echo "</tr>";

									                  echo "<tr>";
                                      echo "<td>NIM</td>";
                                      echo "<td>".$sp['data_skripsi']['nim']."</td>";
                                    echo "</tr>";

									                  echo "<tr>";
                                      echo "<td>Nama</td>";
                                      echo "<td>".$sp['data_skripsi']['nama']."</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                      echo "<td>Pembimbing 1</td>";
                                      if($sp['data_skripsi']['pembimbing_1']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['data_skripsi']['npembimbing_1']."</td>";
                                      }
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                      echo "<td>Pembimbing 2</td>";
                                      if($sp['data_skripsi']['pembimbing_2']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['data_skripsi']['npembimbing_2']."</td>";
                                      }
                                    echo "</tr>";

									                  echo "<tr>";
                                      echo "<td>Penguji 1</td>";
                                      if($sp['data_skripsi']['penguji_1']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['data_skripsi']['npenguji_1']."</td>";
                                      }
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                      echo "<td>Penguji 2</td>";
                                      if($sp['data_skripsi']['penguji_2']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['data_skripsi']['npenguji_2']."</td>";
                                      }
                                    echo "</tr>";
									
									                  echo "<tr>";
                                      echo "<td>Penguji 3</td>";
                                      if($sp['data_skripsi']['penguji_3']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['data_skripsi']['npenguji_3']."</td>";
                                      }
                                    echo "</tr>";

									                  echo "<tr>";
                                      echo "<td>Ruangan</td>";
                                      if($sp['ruangan']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['kruangan']."</td>";
                                      }
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<td>Periode</td>";
                                    if($sp['periode']==null){
                                      echo "<td>belum ada</td>";
                                    }else{
                                      echo "<td>".$sp['kperiode']."</td>";
                                    }
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                      echo "<td>Waktu</td>";
                                      if($sp['waktu']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>".$sp['kwaktu']."</td>";
                                      }
                                    echo "</tr>";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal detail -->

            <!-- modal perbaiki berkas -->
            <div class="modal fade displaycontent" id="update<?= $sp['id'] ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">update jadwal sempro</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                        <form action="<?= base_url('Koordinator/editJadwal/') . $sp['id']; ?>" method="POST">
                        <input hidden name="page" value="Koordinator/jadwal_sempro">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="penguji1">Pilih Dosen Penguji 1</label>
                              <select id="penguji1" name="penguji1" class="form-control" aria-label="Default select example">
                                <?php foreach($dosen as $d){?>
                                <option  value="<?=$d['nip']?>" <?php if($d['nip']==$sp['data_skripsi']['penguji_1']){echo "selected";}?>><?=$d['nama']?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="penguji2">Pilih Dosen Penguji 2</label>
                              <select id="penguji2" name="penguji2" class="form-control" aria-label="Default select example">
                                <?php foreach($dosen as $d){?>
                                <option  value="<?=$d['nip']?>" <?php if($d['nip']==$sp['data_skripsi']['penguji_2']){echo "selected";}?>><?=$d['nama']?></option>
                                <?php }?>
                              </select>
                                          </div>
                            <div class="form-group">
                              <label for="penguji3">Pilih Dosen Penguji 3</label>
                              <select id="penguji3" name="penguji3" class="form-control" aria-label="Default select example">
                                <?php foreach($dosen as $d){?>
                                <option  value="<?=$d['nip']?>" <?php if($d['nip']==$sp['data_skripsi']['penguji_3']){echo "selected";}?>><?=$d['nama']?></option>
                                <?php }?>
                              </select>
                                          </div>
                            <div class="form-group">
                              <label for="ruangan">Pilih Ruangan</label><br>
                              <select id="ruangan" name="ruangan" class="form-control" aria-label="Default select example">
                                <?php foreach($ruangan as $r){?>
                                <option  value="<?=$r['id']?>" <?php if($r['id']==$sp['ruangan']){echo "selected";}?>><?=$r['ruangan']?></option>
                                <?php }?>
                              </select>
                                          </div>
                            <div class="form-group">
                              <label for="periode">Pilih Periode</label><br>
                              <select id="periode" name="periode" class="form-control" aria-label="Default select example">
                                <?php foreach($periode as $p){?>
                                <option  value="<?=$p['id']?>" <?php if($p['id']==$sp['periode']){echo "selected";}?>><?=$p['periode']?></option>
                                <?php }?>
                              </select>
                                          </div>
                            <div class="form-group">
                              <label for="waktu">Pilih Waktu</label><br>
                              <select id="waktu" name="waktu" class="form-control" aria-label="Default select example">
                                <?php foreach($waktu as $w){?>
                                <option  value="<?=$w['id']?>" <?php if($w['id']==$sp['waktu']){echo "selected";}?>><?=$w['waktu']?></option>
                                <?php }?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">perbarui</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal detail -->
    <?php endforeach; ?>