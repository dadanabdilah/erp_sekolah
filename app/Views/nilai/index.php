<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Nilai</h1>
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
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($Nilai as $key){ ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->nama_siswa ?></td>
                                        <td><?= $key->mapel ?></td>
                                        <td><?= $key->nilai ?></td>
                                        <td><?= $key->kelas ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-update<?= $key->id_nilai ?>">Edit</button>
                                            <a href="<?= base_url('nilai/delete/' . $key->id_nilai)  ?>" class="btn btn-warning btn-sm" >Hapus</button>
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
			<form action="<?= base_url('nilai/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Siswa</label>
                        <select id="nis" name="nis" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Siswa as $key => $value) { ?>
                                <option value="<?= $value->nis ?>"><?= $value->nama_siswa ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select id="id_mapel" name="id_mapel" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Mapel as $key => $value) { ?>
                                <option value="<?= $value->id ?>"><?= $value->mapel ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input class="form-control" type="text" name="nilai" />
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


<?php $no = 1; foreach($Nilai as $keys){ ?>
<div class="modal fade" id="modal-update<?= $keys->id_nilai ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('nilai/update') ?>" method="POST">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?= $keys->id_nilai ?>"/>
                    <div class="form-group">
                        <label>Siswa</label>
                        <select id="nis" name="nis" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Siswa as $key => $value) { ?>
                                <option value="<?= $value->nis ?>" <?= $value->nis == $keys->nis ? "selected" : "" ?> ><?= $value->nama_siswa ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select id="id_mapel" name="id_mapel" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Mapel as $key => $value) { ?>
                                <option value="<?= $value->id ?>" <?= $value->id == $keys->id_mapel ? "selected" : "" ?> ><?= $value->mapel ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input class="form-control" type="text" name="nilai" value="<?= $keys->nilai ?>"/>
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