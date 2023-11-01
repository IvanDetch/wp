<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id="main-core".
 *
 * @package ThinkUpThemes
 */
?>

		</div><!-- #main-core -->
		</div><!-- #main -->
	</div>
	</div><!-- #content -->

	<div class="footer-group">
		
		<footer id="tanki-footer" class="tanki-footer">
        <div class="container">
            <div class="row flex-container-space-top">

                <div class="sidebar-footer sf-col-1">
                    <div id="logo-foot" class="inner-sidebar-footer"></div>
                </div>

                <div class="sidebar-footer sf-col-2">
                    <div id="menu-additional" class="inner-sidebar-footer">
                        <div class="menu-menu_footer-container"><ul id="menu-menu_footer" class="footer-menu"><li id="menu-item-33346" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-33346"><a href="https://tankionline.com/desktop/TankiOnlineSetup.exe">Скачать игру</a></li>
<li id="menu-item-33341" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33341"><a target="_blank" rel="noopener" href="https://tankionline.com/ru/gamerules/">Правила игры</a></li>
<li id="menu-item-33342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33342"><a target="_blank" rel="noopener" href="https://tankionline.com/ru/eula/">Лицензионное соглашение</a></li>
<li id="menu-item-33345" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33345"><a target="_blank" rel="noopener" href="https://tankionline.com/ru/privacy/">Политика конфиденциальности</a></li>
<li id="menu-item-43238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43238"><a href="https://tankionline.com/ru/dokumentaciya/">Документация</a></li>
</ul></div>                    </div>
                </div>

                <div class="sidebar-footer sf-col-3">
                    <div id="support-block" class="inner-sidebar-footer">
                        <div class="icon-support-footer"></div>
                        <div class="support-footer-txt-container">
                            <div class="foot-support-title">Служба поддержки:</div>
                            <a class="support-content-mail" href="mailto:help@tankionline.com">
                                <div class="foot-support-content">help@tankionline.com</div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="sidebar-footer sf-col-4">
                    <div id="social" class="inner-sidebar-footer">
                    <div id="custom_html-3" class="widget_text foot widget widget_custom_html"><div class="textwidget custom-html-widget"><a target="_blank" href="https://vk.com/tankionline" rel="noopener">
<div class="foot-social-el s-2"></div>
</a>

<a target="_blank" href="https://t.me/rutankionline" rel="noopener">
<div class="foot-social-el s-9"></div>
</a>
<a target="_blank" href="https://discord.com/invite/BQYPab8" rel="noopener">
<div class="foot-social-el s-1"></div>
</a>

<a target="_blank" href="https://www.youtube.com/user/tankionline" rel="noopener">
<div class="foot-social-el s-8"></div>
</a>
<a target="_blank" href="https://www.twitch.tv/tankisport_ru" rel="noopener">
<div class="foot-social-el twitch"></div>
</a>

</div></div>                        
                    </div>
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.tankionline.mobile.production">
                        <div class="g-play"></div>
                    </a>
                </div>
            </div>
        </div>
    </footer>
		<div id="upbutton" style="opacity: 1;"></div>
	<div>
		<?php /* Custom Footer Layout */ thinkup_input_footerlayout();
		echo	'<!-- #footer -->';  ?>
		
		<div id="sub-footer">
		<div id="sub-footer-core">
		
			<div class="copyright">
			<?php /* === Add custom footer === */ thinkup_input_copyright(); ?>
			</div>
			<!-- .copyright -->

			<?php if ( has_nav_menu( 'sub_footer_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'depth' => 1, 'container_class' => 'sub-footer-links', 'container_id' => 'footer-menu', 'theme_location' => 'sub_footer_menu' ) ); ?>
			<?php endif; ?>
			<!-- #footer-menu -->

			<?php if ( ! has_nav_menu( 'sub_footer_menu' ) ) : ?>
			<?php /* Social Media Icons */ thinkup_input_socialmediafooter(); ?>
			<?php endif; ?>

		</div>
		</div>
		<script>
		jQuery("div.lwptoc_itemWrap").on("click", "div.lwptoc_item", function() {
    		jQuery(".lwptoc_itemWrap div.lwptoc_item.active").removeClass("active");
    		jQuery(this).addClass("active");
		});
		</script>
		<script>
		(function($) {
			$(function () {
  				height_size = $(window).height();
  				$('.home-screen').css('height', height_size);
  				$('.background-mx-video').css('height', height_size);
  				$(window).resize(function () {
    				height_size = $(window).height();
    				$('.home-screen').css('height', height_size)
    				$('.background-mx-video').css('height', height_size);
    			});
  			});
		})(jQuery);
		</script>
		<script>
		// button up
		(function($) {
		$(function () {
			$(window).scroll(function () {
  				if ($(this).scrollTop() > 100) {
    				if ($('#upbutton').is(':hidden')) {
      					$('#upbutton').css({opacity: 1}).fadeIn('slow');
   					 }
  				} else {
    			$('#upbutton').stop(true, false).fadeOut('fast');
  				}
			});
			$('#upbutton').click(function () {
  			$('html, body').stop().animate({scrollTop: 0}, 300);
			});
		});
		})(jQuery);
		</script>

		<script>
		(function($) {
			$(function () {
				$(document).ready(function() {
					if($("div.toc").is(":empty")) {
						$('.widget_block:nth-child(2)').css('display', 'none');
					}	
				});
			});
		})(jQuery);
		</script>

	</footer><!-- footer -->
	</div>

</div><!-- #body-core -->

<?php wp_footer(); ?>

</body>
</html>
