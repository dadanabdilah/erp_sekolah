<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard</h1>
			</div>
			<!-- /.col -->
			<div class="col-sm-6">
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if (session('error') !== null) : ?>
			<div class="alert alert-danger" role="alert"><?= session('error') ?></div>
		<?php endif ?>

		<?php if (session('message') !== null) : ?>
			<div class="alert alert-success" role="alert"><?= session('message') ?></div>
		<?php endif ?>
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<?php if(session()->get('jabatan') == "Admin") { ?>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3><?= $Pengguna ?></h3>
						<p>Total Penggua</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if(session()->get('jabatan') == "Wali_Kelas" OR session()->get('jabatan') == "Admin" OR session()->get('jabatan') == "Kepala_Sekolah") { ?>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3 class="text-white"><?= $Siswa ?></h3>
						<p class="text-white">Total Siswa</p>
					</div>
					<div class="icon">
						<i class="ion ion-person"></i>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if(session()->get('jabatan') == "Admin" OR session()->get('jabatan') == "Keuangan" OR session()->get('jabatan') == "Kepala_Sekolah") { ?>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>Rp. <?= number_format($UangMasuk,0,".",",") ?></h3>
						<p>Total Uang Masuk</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>Rp. <?= number_format($UangKeluar,0,".",",") ?></h3>
						<p>Total Uang Keluar</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
				</div>
			</div>
			<?php } ?>
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>