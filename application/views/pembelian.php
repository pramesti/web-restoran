<div class="container-fluid">
    <h3 class="page-title">Pembelian</h3>
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
		    	<div class="panel-body">
		    		<table class="table">
		    			<thead>
		    				<tr>
		    					<th>ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Detail Pembelian</th>
                                <th>Total Bayar</th>
		    					<th>Aksi</th>
		    				</tr>
		    			</thead>
		    			<tbody>
                        <?php foreach ($pembelian as $items): ?>
                            <tr>
                                <td><?=$items->id_order?></td>
                                <td><?=$items->nama_pelanggan?></td>
                                <td>
                                <ul>
                                    <?php 
                                        $this->load->model('model_data', 'mData'); 
                                        foreach($this->mData->getDetailOrder($items->id_order) as $det):
                                    ?>
                                    <li class="text-capitalize">
                                        <?=$det->nama_masakan?> - <?=$det->total_item?> - <?=$det->subtotal?> - <?=$det->status_detail_order ? $det->status_detail_order : 'sedang diproses' ?> 
                                    </li>
                                    <?php endforeach; ?>    
                                    </ul>
                                </td>
                                <td><?=$items->total_bayar?></td>
                                <td>
                                    <?php if ($items->status_order == "terima") { ?>
                                        <span>Pesanan diterima</span>
                                    <?php } else if ($items->status_order == "tolak") { ?>
                                        <span>Pesanan ditolak</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('data/verifikasi/'.$items->id_order.'/terima')?>" class="btn btn-success"><i class="lnr lnr-checkmark-circle"></i></a><a href="<?= base_url('data/verifikasi/'.$items->id_order.'/tolak')?>" class="btn btn-danger"><i class="lnr lnr-cross-circle"></i></a>
                                    <?php } ?>
                                    
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
		    		</table>
		    	</div>
		    </div>
        </div>
    </div>
</div> 