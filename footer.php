<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WMD Theme
 */
?>

	</div><!-- #content -->

	<div id="drawer">
		<div class="drawer-content sliding-content" data-direction="left">
			<div class="drawer-header">
				<a href="#" data-target-id="drawer" class="genericon no-animation genericon-close-alt toggle-button ripple-effect" data-ripple-mode="fixed">
					<span class="label">Close Drawer</span>
				</a>

				<?php mdb_site_logo( 'site_logo_drawer' ); ?>
				<h2 class="site-name"><?php bloginfo('name' ); ?></h2>
			</div><!-- .drawer-header -->

      <div class="left-navigation">
        <div class="drawer-list">
          <div class="l-item">
            <input type="checkbox" name="radio-ico" id="radio-ico" class="l-checkbox"/>
            <label for="radio-ico" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">ICO</div>
              <div class="l-arrow">
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: #212121;"><g><path d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"></path></g></svg>
              </div>
            </label>
            <div class="l-list">
              <a href="https://icoanatomy.com/rating/ongoing" class="o-item">
                <div class="o-icon">
                  <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g><path d="M23 8c0 1.1-.9 2-2 2-.18 0-.35-.02-.51-.07l-3.56 3.55c.05.16.07.34.07.52 0 1.1-.9 2-2 2s-2-.9-2-2c0-.18.02-.36.07-.52l-2.55-2.55c-.16.05-.34.07-.52.07s-.36-.02-.52-.07l-4.55 4.56c.05.16.07.33.07.51 0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2c.18 0 .35.02.51.07l4.56-4.55C8.02 9.36 8 9.18 8 9c0-1.1.9-2 2-2s2 .9 2 2c0 .18-.02.36-.07.52l2.55 2.55c.16-.05.34-.07.52-.07s.36.02.52.07l3.55-3.56C19.02 8.35 19 8.18 19 8c0-1.1.9-2 2-2s2 .9 2 2z"></path></g></svg>
                </div>
                <div class="o-text">Ongoing</div>
              </a>
              <a href="https://icoanatomy.com/rating/upcoming" class="o-item">
                <div class="o-icon">
                  <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g><path d="M22 5.72l-4.6-3.86-1.29 1.53 4.6 3.86L22 5.72zM7.88 3.39L6.6 1.86 2 5.71l1.29 1.53 4.59-3.85zM12.5 8H11v6l4.75 2.85.75-1.23-4-2.37V8zM12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9c4.97 0 9-4.03 9-9s-4.03-9-9-9zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"></path></g></svg>
                </div>
                <div class="o-text">Upcoming</div>
              </a>
              <a href="https://icoanatomy.com/rating/past" class="o-item">
                <div class="o-icon">
                  <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g><path d="M12 6c3.87 0 7 3.13 7 7 0 .84-.16 1.65-.43 2.4l1.52 1.52c.58-1.19.91-2.51.91-3.92 0-4.97-4.03-9-9-9-1.41 0-2.73.33-3.92.91L9.6 6.43C10.35 6.16 11.16 6 12 6zm10-.28l-4.6-3.86-1.29 1.53 4.6 3.86L22 5.72zM2.92 2.29L1.65 3.57 2.98 4.9l-1.11.93 1.42 1.42 1.11-.94.8.8C3.83 8.69 3 10.75 3 13c0 4.97 4.02 9 9 9 2.25 0 4.31-.83 5.89-2.2l2.2 2.2 1.27-1.27L3.89 3.27l-.97-.98zm13.55 16.1C15.26 19.39 13.7 20 12 20c-3.87 0-7-3.13-7-7 0-1.7.61-3.26 1.61-4.47l9.86 9.86zM8.02 3.28L6.6 1.86l-.86.71 1.42 1.42.86-.71z"></path></g></svg>
                </div>
                <div class="o-text">Past</div>
              </a>
            </div>
          </div>
          <div class="l-item">
            <a href="https://icoanatomy.com/coinlist" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">Coinlist</div>
            </a>
          </div>
          <div class="l-item">
            <a href="https://icoanatomy.com/cryptofunds" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">Cryptofunds</div>
            </a>
          </div>
          <div class="l-item">
            <a href="/category/guides" class="l-header">
              <div class="l-icon">
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: #f3a085;"><g><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"></path></g></svg>
              </div>
              <div class="l-text">Guides</div>
            </a>
          </div>
          <div class="l-item">
            <a href="/category/news" class="l-header">
              <div class="l-icon">
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: #f3a085;"><g><path d="M13.5.67s.74 2.65.74 4.8c0 2.06-1.35 3.73-3.41 3.73-2.07 0-3.63-1.67-3.63-3.73l.03-.36C5.21 7.51 4 10.62 4 14c0 4.42 3.58 8 8 8s8-3.58 8-8C20 8.61 17.41 3.8 13.5.67zM11.71 19c-1.78 0-3.22-1.4-3.22-3.14 0-1.62 1.05-2.76 2.81-3.12 1.77-.36 3.6-1.21 4.62-2.58.39 1.29.59 2.65.59 4.04 0 2.65-2.15 4.8-4.8 4.8z"></path></g></svg>
              </div>
              <div class="l-text">News</div>
            </a>
          </div>
          <div class="l-item">
            <a href="https://icoanatomy.com/_disclaimer" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">Disclaimer</div>
            </a>
          </div>
          <div class="l-item">
            <a href="https://icoanatomy.com/_terms" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">Terms & conditions</div>
            </a>
          </div>
        </div>
      </div>
		</div><!-- .drawer-content -->

		<div class="drawer-overlay toggle-button no-animation" data-target-id="drawer"></div>
	</div><!-- #drawer -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf( __( '&copy; %s News.icoanatomy.com, All rights reserved', 'mateiraldesignblog' ), date( 'Y' ) ); ?>
      <div class="ico-footer">
        <div class="ico-footer-logo-box">
          <div class="ico-footer-logo-img"></div>
          <div class="logo-footer-logo-text"></div>
        </div>
      </div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
