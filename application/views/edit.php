
<div class="container-fluid">
    <h3 class="page-title">Edit</h3>
    <div class="panel">
        <form action="<?= base_url('data/simpanEdit/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>" method="post">
            <div class="panel-body">
                <h4 class="panel-title text-capitalize" id="mypanelLabel">Edit <?= $this->uri->segment(3) ?></h4>
                <br>
                <?php foreach ($input as $title) { ?>
                    <?php if ($title == "gambar") { //echo $title;?>
                        <!-- <input type="hidden" name="<?= $title ?>_noedit"/>
                        <input type="file" class="form-control" name="<?= $title ?>" placeholder="<?= $title ?>" value="<?= $editable->$title; ?>"> -->
                    <?php } else if ($title == "id_kategori" && $this->uri->segment(3) == 'masakan') { ?>
                        kategori
                        <select class="form-control" name="kategori" value="<?= $editable->$title; ?>">
                            <?php foreach ($kategori as $items): ?>
                                <option value="<?= $items->id_kategori?>"><?= $items->nama_kategori ?></option>
                            <?php endforeach; ?> 
                        </select>
                    <?php } else { echo $title;?>
                        <input type="text" class="form-control" name="<?= $title ?>" placeholder="<?= $title ?>" value="<?= $editable->$title; ?>">
                    <br>
                    <?php } ?>
                <?php } ?>
                <br>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-default" data-dismiss="panel">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div> 