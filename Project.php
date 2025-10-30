<?php
$use_white_logo = true;
include 'Head.php';

// Whitelisted projects data
$projects = [
    'engineering-design-nyc' => [
        'title' => 'Engineering Design NYC',
        'image' => 'assets/img/home-1/projectOne/17.jpg',
        'summary' => 'Integrated engineering design for a mixed-use development in NYC.',
        'details' => 'Scope: Structural design, MEP coordination, BIM management and construction support. Delivered full design package and shop drawings.',
        'gallery' => [
            'assets/img/home-1/projectOne/1.jpg',
            'assets/img/home-1/projectOne/2.jpg',
            'assets/img/home-1/projectOne/3.jpg',
            'assets/img/home-1/projectOne/4.jpg',
            'assets/img/home-1/projectOne/5.jpg',
            'assets/img/home-1/projectOne/6.jpg',
            'assets/img/home-1/projectOne/7.jpg',
            'assets/img/home-1/projectOne/8.jpg',
            'assets/img/home-1/projectOne/9.jpg',
            'assets/img/home-1/projectOne/10.jpg',
            'assets/img/home-1/projectOne/11.jpg',
            'assets/img/home-1/projectOne/12.jpg',
            'assets/img/home-1/projectOne/13.jpg',
            'assets/img/home-1/projectOne/14.jpg',
            'assets/img/home-1/projectOne/15.jpg',
            'assets/img/home-1/projectOne/16.jpg',
            'assets/img/home-1/projectOne/17.jpg',
            'assets/img/home-1/projectOne/18.jpg',
            'assets/img/home-1/projectOne/19.jpg',
            'assets/img/home-1/projectOne/20.jpg',
            'assets/img/home-1/projectOne/21.jpg',
            'assets/img/home-1/projectOne/22.jpg',
            'assets/img/home-1/projectOne/23.jpg',
            'assets/img/home-1/projectOne/24.jpg',
            'assets/img/home-1/projectOne/25.jpg',
            'assets/img/home-1/projectOne/26.jpg',
            'assets/img/home-1/projectOne/27.jpg',
            'assets/img/home-1/projectOne/28.jpg',
            'assets/img/home-1/projectOne/29.jpg',
            'assets/img/home-1/projectOne/30.jpg',
            'assets/img/home-1/projectOne/31.jpg',
            'assets/img/home-1/projectOne/32.jpg',
            'assets/img/home-1/projectOne/33.jpg',
            'assets/img/home-1/projectOne/34.jpg',
            'assets/img/home-1/projectOne/35.jpg',
            'assets/img/home-1/projectOne/36.jpg',
            'assets/img/home-1/projectOne/37.jpg',
            'assets/img/home-1/projectOne/38.jpg',
            'assets/img/home-1/projectOne/39.jpg',
            'assets/img/home-1/projectOne/40.jpg',
            'assets/img/home-1/projectOne/41.jpg',
            'assets/img/home-1/projectOne/42.jpg',
            'assets/img/home-1/projectOne/43.jpg',
            'assets/img/home-1/projectOne/44.jpg',
            'assets/img/home-1/projectOne/45.jpg',
            'assets/img/home-1/projectOne/46.jpg',
            'assets/img/home-1/projectOne/47.jpg',
            'assets/img/home-1/projectOne/48.jpg',
            'assets/img/home-1/projectOne/49.jpg',
        ],
        'goal_image' => 'assets/img/home-1/projectOne/47.jpg',
        'challenge_image' => 'assets/img/home-1/projectOne/30.jpg',
        'documents' => [
            [
                'label' => 'GROUND FLOOR SETTING OUT PLAN',
                'file'  => 'assets/img/home-1/projectOne/GROUND%20FLOOR%20SETTING%20OUT%20PLAN.pdf'
            ],
            [
                'label' => 'SECOND FLOOR FURNITURE PLAN',
                'file'  => 'assets/img/home-1/projectOne/SECOND%20FLOOR%20FURNITURE%20PLAN.pdf'
            ]
        ]
    ],
    'construction-engineering' => [
        'title' => 'Construction Engineering',
        'image' => 'assets/img/home-1/projectOne/02.jpg',
        'summary' => 'Complex construction engineering for large scale projects.',
        'details' => 'Scope: Temporary works, erection sequencing, site supervision and QA/QC.',
        'gallery' => [
            'assets/img/home-1/projectOne/02.jpg',
            'assets/img/home-1/projectOne/03.jpg',
            'assets/img/inner-page/project-details/details-2.jpg'
        ],
        'goal_image' => 'assets/img/home-1/projectOne/goal-2.jpg',
        'challenge_image' => 'assets/img/home-1/projectOne/challenge-2.jpg',
    ],
    'telecommunication-towers' => [
        'title' => 'Telecommunication Towers',
        'image' => 'assets/img/home-1/projectOne/03.jpg',
        'summary' => 'Design and installation of telecom towers and equipment foundations.',
        'details' => 'Scope: Foundation design, antenna supports, grounding and lightning protection.',
        'gallery' => [
            'assets/img/home-1/projectOne/03.jpg',
            'assets/img/home-1/projectOne/04.jpg'
        ],
        'goal_image' => 'assets/img/home-1/projectOne/goal-3.jpg',
        'challenge_image' => 'assets/img/home-1/projectOne/challenge-3.jpg',
    ],
    'development-projects' => [
        'title' => 'Development Projects',
        'image' => 'assets/img/home-1/projectOne/04.jpg',
        'summary' => 'Master planning and implementation for multi-phase developments.',
        'details' => 'Scope: Phasing, civil works, utilities coordination and contractor management.',
        'gallery' => [
            'assets/img/home-1/projectOne/04.jpg',
            'assets/img/home-1/projectOne/05.jpg'
        ],
        'goal_image' => 'assets/img/home-1/projectOne/goal-4.jpg',
        'challenge_image' => 'assets/img/home-1/projectOne/challenge-4.jpg',
    ],
    'corporate-headquarters' => [
        'title' => 'Corporate Headquarters Build',
        'image' => 'assets/img/home-1/projectOne/05.jpg',
        'summary' => 'Turnkey delivery of a corporate headquarters building.',
        'details' => 'Scope: Shell & core, fit-out, MEP systems and final commissioning with handover.',
        'gallery' => [
            'assets/img/home-1/projectOne/05.jpg',
            'assets/img/home-1/projectOne/01.jpg'
        ],
        'goal_image' => 'assets/img/home-1/projectOne/goal-5.jpg',
        'challenge_image' => 'assets/img/home-1/projectOne/challenge-5.jpg',
    ]
];

