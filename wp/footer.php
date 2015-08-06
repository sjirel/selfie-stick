<?php
/*
	=================================================
	Selfiestick - Default Footer Template
	=================================================
*/
?>
<footer id="footer">
    <div class="wrapper group">
        <h2 class="logo-footer"><a href="#"> <img src="<?php bloginfo( 'template_url' ); ?>/images/logo-white.png" alt="selfie stick"></a> </h2>

        <div class="footer-middle group">
            <p>Share your wackiest selfie with us and get featured <a href="/selfie-gallery/">here</a></p>
            <?php echo do_shortcode(' [contact-form-7 id="37" title="upload form"]'); ?>

        </div>
        <div class="right-footer group">
            <div class="social-links-wrap col">
                <p>Follow us!</p>
                <ul class="social-links">
                    <li>
                        <a class="icon-instagram" target="_blank" href="<?php echo get_option( 'client_instagram_url' ); ?>">instagram</a>
                    </li>
                    <li>
                        <a class="icon-facebook" target="_blank" href="<?php echo get_option( 'client_facebook_url' ); ?>">facebook</a>
                    </li>
                    <li>
                        <a class="icon-pinterest" target="_blank" href="<?php echo get_option( 'client_pinterest_username' ); ?>">pinterest</a>
                    </li>
                    <li>
                        <a class="icon-twitter" target="_blank" href="<?php echo get_option( 'client_twitter_url' ); ?>">twitter</a>
                    </li>
                    <li>
                        <a class="icon-gplus" target="_blank" href="<?php echo get_option( 'client_gplus_username' ); ?>">gplus</a>
                    </li>
                </ul>
            </div>
            <div class="go-to-top col">
                <span class="top-icon">

                </span>
                top
            </div>
        </div>
    </div>
</footer>
</div>
<!-- .container -->


<?php // JavaScript added through functions.php to avoid conflicts ?>


<!-- Prompt IE 6 & 7 users to install Chrome Frame -->
<!--[if lt IE 8 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<?php wp_footer(); ?>

<?php if ( ! current_user_can( 'edit_pages' ) ) : // don't track admins or editors ?>
<!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo get_option( 'client_google_analytics' ); ?>', 'auto');
        ga('send', 'pageview');

    </script>
<?php endif; ?>

</body>
</html>