<section class="content" style='margin-left:260px;'>
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Dashboard / Category 
                </h2>
            </div>
            

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CATEGORY
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open('dashboard/save_cat'); ?>
                            <label for="se_title">Category Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="se_title" class="form-control" placeholder="Masukkan nama kategori">
                                </div>
                            </div>
                            <label for="se_desc">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="se_desc" placeholder="Masukkan Deskripsi yang diinginkan"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Category
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width:25%">Name</th>
                                            <th style="width:35%">Description</th>
                                            <th style="width:20%">Slug</th>
                                            <th style="width:20%">Chapters</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width:25%">Name</th>
                                            <th style="width:35%">Description</th>
                                            <th style="width:20%">Slug</th>
                                            <th style="width:20%">Chapters</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($cat as $c){ ?>
                                        <tr>
                                            <td>
                                                <?php echo $c->se_title; ?>
                                                <br><?php 
                                                echo anchor(site_url('dashboard/category/edit/'.$c->se_id),'Edit');
                                                echo ' | ';
                                                echo anchor(site_url('dashboard/category/delete/'.$c->se_id),'Hapus','onclick="javasciprt: return confirm(\'Yakin ingin dihapus?\')"');  ?>
                                            </td>
                                            <td>
                                                <?php echo $c->se_desc; ?>
                                            </td>
                                            <td>
                                                <?php echo $c->se_slug; ?>
                                            </td>
                                            <td>
                                                <?php echo $c->se_chap; ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
    </section>