// sanitize and select project
$key = isset($_GET['project']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['project'])) : 'engineering-design-nyc';
if (!array_key_exists($key, $projects)) {
    $key = 'engineering-design-nyc';
}
$project = $projects[$key];
?>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // convert in-page anchors (#...) to index.php#... when viewing Project.php
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        var h = a.getAttribute('href');
        if (h && h.length > 1) {
            a.setAttribute('href', 'index.php' + h);
        }
    });
});
</script>

<!-- GT Breadcrunb Section Start -->
<div class="gt-breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb-bg.jpg');">
    <div class="gt-right-shape">
        <img src="assets/img/breadcrumb-shape.jpg" alt="img">
    </div>
    <div class="container">
        <div class="gt-page-heading">
            <div class="gt-breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo htmlspecialchars($project['title']); ?></h1>
            </div>
            <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="index.php">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><?php echo htmlspecialchars($project['title']); ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- project details UI -->
<section class="project-details-section  fix mt-5">
    <div class="container">
        <div class="project-details-wrapper">
            <div class="row g-4">
                <div class="col-xl-12">
                    <div class="project-details-image">
                        <img src="<?php echo htmlspecialchars($project['image'] ?? 'assets/img/inner-page/project-details/details-1.jpg'); ?>" alt="img" class="img-fluid">
                    </div>
                </div>

                <div class="row g-4 mt-4">
                    <div class="col-lg-5">
                        <div class="project-informaion-box">
                            <h4>Project Information</h4>
                            <ul class="project-list">
                                <li>Project Category: <span><?php echo htmlspecialchars($project['category'] ?? $project['title']); ?></span></li>
                                <li>Clients: <span><?php echo htmlspecialchars($project['client'] ?? '—'); ?></span></li>
                                <li>Project Date: <span><?php echo htmlspecialchars($project['start_date'] ?? '—'); ?></span></li>
                                <li>Avenue End Date: <span><?php echo htmlspecialchars($project['end_date'] ?? '—'); ?></span></li>
                                <li>Locations: <span><?php echo htmlspecialchars($project['location'] ?? '—'); ?></span></li>
                                <li>Price After: <span><?php echo htmlspecialchars($project['price'] ?? '—'); ?></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="row g-4">
                            <?php
                            $thumbs = $project['gallery'] ?? [];
                            // ensure at least two thumbs
                            $thumb1 = $thumbs[1] ?? ($thumbs[0] ?? 'assets/img/inner-page/project-details/details-2.jpg');
                            $thumb2 = $thumbs[2] ?? ($thumbs[0] ?? 'assets/img/inner-page/project-details/details-3.jpg');
                            ?>
                            <div class="col-lg-6">
                                <div class="project-thumb">
                                    <img src="<?php echo htmlspecialchars($thumb1); ?>" alt="img" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="project-thumb">
                                    <img src="<?php echo htmlspecialchars($thumb2); ?>" alt="img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <h3>Project Overview</h3>
                    <p><?php echo nl2br(htmlspecialchars($project['overview'] ?? $project['summary'] ?? 'Project overview is not available.')); ?></p>

                    <h3 class="mt-3">Project Goal</h3>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="thumb">
                                <img src="<?php echo htmlspecialchars($project['goal_image'] ?? 'assets/img/inner-page/project-details/details-4.jpg'); ?>" alt="img" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="project-list-content">
                                <p><?php echo nl2br(htmlspecialchars($project['goal'] ?? 'Project goals and objectives are not specified.')); ?></p>
                                <?php if (!empty($project['goal_points']) && is_array($project['goal_points'])): ?>
                                    <div class="list-item">
                                        <ul class="list">
                                            <?php foreach ($project['goal_points'] as $idx => $pt) {
                                                // split into two columns roughly
                                                if ($idx % 2 === 0) {
                                                    echo '<li><i class="fa-regular fa-circle-check"></i> ' . htmlspecialchars($pt) . '</li>';
                                                }
                                            } ?>
                                        </ul>
                                        <ul class="list">
                                            <?php foreach ($project['goal_points'] as $idx => $pt) {
                                                if ($idx % 2 === 1) {
                                                    echo '<li><i class="fa-regular fa-circle-check"></i> ' . htmlspecialchars($pt) . '</li>';
                                                }
                                            } ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <h3 class="text mt-4">Project Challenge</h3>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="thumb">
                                <img src="<?php echo htmlspecialchars($project['challenge_image'] ?? 'assets/img/inner-page/project-details/details-4.jpg'); ?>" alt="img" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="content">
                                <p><?php echo nl2br(htmlspecialchars($project['challenge'] ?? 'Project challenges and mitigation strategies are not provided.')); ?></p>
                                <?php if (!empty($project['challenge_points']) && is_array($project['challenge_points'])): ?>
                                    <p class="mt-3">
                                        <strong>Key challenges:</strong>
                                    </p>
                                    <ul>
                                        <?php foreach ($project['challenge_points'] as $cp) {
                                            echo '<li>' . htmlspecialchars($cp) . '</li>';
                                        } ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-documents mt-4">
                    <h4>Project Documents</h4>
                    <?php if (!empty($project['documents']) && is_array($project['documents'])): ?>
                        <ul class="project-doc-list">
                            <?php foreach ($project['documents'] as $doc):
                                $url = htmlspecialchars($doc['file']);
                                $label = htmlspecialchars($doc['label']);
                            ?>
                                <li>
                                    <a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer" download>
                                        <i class="fa-regular fa-file-pdf"></i> <?php echo $label; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No documents available for this project.</p>
                    <?php endif; ?>
                </div>

            </div> <!-- /.row -->
        </div> <!-- /.project-details-wrapper -->
    </div> <!-- /.container -->
