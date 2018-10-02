<div id="Category" class="tab-pane <?php echo ($activa == 1)?"active":"lien"; ?>" >
    <div class="row popup-gallery">
        <?php ini_set('display_errors',1);
        foreach ($imagenGaleria as $imagen) { ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
                    <img class="img-responsive" src="<?php echo $imagen->getUrlPortfolio(); ?>" alt="First category picture">
                    <div class="behind">
                        <div class="head text-center">
                            <ul class="list-inline">
                                <li>
                                    <a class="gallery" href="<?php echo $imagen->getUrlGallery(); ?>" alt="" data-toggle="tooltip" data-original-title="Quick View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="Download">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="More information">
                                        <i class="fa fa-info"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row box-content">
                            <ul class="list-inline text-center">
                                <li><i class="fa fa-eye"></i><?php echo $imagen->getNumVisualizaciones() ?> </li>
                                <li><i class="fa fa-heart"></i> <?php echo $imagen->getNumLikes() ?></li>
                                <li><i class="fa fa-download"><?php echo $imagen -> getNumDownloads() ?></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <nav class="text-center">
        <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#" aria-label="suivant">
                <span aria-hidden="true">&raquo;</span>
            </a></li>
        </ul>
    </nav>
</div>