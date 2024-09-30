<div class="footer-section">
  <div class="footer-widget-area section-padding-01">
    <div class="container">
      <div class="row gy-6">
        <div class="col-lg-4">
          <div class="footer-widget">
            <a class="footer-widget__logo" href="#"><img src="{{ asset('assets/school/images/sd-logo.png') }}"
                alt="Logo" width="150" height="32"></a>
            <div class="footer-widget__info">
              <span class="title">Call us</span>
              <span class="number">
                <a href="tel:1800 2588 074">
                  1800 2588 074</a></span>
            </div>
            <div class="footer-widget__info">
              <p>Sati Plaza, Barrackpore, Kolkata - 120</p>
              <p>info@schooldekho.org</p>
            </div>
            <div class="footer-widget__social-02">
              <a class="twitter" href="https://twitter.com/dekho_school" target="_blank">
                <svg viewBox="0 0 1200 1227" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" height="20px"
                  width="20px" role="none" class="u01b__icon-home">
                  <path
                    d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z">
                  </path>
                </svg>
              </a>
              <a class="facebook" href="https://www.facebook.com/MySchoolDekho/" target="_blank"><i
                  class="fab fa-facebook-f"></i></a>
              {{-- <a class="youtube" href="#" target="_blank"><i --}} {{-- class="fab fa-youtube"></i></a> --}}
              <a class="linkedin" href="https://www.linkedin.com/company/school-dekho/" target="_blank"><i
                  class="fab fa-linkedin-in"></i></a>
              {{-- <a class="instagram" href="https://www.instagram.com/schooil_dekho/" target="_blank"><i
                  class="fab fa-instagram"></i></a> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row gy-6">
            <div class="col-sm-4">
              <div class="footer-widget">
                <h4 class="footer-widget__title">About</h4>
                <ul class="footer-widget__link">
                  <li><a href=" {{ route('about-us') }}">About Us</a></li>
                  <li><a href="{{ route('contact') }}">Contact Us</a></li>
                  <li><a href="{{ route('blog.list') }}">News & Blogs</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="footer-widget">
                <h4 class="footer-widget__title">Links</h4>
                <ul class="footer-widget__link">
                  <li><a href="{{ route('school.refund') }}">Refund Policy</a></li>
                  <li><a href="{{ route('school.shipping') }}">Shipping Policy</a></li>
                  <li><a href="/careers">Careers</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="footer-widget">
                <h4 class="footer-widget__title">Information</h4>
                <ul class="footer-widget__link">
                  <li><a href=" {{ route('terms') }} ">Terms & Conditions</a></li>
                  <li><a href="{{ route('privacy') }}">Privacy Policy </a></li>
                  <li><a href="/sitemap.xml">Sitemap</a></li>
                  <li><a href="{{ route('faq') }}">FAQ</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="copyright-wrapper text-center">
        <ul class="footer-widget__link justify-content-center flex-row gap-8">
          <p>&copy; @php echo date('Y'); @endphp <span> School Dekho. All rights reserved.</p>
        </ul>
        <p class="footer-widget__copyright mt-0"> </span> Made with <i class="fa fa-heart"></i> in India by <a
            href="/">Team School Dekho .</a></p>
      </div>
    </div>
  </div>
</div>
<!-- Footer Copyright Area End -->
<button id="backBtn" class="back-to-top backBtn">
  <i class="arrow-top fal fa-long-arrow-up"></i>
  <i class="arrow-bottom fal fa-long-arrow-up"></i>
</button>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YK0SXZ88VD"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'G-YK0SXZ88VD');
</script>
<script type='text/javascript'>
  (function(I, L, T, i, c, k, s) {
    if (I.iticks) return;
    I.iticks = {
      host: c,
      settings: s,
      clientId: k,
      cdn: L,
      queue: []
    };
    var h = T.head || T.documentElement;
    var e = T.createElement(i);
    var l = I.location;
    e.async = true;
    e.src = (L || c) + '/client/inject-v2.min.js';
    h.insertBefore(e, h.firstChild);
    I.iticks.call = function(a, b) {
      I.iticks.queue.push([a, b]);
    };
  })(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com',
    'zLGpifE79tkaevvJ4_c', {});
</script>
<style>
  .back-to-top {
    right: 17px;
    bottom: 150px;
  }

  .iticks-notif-msg {
    bottom: 80px;
  }

  .iticks-pop-button {
    bottom: 75px;
  }

  @media only screen and (max-width: 767px) {
    .iticks-pop-button {
      bottom: 90px;
      width: 45px !important;
      height: 45px !important;
    }

    .iticks-pop-button img {
      width: 45px !important;
      height: 45px !important;
    }

    .back-to-top {
      right: 15px;
    }
  }
</style>
