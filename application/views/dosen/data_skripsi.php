        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk memudahkan pengelolaan data mahasiswa</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?>
              </h6>
            </div>
            <div class="card-body">
				<h2>Bimbingan Skripsi</h2>
				<?php if (empty($posting[0])&&empty($posting[1])&&empty($posting[2])) { ?>
						<tr>
							<td colspan="12">
								<div class="alert alert-danger" role="alert">
									Data not found!
								</div>
							</td>
						</tr>
					<?php }else{ ?>
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
						<?php foreach ($posting[0] as $p) : if($p['tipe']==1){
							$id=null;
							$index=null;
							for($i=0;$i<count($validasi);$i++){
								if($validasi[$i]['id_skripsi']==$p['id_skripsi']){
									$id=$validasi[$i]['id'];
									$index=$i;
								}
							}?>
						<tr>
							<td><?= $p['data_skripsi']['id']; ?></td>
							<td><?= $p['data_skripsi']['nim']; ?></td>
							<?php if($p['data_skripsi']['judul']){
								echo "<td>".$p['data_skripsi']['judul']."</td>";
							}else{
								echo "<td>belum ada</td>";
							}
							?> 
							<td>
								<a href="<?= base_url($aktor); ?>/detail_bimbingan/<?= $p['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-eye"></i> Lihat Detail</a>
								<?php if($index!==null && !$validasi[$index][$p['data_skripsi']['sebagai']] && $validasi[$index]['tipe']=="2"){?>
								<a href="<?= base_url($aktor); ?>/validasi/?id=<?= $id; ?>&sebagai=<?= $p['data_skripsi']['sebagai']?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check"></i> validasi sempro</a>
								<?php } ?>
								<?php if($index!==null && !$validasi[$index][$p['data_skripsi']['sebagai']] && $validasi[$index]['tipe']=="3"){?>
								<a href="<?= base_url($aktor); ?>/validasi/?id=<?= $id ?>&sebagai=<?= $p['data_skripsi']['sebagai']?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check"></i> validasi sidang</a>
								<?php } ?>
							</td>
						</tr>
						<?php } endforeach;?>
					</tbody>
					</table>
				</div>
				<?php } ?>
				<br>

				<h2>Seminar Proposal</h2>
				<?php if (empty($posting[1])) { ?>
					<tr>
						<td colspan="12">
							<div class="alert alert-danger" role="alert">
								Data not found!
							</div>
						</td>
					</tr>
				<?php }else{ ?>
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
						<?php foreach ($posting[1] as $p) : if($p['tipe']==2){ ?>
						<tr>
							<td><?= $p['data_skripsi']['id']; ?></td>
							<td><?= $p['data_skripsi']['nim']; ?></td>
							<?php if($p['data_skripsi']['judul']){
								echo "<td>".$p['data_skripsi']['judul']."</td>";
							}else{
								echo "<td>belum ada</td>";
							}
							?> 
							<td>
								<a href="<?= base_url($aktor); ?>/detail_sempro/<?= $p['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-eye"></i> Lihat Detail</a>
							</td>
						</tr>
						<?php } endforeach;?>
					</tbody>
					</table>
				</div>
				<?php } ?>
				<br>
				
				<h2>Sidang Skripsi</h2>
				<?php if (empty($posting[2])) { ?>
					<tr>
						<td colspan="12">
							<div class="alert alert-danger" role="alert">
								Data not found!
							</div>
						</td>
					</tr>
				<?php }else{ ?>
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
						<?php foreach ($posting[2] as $p) : if($p['tipe']==3){ ?>
						<tr>
							<td><?= $p['data_skripsi']['id']; ?></td>
							<td><?= $p['data_skripsi']['nim']; ?></td>
							<?php if($p['data_skripsi']['judul']){
								echo "<td>".$p['data_skripsi']['judul']."</td>";
							}else{
								echo "<td>belum ada</td>";
							}
							?> 
							<td>
								<a href="<?= base_url($aktor); ?>/detail_sidang/<?= $p['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-eye"></i> Lihat Detail</a>
							</td>
						</tr>
						<?php } endforeach;?>
					</tbody>
					</table>
				</div>
				<?php } ?>
				<br>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->