<!-- Page Header-->
        <header class="masthead" style="background-image: url('uploads/<?= esc($blogs['cover']) ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h2><?= esc($blogs['title']) ?></h2>
                            <span class="meta">
                                Posted on <?= esc($blogs['date']) ?>
                            </span>
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
                        <p><?= esc($blogs['content']) ?></p>
                        <p class="text-end">
                            <a href="/blog/edit/<?= esc($blogs['id']) ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/blog/delete/<?= esc($blogs['id']) ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </article>