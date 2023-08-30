<section class="featured-places" id="blog">
        <div class="container">
        <?php
             $sqlk = $con->query("SELECT*FROM tbkategori");
            while ($vk = $sqlk->fetch_array()) {
             $idk = $svk['kode_kat'];
                                        
         ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Featured Places</span>
                        <h2>Praesent nec dui sed urna</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
            <?php
                $sqlm = $con->query("SELECT*FROM tb_barang");
                while ($vm = $sqlm->fetch_array()) {
             ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                        <div class="date-content">
                            <img src="produk/<?=$vm['gambar']?>" alt=">
                                <h2>28</h2>
                                <span>August</span>
                            </div>
                        </div>
                            
                            
                           
                        <div class="down-content">
                            <h4>Lorem ipsum dolor</h4>
                            <span>Category One</span>
                            <p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
                            <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="#">Add to favorites</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="#">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                    ?>
                </div> 
                <?php
                }
                ?>                   
    </section>