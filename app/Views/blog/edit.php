<?= session()->getFlashdata('error') ?>

        <header class="masthead" style="background-image: url('<?= esc(base_url() . 'assets/img/post-bg.jpg') ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h2><?= esc($title) ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?= validation_list_errors('my_list') ?>
                        <form action="/blog" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <?= csrf_field() ?>

                            <input type="hidden" name="id" value="<?php echo $blogs['id']; ?>"><br>
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label><br>
                                <input class="form-control" type="input" name="title" value="<?= set_value('title', $blogs['title']) ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="content">Content</label><br>
                                <textarea class="form-control" name="content" cols="30" rows="10"><?= set_value('content', $blogs['content']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="content">Cover</label><br>
                                <input class="form-control" type="file" name="cover" value="<?= set_value('cover', $blogs['cover']) ?>">
                            </div>
                            <input type="hidden" name="cover_name" value=<?= set_value('cover_name', $blogs['cover']) ?>>
                            <input class="btn btn-primary" type="submit" name="submit" value="Update Blog">
                        </form>
                    </div>
                </div>
            </div>
        </article>