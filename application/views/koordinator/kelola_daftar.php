        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk memudahkan pengelolaan data pendaftar</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?>
                <span class="float-right text-white mr-4">
                  <!-- <a href="" data-toggle="modal" data-target="#TambahMhs" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i>tambah</a>
                  <a href="" data-toggle="modal" data-target="#ImportMhs" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i>import</a> -->
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
						<?php foreach ($sempro as $s){ ?>
						<?php if ($s['tipe']==2) {?> 
						<tr>
							<td><?= $s['data_skripsi']['id']; ?></td>
							<td><?= $s['data_skripsi']['nim']; ?></td>
							<?php if($s['data_skripsi']['judul']){
								echo "<td>".$s['data_skripsi']['judul']."</td>";
							}else{
								echo "<td>belum ada</td>";
							}
							?> 
							<td>
								<a href="<?= base_url($aktor); ?>/Jadwalkan/?id=<?= $s['id_skripsi']; ?>&tipe=<?=$s['tipe']?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check"></i>jadwalkan</a>
							</td>
						</tr>

						<?php } }?>
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
				<h2>Sidang Skripsi</h2>
				<?php if ($sidang) { ?>
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
						<?php foreach ($sidang as $s){ ?>
						<?php if ($s['tipe']==3) {?> 
						<tr>
							<td>none</td>
							<td><?= $s['data_skripsi']['nim']; ?></td>
							<?php if($s['data_skripsi']['judul']){
								echo "<td>".$s['data_skripsi']['judul']."</td>";
							}else{
								echo "<td>belum ada</td>";
							}
							?> 
							<td>
								<a href="<?= base_url($aktor); ?>/Jadwalkan/?id=<?= $s['id_skripsi']; ?>&tipe=<?=$s['tipe']?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check"></i>jadwalkan</a>
							</td>
						</tr>

						<?php } }?>
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

      </div>
      <!-- End of Main Content -->