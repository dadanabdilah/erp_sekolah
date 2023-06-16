<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Laporan Data Nilai</h1>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-nilai">
                            Export Laporan +
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
<div class="modal fade" id="modal-nilai">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Export Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('laporan/export/nilai') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <select id="nis" name="nis" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <option value="Semua" >Semua Siswa</option>
                            <?php foreach ($Siswa as $siswa) { ?>
                                <option value="<?= $siswa->nis ?>" ><?= $siswa->nama_siswa ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select id="id_kelas" name="id_kelas" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <option value="Semua">Semua Kelas</option>
                            <?php foreach ($Kelas as $kelas) { ?>
                                <option value="<?= $kelas->id ?>" ><?= $kelas->kelas ?></option>
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