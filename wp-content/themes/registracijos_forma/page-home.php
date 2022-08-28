<?php
/*
	Template Name: Front page
*/
?>

<?php get_header(); ?>

<div class="page-home">
    <div class="container-fluid">
        <section class="hero-section">
            <div class="container">
                <div class="row image-row"></div>
            </div>
        </section>
        <section class="content-section">
            <div class="container">
                <div class="row content-row">
                    <div class="col">
                        <div class="row title-row">
                            <h4>Registruokitės internetu Jums patogiu laiku</h4>
                        </div>
                        <div class="row tables-row">
                            <div class="col-car col col-lg-6 col-md-12 col-12">
                                <div class="inner-col">
                                    <div class="row form-title">
                                        <h3>Automobilio remontas</h3>
                                    </div>
                                    <div class="row form-contact">
                                        <?php echo do_shortcode("[contact-form]"); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-tyres col col-lg-6 col-md-12 col-12">
                                <div class="inner-col">
                                    <div class="row form-title">
                                        <div class="col">
                                            <h3>Padangų montavimas</h3>
                                            <h3>Ratų balansavimas</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<?php get_footer(); ?>