<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>
    <section id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <p>&copy; Copyright <?=date('Y')?> Design Network Architecture Limited</p>
                        <a href="<?=get_page_link(13)?>" class="sitemap-wrapper">Sitemap</a>
                        <div class="website-by-wrapper">Website by: <a href="http://www.azwebsolutions.co.nz" target="_blank">A-Z Web Solutions Ltd</a><span>A-Z</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_footer(); ?>
    </div>
</body>
</html>