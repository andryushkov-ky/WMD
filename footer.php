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
            <a href="https://icoanatomy.com/about-for-ico" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">For ICO teams</div>
            </a>
          </div>
          <div class="l-item">
            <a href="https://icoanatomy.com/about-for-investors" class="l-header">
              <div class="l-icon"></div>
              <div class="l-text">About us</div>
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

  <div class="main-footer">
  <div class="bottom-nav">
    <div class="bottom-nav__inner wrapper">
      <div class="bottom-nav__logo-wrap">
        <div class="logo-container">
          <a class="ico-footer-logo-box" href="https://icoanatomy.com" target="_self">
            <div class="ico-footer-logo-img"></div>
            <div class="logo-footer-logo-text"></div>
          </a>
        </div>
        <!--<a href="#" class="bottom-nav__logo"></a>-->
      </div>
      <div class="bottom-nav__right">
        <div class="bottom-nav__list">
          <a href="https://icoanatomy.com/rating/ongoing" class="bottom-nav__item">ICO</a>
          <a href="https://icoanatomy.com/coinlist" class="bottom-nav__item">Coinlist</a>
          <a href="https://icoanatomy.com/cryptofunds" class="bottom-nav__item">Cryptofunds</a>
          <a href="/" class="bottom-nav__item">News</a>
          <a href="/category/guides" class="bottom-nav__item">Guides</a>
          <a href="https://icoanatomy.com/about-for-ico" class="bottom-nav__item">For ICO teams</a>
          <a href="https://icoanatomy.com/about-for-investors" class="bottom-nav__item">About us</a>
        </div>

      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer__inner wrapper">
      <div class="footer__policy">
        <a class="footer__link" href="https://icoanatomy.com/_terms">Terms of services and Privacy policy</a>
        <br> &copy; ICOANATOMY 2018
      </div>
      <div class="footer__about">
        <div class="footer__about-desc">
          ICO Anatomy offers deep knowledge and professional
          analysis to help you find and attract investors
        </div>
      </div>
      <div class="bottom-nav__social">
        <div class="social social--min">
          <a href="https://www.facebook.com/ICOAnatomy-957837074381494/" class="social-link">
            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: rgba(255,255,255,0.96);"><g><path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0"></path></g></svg>
          </a>
          <a href="https://t.me/icoanatomy" class="social-link">
            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: rgba(255,255,255,0.96);"><g><path d="M9.028 20.837c-.714 0-.593-.271-.839-.949l-2.103-6.92L22.263 3.37"></path><path d="M9.028 20.837c.552 0 .795-.252 1.105-.553l2.941-2.857-3.671-2.214"></path><path d="M9.403 15.213l8.89 6.568c1.015.56 1.748.271 2-.942l3.62-17.053c.372-1.487-.564-2.159-1.534-1.72L1.125 10.263c-1.45.582-1.443 1.392-.264 1.753l5.455 1.7L18.94 5.753c.595-.36 1.143-.167.694.232"></path></g></svg>
          </a>
          <a href="https://twitter.com/icoanatomy" class="social-link">
            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: rgba(255,255,255,0.96);"><g><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"></path></g></svg>
          </a>
          <a href="https://www.linkedin.com/company/icoanatomy/" class="social-link">
            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%; fill: rgba(255,255,255,0.96);"><g><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path></g></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
