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
                        <form action="/blog/add" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label><br>
                                <input class="form-control" type="input" name="title" value="<?= set_value('title') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="content">Content</label><br>
                                <textarea class="form-control" name="content" cols="30" rows="10"><?= set_value('content') ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="content">Cover</label><br>
                                <input class="form-control" type="file" name="cover" value="<?= set_value('cover') ?>">
                            </div>

                            <input class="btn btn-primary" type="submit" name="submit" value="Add Blog">
                        </form>
                    </div>
                </div>
            </div>
        </article>

