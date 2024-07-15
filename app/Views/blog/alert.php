        <header class="masthead" style="background-image: url('<?= esc(base_url() . 'assets/img/post-bg.jpg') ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h2></h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center text-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php if(session()->getFlashdata('success')): ?>
                        <p class="alert alert-success">Successfully 
                            <?php if(session()->getFlashdata('updated')):?>
                                updated
                            <?php elseif(session()->getFlashdata('deleted')):?>
                                deleted
                            <?php elseif(session()->getFlashdata('created')):?>
                                created
                            <?php endif;?>
                        blog item</p>
                    <?php elseif(session()->getFlashdata('error')): ?>
                        <p class="alert alert-danger">Error  
                            <?php if(session()->getFlashdata('updated')):?>
                                updating
                            <?php elseif(session()->getFlashdata('deleted')):?>
                                deleting
                            <?php elseif(session()->getFlashdata('created')):?>
                                creating
                            <?php endif;?>
                        blog item!</p>
                    <?php endif; ?>
                    <a class="btn btn-primary" href="/blog">Go to Home</a>
                    </div>
                </div>
            </div>
        </article>


