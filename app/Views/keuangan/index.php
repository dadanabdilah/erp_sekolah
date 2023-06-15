<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Catatan Keuangan</h1>
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
                                    <th>Nominal</th>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($Keuangan as $key){ ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>Rp. <?= number_format($key->nominal, 0, ".",",") ?></td>
                                        <td><?= $key->jenis ?></td>
                                        <td><?= $key->kategori ?></td>
                                        <td><?= $key->keterangan ?></td>
                                        <td><?= $key->tanggal ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-update<?= $key->id_keuangan ?>">Edit</button>
                                            <a href="<?= base_url('keuangan/delete/' . $key->id_keuangan)  ?>" class="btn btn-warning btn-sm" >Hapus</button>
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
			<form action="<?= base_url('keuangan/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis</label>
                        <select id="jenis" name="jenis" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <option value="Uang Masuk">Uang Masuk</option>
                            <option value="Uang Keluar">Uang Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select id="id_kategori" name="id_kategori" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Kategori as $key => $value) { ?>
                                <option value="<?= $value->id ?>"><?= $value->kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input class="form-control" type="number" name="nominal" required />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea row="5" class="form-control" name="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" type="date" id="tanggal" name="tanggal"/>
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


<?php $no = 1; foreach($Keuangan as $keys){ ?>
<div class="modal fade" id="modal-update<?= $keys->id_keuangan ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('keuangan/update') ?>" method="POST">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?= $keys->id_keuangan ?>"/>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select id="jenis" name="jenis" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <option value="Uang Masuk" <?=  $keys->jenis == "Uang Masuk" ? "selected" : "" ?> >Uang Masuk</option>
                            <option value="Uang Keluar" <? $keys->jenis == "Uang Keluar" ? "selected" : "" ?> >Uang Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select id="id_kategori" name="id_kategori" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Pilih</option>
                            <?php foreach ($Kategori as $key => $value) { ?>
                                <option value="<?= $value->id ?>" <?= $value->id == $keys->id_kategori ? "selected" : "" ?> ><?= $value->kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input class="form-control" type="number" id="nominal" name="nominal" value="<?= $keys->nominal ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea row="5" class="form-control" name="keterangan"><?= $keys->keterangan ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $keys->tanggal ?>"/>
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