</section>

<!-- Project gallery (replaces instagram block) -->
<section class="gt-project-gallery-section section-padding">
    <div class="container">
        <div class="gt-section-title text-center mb-4">
            <h6 class="wow fadeInUp">Gallery</h6>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Project Photos</h2>
        </div>

        <div class="swiper gt-project-gallery">
            <div class="swiper-wrapper">
                <?php
                $gallery = !empty($project['gallery']) ? $project['gallery'] : [
                    'assets/img/home-1/gallery/gallery-01.jpg',
                    'assets/img/home-1/gallery/gallery-02.jpg'
                ];
                foreach ($gallery as $i => $img): ?>
                    <div class="swiper-slide">
                        <div class="gt-gallery-item">
                            <a href="<?php echo htmlspecialchars($img); ?>" class="gallery-popup" data-index="<?php echo $i; ?>">
                                <img src="<?php echo htmlspecialchars($img); ?>" alt="project photo" class="img-fluid gallery-thumb">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<style>
/* larger thumbnails */
.gt-gallery-item .gallery-thumb {
    width: 100%;
    height: 240px;
    object-fit: cover;
    border-radius: 6px;
}
.mfp-counter {
    position: absolute;
    right: 18px;
    top: 18px;
    color: #fff;
    background: rgba(0,0,0,0.45);
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 14px;
    z-index: 9999;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.gt-project-gallery', {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                0:   { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                992: { slidesPerView: 3 }
            }
        });
    }

    // MagnificPopup with image counter
    if (window.jQuery && jQuery.fn.magnificPopup) {
        var items = <?php echo json_encode(array_values($gallery)); ?>;
        jQuery('.gt-project-gallery .gallery-popup').magnificPopup({
            items: items.map(function(u){ return { src: u }; }),
            type: 'image',
            gallery: { enabled: true },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            callbacks: {
                open: function() {
                    var curr = this.index + 1;
                    var total = this.items.length;
                    if (!jQuery('.mfp-counter').length) {
                        jQuery('.mfp-wrap').append('<div class="mfp-counter">'+curr+' / '+total+'</div>');
                    } else {
                        jQuery('.mfp-counter').text(curr+' / '+total);
                    }
                },
                change: function() {
                    var curr = this.index + 1;
                    var total = this.items.length;
                    jQuery('.mfp-counter').text(curr+' / '+total);
                }
            }
        });
    }
});
</script>

<?php include 'Footer.php'; ?>