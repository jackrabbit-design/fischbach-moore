<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
    
    <footer id="footer">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<div class="col-one pull-left">
					<?php //dynamic_sidebar('sidebar-5'); ?>
					<p>&copy; COPYRIGHT <?php echo date('Y'); ?>. FISCHBACH & MOORE.</p>
                    <span class="jackrabbit"><a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Website Design</a> by <a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Jackrabbit</a></span>
                </div>
                
                <div class="pull-right col-two">
                	<div>
                    	<a href="http://www.sullymac.com/" target="_blank" class="clearfix f-red-btn">
                            <div class="pull-left box-one">
                            <?php echo get_option('fischbach_addright'); ?>
                            </div>
                            <div class="logo pull-right">
                            <?php dynamic_sidebar('sidebar-4'); ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>  

	<?php wp_footer(); ?>
</body>
</html>