
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?= esc(base_url()); ?>assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Sanckut Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php if($blog_list !== []): ?>
                        <?php foreach ($blog_list as $blog_item): ?>
                            <div class="post-preview">
                                <a href="/blog/<?= esc($blog_item['url'], 'url') ?>">
                                    <h2 class="post-title"><?= esc($blog_item['title'])?></h2>
                                </a>
                                <p><?= esc($blog_item['content']) ?></p>
                                <p class="post-meta">
                                    Posted
                                    <?= esc($blog_item['date'])?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h2 class="post-subtitle">No Blog</h3>
                        <p class="post-meta">Unable to find blog for you</p>
                    <?php endif; ?>
                    <!-- Divider-->
                    <hr class="my-4" />
                    
                    <!-- Pager-->
                    <?php echo $pager->links('default', 'my_pager');?>
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>




