
<div class="container-fluid">
    <h3 class="page-title">Pelanggan</h3>
	<div class="row">
        <div class="col-md-12">
        <div class="text-right" style="padding-bottom:20px">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPelanggan">Tambah Pelanggan</button>
            </div>
            <div class="panel">
		    	<div class="panel-body">
		    		<table class="table">
		    			<thead>
		    				<tr>
		    					<th>ID</th>
                                <th>Nama Pelanggan</th>
                                <th>username</th>
                                <th>password</th>
		    					<th>Aksi</th>
		    				</tr>
		    			</thead>
		    			<tbody>
                        <?php foreach ($pelanggan as $items): ?>
                            <tr>
                                <td><?=$items->id_pelanggan?></td>
                                <td><?=$items->nama_pelanggan?></td>
                                <td><?=$items->username?></td>
                                <td><?=$items->password?></td>
                                <td>
                                    <a href="<?= base_url('data/edit/pelanggan/'.$items->id_pelanggan);?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('data/delete/pelanggan/'.$items->id_pelanggan) ?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>   
                        </tbody>
		    		</table>
		    	</div>
		    </div>
        </div>
    </div>
    <div class="modal fade" id="modalPelanggan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pelanggan</h4>
            </div>
            <form action="<?= base_url('data/insertPelanggan') ?>" method="post">
          <div class="modal-body">
                  <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan">
                  <br>
                  <input type="text" class="form-control" name="username" placeholder="username">
                  <br>
                  <input type="password" class="form-control" name="password" placeholder="password">
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