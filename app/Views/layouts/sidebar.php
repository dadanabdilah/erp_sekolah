<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('dashboard') ?>" class="brand-link">
		<img src="<?= base_url() ?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">ERP Sekolah</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= session()->get('nama_pengguna') ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url('dashboard') ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<?php if(session()->get('jabatan') == "Admin") { ?>
					<li class="nav-item">
						<a href="<?= base_url('pengguna') ?>" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								Data Pengguna
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('kelas') ?>" class="nav-link">
							<i class="nav-icon fas fa-columns"></i>
							<p>
								Data Kelas
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('tahunakademik') ?>" class="nav-link">
							<i class="nav-icon fas fa-columns"></i>
							<p>
								Data Tahun Akademik
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('siswa') ?>" class="nav-link">
							<i class="nav-icon fas fa-copy"></i>
							<p>
								Data Siswa
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('mapel') ?>" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
							<p>
								Data Mapel
							</p>
						</a>
					</li>
				<?php } ?>
				<?php if(session()->get('jabatan') == "Admin" OR session()->get('jabatan') == "Wali_Kelas") { ?>
                <li class="nav-item">
					<a href="<?= base_url('nilai') ?>" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
						<p>
							Data Nilai
						</p>
					</a>
				</li>
				<?php } ?>
				<?php if(session()->get('jabatan') == "Admin" OR session()->get('jabatan') == "Keuangan") { ?>
				<li class="nav-item">
					<a href="#" class="nav-link">
					<i class="nav-icon fas fa-book"></i>
						<p>
							Keuangan
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('kategori') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Kategori</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('keuangan') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Catatan</p>
							</a>
						</li>
					</ul>
				</li>
				<?php } ?>
				<?php if(session()->get('jabatan') == "Admin" OR session()->get('jabatan') == "Kepala_Sekolah") { ?>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Laporan
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('laporan/siswa') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Data Siswa</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('laporan/nilai') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Nilai Siswa</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('laporan/keuangan') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Keuangan</p>
							</a>
						</li>
					</ul>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a href="<?= base_url('login/logout') ?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>