<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Siswa</h1>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            Tambah Data +
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                    <?php endif ?>

                    <?php if (session('message') !== null) : ?>
                        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                    <?php endif ?>
                    
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No Hape</th>
                                    <th>Nama Orang Tua</th>
                                    <th>Pekerjaan Orang Tua</th>
                                    <th>Kelas</th>
                                    <th>Tahun Akademik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($Siswa as $key){ ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->nama_siswa ?></td>
                                        <td><?= $key->jk ?></td>
                                        <td><?= $key->alamat ?></td>
                                        <td><?= $key->no_hp ?></td>
                                        <td><?= $key->nama_orang_tua ?></td>
                                        <td><?= $key->pekerjaan_orang_tua ?></td>
                                        <td><?= $key->kelas ?></td>
                                        <td><?= $key->tahun ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-update<?= $key->nis ?>">Edit</button>
                                            <a href="<?= base_url('kelas/delete/' . $key->nis)  ?>" class="btn btn-warning btn-sm" >Hapus</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('siswa/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIS</label>
                        <input class="form-control" type="text" name="nis" />
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input class="form-control" type="text" name="nama_siswa" />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select id="jk" name="jk" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea row="5" class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Hape</label>
                        <input class="form-control" type="text" name="no_hp" />
                    </div>
                    <div class="form-group">
                        <label>Nama Orang Tua</label>
                        <input class="form-control" type="text" name="nama_orang_tua" />
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan Orang Tua</label>
                        <input class="form-control" type="text" name="pekerjaan_orang_tua" />
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select id="id_kelas" name="id_kelas" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Kelas as $key => $value) { ?>
                                <option value="<?= $value->id ?>"><?= $value->kelas ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Akademik</label>
                        <select id="id_thn_akademik" name="id_thn_akademik" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($TahunAkademik as $akademik) { ?>
                                <option value="<?= $akademik->id ?>"><?= $akademik->tahun ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php $no = 1; foreach($Siswa as $key){ ?>
<div class="modal fade" id="modal-update<?= $key->nis ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('siswa/update') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIS</label>
                        <input class="form-control" type="text" name="nis" value="<?= $key->nis ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input class="form-control" type="text" name="nama_siswa" value="<?= $key->nama_siswa ?>" />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select id="jk" name="jk" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <option value="L" <?= $key->jk == 'L' ? 'selected' : ''; ?> >Laki-laki</option>
                            <option value="P" <?= $key->jk == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea row="5" class="form-control" name="alamat"><?= $key->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Hape</label>
                        <input class="form-control" type="text" name="no_hp" value="<?= $key->no_hp ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nama Orang Tua</label>
                        <input class="form-control" type="text" name="nama_orang_tua" value="<?= $key->nama_orang_tua ?>" />
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan Orang Tua</label>
                        <input class="form-control" type="text" name="pekerjaan_orang_tua" value="<?= $key->pekerjaan_orang_tua ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select id="id_kelas" name="id_kelas" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Kelas as $kelas) { ?>
                                <option value="<?= $kelas->id ?>" <?= $kelas->id == $key->id_kelas ? "selected" : "" ?> ><?= $kelas->kelas ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Akademik</label>
                        <select id="id_thn_akademik" name="id_thn_akademik" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($TahunAkademik as $akademik) { ?>
                                <option value="<?= $akademik->id ?>" <?= $akademik->id == $key->id_thn_akademik ? "selected" : "" ?> ><?= $akademik->tahun ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?= $this->endSection() ?>