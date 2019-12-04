
<div class="container">
    <h3 class="page-title">Menu</h3>
	<div class="row">
        <div class="<?php if($this->session->userdata('level') == 0) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
            <?php if ($this->session->userdata('level') == 1) { ?>
                <div class="text-right" style="padding-bottom:20px">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalMenu">Tambah Menu</button>
                    </div>
            <?php } ?>
            <div class="row">
                    <?php foreach ($menu as $items): ?>
                <div class="col-md-4">
                    <!-- PANEL NO CONTROLS -->
                    <div class="panel">
                        <div class="panel-heading no-padding">
                            <img src="<?=base_url()?>assets/img/profile-bg.png" width="100%" alt="">                        
                        </div>
                        <div class="panel-body"> 
                            <h3><?=$items->nama_masakan?></h3>
                            <h4><?=$this->cart->format_number($items->harga)?></h4>
                            <h4><?=$items->nama_kategori?></h4>
                        </div>
                        <div class="panel-footer text-right">
                            <?php if ($this->session->userdata('level') == 0) { ?>
                                <a href="<?= base_url('data/addToCart/'.$items->id_masakan);?>" class="btn btn-primary">Beli</a>
                            <?php } else { ?>
                                <a href="<?= base_url('data/edit/masakan/'.$items->id_masakan);?>" class="btn btn-warning">Edit</a>
                                <a href="<?= base_url('data/delete/masakan/'.$items->id_masakan);?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <!-- END PANEL NO CONTROLS -->
                </div>
                    <?php endforeach; ?>
            </div>
        </div>
        <?php if($this->session->userdata('level') == 0) { ?>
        <div class="col-md-4">
            <div class="panel">
		    	<div class="panel-heading">
		    		<h3 class="panel-title">Cart</h3>
		    	</div>
		    	<div class="panel-body">
                <form action="<?= base_url('data/checkout')?>" method="post">
                <div class="row">
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="no_meja" placeholder="masukkan no.meja" required>
                    </div>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="keterangan" placeholder="masukkan keterangan">
                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
		    				<tr>
                                <th>#</th>
		    					<th>Nama</th>
		    					<th>Harga</th>
		    					<th>Jumlah</th>
		    					<th>Subtotal</th>
		    					<th>Aksi</th>
		    				</tr>
		    			</thead>
		    			<tbody>
                            <?php foreach ($this->cart->contents() as $items): ?>
                            <tr>
                                <td><?= $items['id']; ?></td>
                                <td><?= $items['name']; ?></td>
                                <td><?= $this->cart->format_number($items['price']); ?></td>
                                <td><?= $items['qty']; ?></td>
                                <td><?= $this->cart->format_number($items['subtotal']); ?></td>
                                <td><a href="<?=base_url('data/removefromcart/'.$items['rowid']); ?>" class="btn btn-danger"><i class="lnr lnr-trash"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3"> Total</th>
                                <td><?=  $this->cart->total_items(); ?></td>
                                <td><?=  $this->cart->format_number($this->cart->total()); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right">
                                    <button type="submit" class="btn btn-warning">Checkout</button>
                                </td>
                            </tr>
                        </tfoot>
                	</table>
                </div>
                </form>
		    	</div>
		    </div>
        </div>
        <?php } ?>
    </div>
    <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Menu</h4>
            </div>
            <form action="<?= base_url('data/insertMasakan') ?>" method="post">
          <div class="modal-body">
                  <input type="text" class="form-control" name="nama_masakan" placeholder="Nama Menu">
                  <br>
                  <input type="number" class="form-control" name="harga" placeholder="harga">
                  <br>
                  <select class="form-control" name="kategori">
                    <?php foreach ($kategori as $items): ?>
                      <option value="<?= $items->id_kategori?>"><?= $items->nama_kategori ?></option>
                    <?php endforeach; ?> 
                    </select>
                    <br>
                    <label class="fancy-radio">
                        <input name="status_masakan" value="ready" type="radio">
                        <span><i></i>ready</span>
                    </label>
                    <label class="fancy-radio">
                        <input name="status_masakan" value="no ready" type="radio">
                        <span><i></i>no ready</span>
                    </label>
                    <br>
                    <input type="file" class="form-control" name="gambar" placeholder="gambar"> 
                    
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