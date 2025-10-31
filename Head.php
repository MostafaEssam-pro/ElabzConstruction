<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    <head>
    <!-- ========== Basic Meta Tags ========== -->
    <?php
      $isHttps = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
      $origin = ($isHttps ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
      $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
      $pathOnly = parse_url($requestUri, PHP_URL_PATH) ?: '/';
      $canonicalUrl = $origin . $pathOnly;
      $defaultOgImage = $origin . '/assets/img/home-1/project/cover.jpg';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ========== Primary SEO Meta Tags ========== -->
    <title>OMRAN Engineering & Construction | Reliable, Integrated Building Solutions in Egypt</title>
    <meta name="description" content="OMRAN Engineering & Construction — experts in civil, architectural, electrical, and mechanical works for residential, commercial, and industrial projects in Egypt. Over 10 years of trusted experience.">
    <meta name="keywords" content="OMRAN Engineering, OMRAN Construction, Construction Egypt, Engineering Company Egypt, Civil Engineering, MEP, Architecture Design, Industrial Projects, Commercial Buildings, Finishes, Cairo Contractors, Building Company, Engineering Firm Cairo">
    <meta name="author" content="OMRAN Engineering & Construction">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="rating" content="general">

    <!-- ========== Language & Locale ========== -->
    <meta name="language" content="English">
    <meta http-equiv="content-language" content="en">
    <link rel="alternate" hreflang="en" href="<?php echo $origin; ?>/">
    <link rel="alternate" hreflang="ar" href="<?php echo $origin; ?>/ar/">

    <!-- ========== Canonical & URL Tags ========== -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES); ?>">

    <!-- ========== Geo & Local Business ========== -->
    <meta name="geo.region" content="EG">
    <meta name="geo.placename" content="New Cairo, Cairo, Egypt">
    <meta name="geo.position" content="30.0330;31.2337">
    <meta name="ICBM" content="30.0330, 31.2337">

    <!-- ========== Open Graph / Facebook ========== -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="OMRAN Engineering & Construction">
    <meta property="og:title" content="OMRAN Engineering & Construction | Building Trust, Quality & Innovation">
    <meta property="og:description" content="We design and build high-quality residential, commercial, and industrial projects in Egypt with full engineering and MEP services.">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($defaultOgImage, ENT_QUOTES); ?>">
    <meta property="og:locale" content="en_US">

    <!-- ========== Twitter Card ========== -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="OMRAN Engineering & Construction | Reliable, Integrated Building Solutions">
    <meta name="twitter:description" content="Trusted engineering & construction firm in Egypt — delivering excellence for over a decade.">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($defaultOgImage, ENT_QUOTES); ?>">
    <meta name="twitter:site" content="@OMRANEngineering">

    <!-- ========== Google Verification & Others ========== -->
    <meta name="google-site-verification" content="YOUR_GOOGLE_VERIFICATION_CODE">
    <meta name="msvalidate.01" content="YOUR_BING_VERIFICATION_CODE">
    <meta name="yandex-verification" content="YOUR_YANDEX_CODE">

    <!-- ========== Performance & PWA ========== -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#f8b500">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- ========== Favicon & App Icons ========== -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

    <!-- ========== Resource Hints ========== -->
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://www.google.com" crossorigin>
    <link rel="preconnect" href="https://maps.google.com" crossorigin>

    <!-- Preload critical hero imagery -->
    <link rel="preload" as="image" href="assets/img/home-1/hero/hero-bg.jpg" fetchpriority="high">
    <link rel="preload" as="image" href="assets/img/home-1/hero/hero-1.png" fetchpriority="high">

    <!-- ========== Fonts & Stylesheets ========== -->
    <!-- Core CSS -->
        <!--<< Favcion >>-->

        <link rel="shortcut icon" href="assets/img/favicon.svg">
        <!--<< Bootstrap min.css >>-->
        <link rel="preload" as="style" href="assets/css/bootstrap.min.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/bootstrap.min.css"></noscript>
        <!--<< All Min Css >>-->
        <link rel="preload" as="style" href="assets/css/all.min.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/all.min.css"></noscript>
        <!--<< Animate.css >>-->
        <link rel="preload" as="style" href="assets/css/animate.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/animate.css"></noscript>
        <!--<< Magnific Popup.css >>-->
        <link rel="preload" as="style" href="assets/css/magnific-popup.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/magnific-popup.css"></noscript>
        <!--<< MeanMenu.css >>-->
        <link rel="preload" as="style" href="assets/css/meanmenu.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/meanmenu.css"></noscript>
        <!--<< Swiper Bundle.css >>-->
        <link rel="preload" as="style" href="assets/css/swiper-bundle.min.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/swiper-bundle.min.css"></noscript>
        <!--<< Splitting.css >>-->
        <link rel="preload" as="style" href="assets/css/splitting.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/splitting.css"></noscript>
        <!--<< Nice Select.css >>-->
        <link rel="preload" as="style" href="assets/css/nice-select.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/nice-select.css"></noscript>
        <!-- box layout css -->
        <link rel="preload" as="style" href="assets/css/rtl.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/rtl.css"></noscript>
        <!-- box layout css -->
        <link rel="preload" as="style" href="assets/css/box-layout.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/box-layout.css"></noscript>
        <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"></noscript>
        <!--<< Icomon.css >>-->
        <link rel="preload" as="style" href="assets/css/icomon.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/icomon.css"></noscript>
        <!--<< Main.css >>-->
        <link rel="preload" as="style" href="assets/css/main.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/main.css"></noscript>

    <!-- ========== Font Preloads ========== -->
    <link rel="preload" as="font" type="font/woff2" href="assets/webfonts/fa-solid-900.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="assets/webfonts/fa-regular-400.woff2" crossorigin>

    <!-- ========== Accessibility: Skip Link Styles ========== -->
    <style>
      .skip-to-content{position:absolute;left:-999px;top:auto;width:1px;height:1px;overflow:hidden}
      .skip-to-content:focus{position:static;left:auto;width:auto;height:auto;display:inline-block;padding:8px 12px;background:#000;color:#fff;z-index:1000}
      /* Disable blocking preloader overlay */
      .preloader,.loader{display:none !important}
      /* Respect reduced motion and lighten main thread */
      @media (prefers-reduced-motion: reduce){
        *,*::before,*::after{animation-duration:0.001ms !important;animation-iteration-count:1 !important;transition-duration:0.001ms !important;scroll-behavior:auto !important}
      }
    </style>

    <!-- ========== Structured Data / Schema.org ========== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "OMRAN Engineering & Construction",
      "url": "https://yourdomain.com/",
      "logo": "https://yourdomain.com/assets/img/logo.png",
      "foundingDate": "2015",
      "founder": {
        "@type": "Person",
        "name": "Eng. Mohamed OMRAN"
      },
      "description": "OMRAN Engineering & Construction — a trusted construction and engineering firm offering civil, architectural, electrical, and mechanical solutions across Egypt.",
      "telephone": "+20-120-506-2226",
      "email": "info@example.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "23 Talat Harb Axis, New Cairo",
        "addressLocality": "Cairo",
        "addressCountry": "EG"
      },
      "areaServed": "Egypt",
      "sameAs": [
        "https://facebook.com/omranengineering",
        "https://instagram.com/omranengineering",
        "https://linkedin.com/company/omranengineering"
      ]
    }
    </script>

    <!-- ========== Local Business Schema ========== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "OMRAN Engineering & Construction",
      "image": "https://yourdomain.com/assets/img/home-1/project/cover.jpg",
      "@id": "https://yourdomain.com/",
      "url": "https://yourdomain.com/",
      "telephone": "+20-120-506-2226",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "23 Talat Harb Axis, New Cairo",
        "addressLocality": "Cairo",
        "addressCountry": "EG"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 30.0330,
        "longitude": 31.2337
      },
      "openingHoursSpecification": [{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Sunday"],
        "opens": "09:00",
        "closes": "18:00"
      }],
      "sameAs": [
        "https://facebook.com/omranengineering",
        "https://instagram.com/omranengineering",
        "https://linkedin.com/company/omranengineering"
      ]
    }
    </script>

    <!-- close head -->
    </head>
    <body>
    <a href="#main-content" class="skip-to-content">Skip to content</a>

        <div class="page-wrapper" id="home">
         <!-- Preloader Container -->
        <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
                <span data-text-preloader="L" class="letters-loading">
                    L
                </span>
                <span data-text-preloader="B" class="letters-loading">
                    B
                </span>
                <span data-text-preloader="A" class="letters-loading">
                    A
                </span>
                <span data-text-preloader="Z" class="letters-loading">
                    Z
                </span>
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
                <span data-text-preloader="G" class="letters-loading">
                    G
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>


        <!-- GT Back To Top Start -->
        <button id="gt-back-top" class="gt-back-to-top show">
           <i class="fa-solid fa-arrow-up"></i>
        </button>

        <!-- GT MouseCursor Start -->
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div>

        <!-- Offcanvas Area Start -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="#home">
                                    <img height="60" width="215" src="assets/img/logo/black-logo.png" alt="OMRAN logo" loading="lazy" decoding="async">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button type="button" aria-label="Close menu">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text d-none d-xl-block">
                            With over 10 years of experience in construction, we offer clients a reliable, all-in-one solution for residential, commercial, and industrial projects.
                        </p>
                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact">
                            <h4>Contact Info</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#home">23 Talat Harb Axis, New Cairo, Cairo, Egypt</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <span>Monday-Friday, 09am-05pm</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+0201205062226">+020 120 5062226</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                <a href="#contact-us" class="gt-theme-btn">
                                    <span class="gt-icon-btn"><i class="icon-icon-1"></i></span>
                                    <span class="gt-text-btn">
                                        <span class="gt-text-2">Contact Us</span>
                                    </span>
                                </a>
                            </div>
                            <div class="social-icon d-flex align-items-center">
                                <a href="https://www.facebook.com/share/17AkcYVbKw/?mibextid=wwXIfr"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/omran_engineering_construction?igsh=MTg2NG84Z3dwZDV2Zw=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Header Section Start -->
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
if ($currentPage === 'Sector.php' || $currentPage === 'Project.php') {
    include 'NavBarWhite.php';
} else {
    include 'NavBarWhite.php';
}
?>
