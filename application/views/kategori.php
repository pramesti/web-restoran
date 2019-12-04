
<div class="container-fluid">
    <h3 class="page-title">Kategori</h3>
	<div class="row">
        <div class="col-md-12">
        <div class="text-right" style="padding-bottom:20px">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalKategori">Tambah Kategori</button>
            </div>
            <div class="panel">
		    	<div class="panel-body">
		    		<table class="table">
		    			<thead>
		    				<tr>
		    					<th>ID</th>
		    					<th>Nama Kategori</th>
		    					<th>Aksi</th>
		    				</tr>
		    			</thead>
		    			<tbody>
                        <?php foreach ($kategori as $items): ?>
                            <tr>
                                <td><?= $items->id_kategori?></td>
                                <td><?= $items->nama_kategori?></td>
                                <td>
                                    <a href="<?= base_url('data/edit/kategori/'.$items->id_kategori);?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('data/delete/kategori/'.$items->id_kategori) ?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
		    		</table>
		    	</div>
		    </div>
        </div>
    </div>
    <div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
            </div>
            <form action="<?= base_url('data/insertKategori') ?>" method="post">
                <div class="modal-body">
                  <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
                  <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>