<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package College Application Essay Coach
 */
$is_active_sidebar_5 = is_active_sidebar( 'sidebar-5' );
$is_active_sidebar_6 = is_active_sidebar( 'sidebar-6' );
$is_active_sidebar_7 = is_active_sidebar( 'sidebar-7' );
?>
        <div class="space60"></div>
        </div><!-- .row -->
	</div><!-- #content -->
    
	<footer id="colophon" class="site-footer footer" role="contentinfo">
        <?php
        if ($is_active_sidebar_5 === TRUE){
            dynamic_sidebar( 'sidebar-5' );
        }
        ?>
		<div class="site-info">
    <div class="copyright"> 
      <div class="container">  
        <div class="row">
          <div id="footer-left" class="col-md-6 col-sm-6">
            <div  class="logo-footer">  
                <?php
                if ($is_active_sidebar_6 === TRUE){
                    dynamic_sidebar( 'sidebar-6' );
                }
                ?>
            </div>     
          </div>  
          <div id="footer-right" class="col-md-6 col-sm-6">
            <div class="copyright-info">
                <?php
                if ($is_active_sidebar_7 === TRUE){
                    dynamic_sidebar( 'sidebar-7' );
                }
                ?>
                <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => 'div', 'container_class' => 'footer-nav', 'menu_id' => 'nav', 'menu_class' => 'nav navbar-nav' ) ); ?>
            </div>
          </div>  
        </div> 
      </div>  
    </div>
    
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="#" class="back-to-top"><span></span></a> 

<?php wp_footer(); ?>

</body>
</html>
