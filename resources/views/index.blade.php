<?php
// Parent Page needs Directory Setting
$pathlevel = "";
require_once $pathlevel . "dir-setting.php";

$parentPage = "";
$page = "index";
$pageTitle = "";
$title = $metaTitle;
$url = $domainName . $page;
$robotIndex = "index, follow";

// Get Data
require_once $retrieve_dir . "company-profile/index.php";

$is_myco = 1;
?>

<html lang="en">
    
<head>

    <!-- Meta Tag Here -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta name="title" content="<?= $metaTitle; ?>">
    <meta name="url" content="<?= $url; ?>">
    <meta content="<?= $metaDescription; ?>" name="description">
    <meta content="<?= $metaKeyword; ?>" name="keywords">
    <meta name="robots" content="<?= $robotIndex; ?>">

    <meta property="og:title" content="<?= $metaTitle; ?>">
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:description" content="<?= $metaDescription; ?>">
    <meta property="og:site_name" content="<?= $metaTitle; ?>" />

    <!-- Template Main CSS File -->
    <?php require_once $config_dir . "css.php"; ?>

</head>

<body>
    <h1 class="d-none">
        <?= $metaDescription ?>
    </h1>

    <!-- ======= Header Here ======= -->
    <?php require_once $docs_dir . "header.php"; ?>

    <!-- ======= Hero Section ======= -->
    <section id="main-bg">
        <div class="main-bg-slider swiper" data-aos="fade-left" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php foreach ($slider_swiper_hero as $image_hero) { ?>
                    <div class="swiper-slide">
                        <div class="main-bg-item">
                            <img src="<?= $image_dir . $image_hero['url']; ?>?s=<?= filemtime($image_dir . $image_hero['url']); ?>">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>


    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <p class="h1 text-white font-monserrat-bold" style="font-size: 48px;"><i><?= $slider_text_hero["title"]; ?></i></p>
                    <p class="h2 font-monserrat mb-5" style="font-size: 24px; font-weight: normal; color: rgba(255, 255, 255, 0.6);"><?= $slider_text_hero["description"]; ?></p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#" class="btn-get-started" data-toggle="modal" data-target="#preferenceModal">
                            Booking Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper client-slider">
                        <?php for ($i = 0; $i < count($slider_testimonial) / 5; $i++) { ?>
                            <div class="swiper-slide testimonials-swiper">
                                <?php for ($j = 0 + ($i * 5); $j < ($i + 1) * 5; $j++) {
                                    $aos_delay = 100; ?>
                                    <div class="testimonial-item" style="margin-left: 20px;">

                                        <center>
                                            <img src="<?= $image_dir . $slider_testimonial[$j]['url'] ?>?s=<?= filemtime($image_dir . $slider_testimonial[$j]['url']); ?>" class="img-fluid" alt="">
                                        </center>

                                    </div>
                                <?php $aos_delay += 100;
                                }
                                ?>
                            </div><!-- End testimonial item -->
                        <?php } ?>
                    </div>
                    <br>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p class="h2"><?= $pricing["title"] ?></p>
                    <p><?= $pricing["description"] ?></p>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <img src="<?= $image_dir . $pricing['image_pricing'] ?>?s=<?= filemtime($image_dir . $pricing['image_pricing']); ?>" width="75%">
                        </center>
                    </div>
                </div>

            </div>
        </section><!-- End Pricing Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p class="h2"><?= $services["title"]; ?></p>
                    <p></p>
                </div>

                <div class="row">
                    <?php foreach ($services["content"] as $content) { ?>
                        <div class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box featured">
                                <div class="icon">
                                    <center>
                                        <img src="<?= $image_dir; ?>logo/myco-black-64.png?s=<?= filemtime($image_dir . 'logo/myco-black-64.png'); ?>" />
                                        <img class="logo-mycox-ruang-kerja-pilihan" src="<?= $image_dir; ?>logo/myco-x-landscape.png?s=<?= filemtime($image_dir . 'logo/myco-x-landscape.png'); ?>" />
                                    </center>
                                </div>
                                <div class="space-box">
                                    <p class="h4"><a href=""><?= $content["title_content"] ?></a></p>
                                    <p><?= $content["description"] ?></p>
                                    <br>
                                    <div class="row content">
                                        <?php foreach ($content["list"] as $key => $list) {
                                            if ($key % 3 == 0) { ?>
                                                <div class="col-md-6">
                                                    <ul>
                                                    <?php } ?>
                                                    <li>
                                                        <a href="<?= $spaces_dir; ?>private-office" target="_tab">
                                                            <i class="ri-check-double-line"></i> <?= $list ?>
                                                        </a>
                                                    </li>
                                                    <?php $key++;
                                                    if ($key % 3 == 0) { ?>
                                                    </ul>
                                                </div>
                                        <?php }
                                                } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-12 text-center text-lg-start">
                        <p class="h3">Punya permintaan khusus?</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a class="cta-btn align-middle" href="https://api.whatsapp.com/send?phone=6289633299494&text=Hai%20Admin%20MyCo,%20saya%20mau%20tanya%20perihal%20office%20space%20di%20MyCo%0ANama%20:%20%0AEmail%20:%20%0AKebutuhan%20:%20">
                            Whatsapp kami <i class="ri-whatsapp-fill"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p class="h2"><?= $what_they_say["title"]; ?></p>
                    <p><?= $what_they_say["description"]; ?></p>
                </div>

                <div class="swiper mySwiper" style="height:fit-content;">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < count($what_they_say["details"]) / 4; $i++) { ?>
                            <div class="swiper-slide">
                                <div class="row">
                                    <?php for ($j = 0 + ($i * 4); $j < ($i + 1) * 4; $j++) {
                                        $aos_delay = 100; ?>
                                        <div class="col-lg-6 mt-4">
                                            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="<?= $aos_delay; ?>">
                                                <div class="pic"><img src="<?= $image_dir . $what_they_say["details"][$j]["image_url"]; ?>?s=<?= filemtime($image_dir . $what_they_say["details"][$j]["image_url"]); ?>" class="img-fluid" alt=""></div>
                                                <div class="member-info">
                                                    <p class="h4"><?= $what_they_say["details"][$j]["name"]; ?></p>
                                                    <span><?= $what_they_say["details"][$j]["position"]; ?></span>
                                                    <p><?= $what_they_say["details"][$j]["message"]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $aos_delay += 100;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>


            </div>
        </section><!-- End Team Section -->

        <!-- ======= Newsletter Here ======= -->
        <?php require_once $docs_dir . "newsletter.php"; ?>

    </main><!-- End #main -->

    <!-- ======= Footer Here ======= -->
    <?php require_once $docs_dir . "footer.php"; ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Modal Here -->
    <?php // require_once $modal_dir . "promotion.php"; 
    ?>

    <!-- Modal Here -->
    <?php require_once $modal_dir . "preference.php"; ?>

    <!-- Modal Here -->
    <?php require_once $modal_dir . "booking.php"; ?>

    <!-- Modal Here -->
    <?php require_once $modal_dir . "booking-success.php"; ?>

    <!-- Modal Here -->
    <?php require_once $modal_dir . "newsletter-success.php"; ?>

    <!-- Template Main JS File -->
    <?php require_once $config_dir . "js.php"; ?>

</body>

</html>

<script type="text/javascript">
    page = "<?= $page; ?>";
    mycoCity = "<?= $mycoCity; ?>";
    mycoPreference = "<?= $mycoPreference; ?>";
    mycoLocation = "<?= $mycoLocation; ?>";
    mycoName = "<?= $mycoName; ?>";
    mycoType = "<?= $mycoType; ?>";
    mycoTypeName = "<?= $mycoTypeName; ?>";

    <?php if ($_SESSION["company_profile"]["booking"] == "1") { ?>
        $("#bookingSuccessModal").modal("show");
        <?php unset($_SESSION["company_profile"]["booking"]); ?>
    <?php } elseif ($_SESSION["company_profile"]["newsletter"] == "1") { ?>
        $("#newsletterSuccessModal").modal("show");
        <?php unset($_SESSION["company_profile"]["newsletter"]); ?>
    <?php } else { ?>
        $("#promotionModal").modal("show");
    <?php } ?>
</script>
<script src="<?= $javascript_dir; ?>company-profile/booking.js?s=<?= filemtime($javascript_dir . 'company-profile/booking.js'); ?>">
</script>