<section class="content" style='margin-left:260px;'>
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Dashboard / All Chapter
                    <a href="<?php echo base_url('dashboard/chapter/new') ?>" class="btn btn-danger" style='margin-left: 10px;'>New Chapter</a>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Chapter
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width:26%">Title</th>
                                            <th style="width:8%">Slug</th>
                                            <th style="width:10%">Category</th>
                                            <th style="width:13%">Author</th>
                                            <th style="width:15%">Deskripsi</th>
                                            <th style="width:10%">Rating</th>
                                            <th style="width:10%">Post Date</th>
                                            <th style="width:8%">Modified Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Deskripsi</th>
                                            <th>Rating</th>
                                            <th>Post Date</th>
                                            <th>Modified Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($chap as $ch){ ?>
                                        <tr>
                                            <td>
                                                <?php echo $ch->ch_title; ?>
                                                <br><?php echo anchor(site_url('home/'.$ch->se_slug.'/'.$ch->ch_slug),'Tampilkan');
                    echo ' | '; 
                    echo anchor(site_url('dashboard/edit/'.$ch->ch_id),'Edit'); 
                    echo ' | '; 
                    echo anchor(site_url('dashboard/content/'.$ch->ch_id),'Content');
                    echo ' | '; 
                    echo anchor(site_url('dashboard/delete/'.$ch->ch_id),'Hapus','onclick="javasciprt: return confirm(\'Yakin ingin menghapus?\')"');  ?><br><img src="<?php echo base_url('assets/images/cover/'.$ch->ch_featured_img) ?>" width="235" style="margin-top:25px">
                                            </td>
                                            <td>
                                                <?php echo $ch->ch_slug; ?>
                                            </td>
                                            <td>
                                                <?php echo $ch->se_title; ?>
                                            </td>
                                            <td>
                                                <?php echo $ch->fullname; ?>
                                            </td>
                                            <td>
                                                <?php echo $ch->ch_desc; ?>
                                            </td>
                                            <td>
                                                <input id="rating" name="rating" class="col-lg-6 rating rating-loading" value="
                                                <?php echo $ch->ch_rating?>" data-min="0" data-max="5" data-step="1" data-size="xxs" data-readonly="true" data-show-clear="false" data-show-caption="false">
                                            </td>
                                            <td>
                                                <?php echo $ch->ch_post_date; ?>
                                            </td>
                                            <td>
                                                <?php echo $ch->ch_last_date; ?>
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
            <!-- #END# Basic Examples -->
        </div>
    </section>