<?php
$use_white_logo = true;
include 'Head.php';

// determine requested sector (whitelist)
$allowed = [
    'industrial'  => [
        'title' => 'Industrial',
        'image' => 'assets/img/home-1/service/indus.jpeg',
        'overview' => 'Large-scale heavy civil and process facilities delivering durable, safe and maintainable infrastructure. We manage structural, mechanical, electrical and civil works across manufacturing, processing and utility sites.',
        'services' => [
            'Turnkey EPC for factories and processing plants',
            'Structural steel, precast and heavy concrete works',
            'Industrial MEP: substations, switchrooms, process piping',
            'Equipment foundations, machinery installation & alignment',
            'Shutdown, maintenance and turnaround execution'
        ],
        'capabilities' => [
            'On-site project & site management (HSE-focused)',
            'Heavy lifting & crane coordination',
            'Fabrication shop support & site welding/NDT',
            'Commissioning, testing and handover procedures'
        ],
        'typical_projects' => [
            'Cement, aggregate and materials processing plants',
            'Power distribution stations and substations',
            'Steel fabrication workshops and heavy assembly halls',
            'Industrial warehouses and logistics facilities'
        ],
        'experience' => 'Teams experienced in high-hazard permit systems, third-party inspections and coordinating multi-disciplinary contractors.',
        'case_studies' => [
            ['title' => 'Cement Plant Expansion', 'link' => '#'],
            ['title' => 'Substation Build & Commission', 'link' => '#']
        ]
    ],
    'commercial'  => [
        'title' => 'Commercial',
        'image' => 'assets/img/home-1/service/com.jpeg',
        'overview' => 'Commercial construction for offices, retail, healthcare and hospitality with focus on finish quality, schedule coordination and tenant requirements.',
        'services' => [
            'Shell & core and fit-out packages',
            'Retail and mall tenant works',
            'Healthcare fit-outs with regulatory compliance',
            'Facade, glazing and roofing systems'
        ],
        'capabilities' => [
            'Value engineering and buildability reviews',
            'Phased works to sustain occupied buildings',
            'Coordination with architects, landlords and consultants'
        ],
        'typical_projects' => [
            'Corporate offices and headquarter fit-outs',
            'Shopping mall retail units and kiosks',
            'Clinics and outpatient center fit-outs',
            'Hotel interior packages'
        ],
        'experience' => 'Strong record delivering high-quality finishes on accelerated schedules and working with designers to meet brand standards.',
        'case_studies' => [
            ['title' => 'Office Tower Fit-Out', 'link' => '#'],
            ['title' => 'Retail Rollout Program', 'link' => '#']
        ]
    ],
    'finishes'    => [
        'title' => 'Finishes',
        'image' => 'assets/img/home-1/service/fini.png',
        'overview' => 'High-end interior and exterior finishes — millwork, decorative ceilings, specialist coatings and precision installations to match architectural intent.',
        'services' => [
            'Custom joinery and millwork',
            'Decorative plaster, paint systems and textured finishes',
            'Flooring, tiling and stonework',
            'Acoustic and suspended ceiling systems'
        ],
        'capabilities' => [
            'Mockups and sample approvals with design teams',
            'Specialist finishing crews and strict QA processes',
            'Material sourcing and bespoke fabrication'
        ],
        'typical_projects' => [
            'Luxury apartments and penthouses',
            'Corporate lobbies and executive suites',
            'High-end retail fit-outs and showrooms'
        ],
        'experience' => 'Delivering finishes to tight tolerances with dedicated QA checklists and sign-off procedures.',
        'case_studies' => [
            ['title' => 'Luxury Apartment Interiors', 'link' => '#'],
            ['title' => 'Flagship Retail Store Fit-Out', 'link' => '#']
        ]
    ],
    'engineering' => [
        'title' => 'Engineering And Design',
        'image' => 'assets/img/home-1/service/desig.png',
        'overview' => 'Integrated engineering, MEP and design coordination from concept through construction documentation and shop drawings.',
        'services' => [
            'Concept design and feasibility studies',
            'Structural, MEP and civil design packages',
            'Shop drawings, fabrication details and BIM coordination',
            'Clash detection and constructability reviews'
        ],
        'capabilities' => [
            'In-house CAD/BIM modelling and coordination',
            'Design for constructability and cost optimisation',
            'Field engineering support during construction'
        ],
        'typical_projects' => [
            'Design packages for industrial process facilities',
            'MEP coordination for large commercial projects',
            'Shop drawing production for fabrication'
        ],
        'experience' => 'Support multidisciplinary projects with on-site engineering and rapid revision workflows.',
        'case_studies' => [
            ['title' => 'BIM Coordination for Mixed-Use', 'link' => '#'],
            ['title' => 'MEP Design for Healthcare Facility', 'link' => '#']
        ]
    ]
];

$raw = isset($_GET['sector']) ? strtolower(trim($_GET['sector'])) : 'industrial';
$raw = preg_replace('/[^a-z]/', '', $raw); // simple sanitize
$sector_key = array_key_exists($raw, $allowed) ? $raw : 'industrial';
$sec = $allowed[$sector_key];
?>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // convert in-page anchors (#...) to index.php#... when viewing Sector.php
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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo htmlspecialchars($sec['title']); ?></h1>
                </div>
                <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="index.php">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li><?php echo htmlspecialchars($sec['title']); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- GT Contact Section Start -->
<section class="news-details-section section-padding">
        <div class="container">
            <div class="gt-news-details-wrapper">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="gt-details-image">
                            <img src="<?php echo htmlspecialchars($sec['image']); ?>" alt="img">
                        </div>
                        <div class="gt-news-details-content">
                            <h3><?php echo htmlspecialchars($sec['title']); ?></h3>

                            <?php if (!empty($sec['overview'])): ?>
                                <p><?php echo htmlspecialchars($sec['overview']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($sec['services'])): ?>
                                <h5>Core services</h5>
                                <ul>
                                    <?php foreach ($sec['services'] as $s): ?>
                                        <li><?php echo htmlspecialchars($s); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if (!empty($sec['capabilities'])): ?>
                                <h5>Capabilities</h5>
                                <ul>
                                    <?php foreach ($sec['capabilities'] as $c): ?>
                                        <li><?php echo htmlspecialchars($c); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if (!empty($sec['typical_projects'])): ?>
                                <h5>Typical projects</h5>
                                <ul>
                                    <?php foreach ($sec['typical_projects'] as $p): ?>
                                        <li><?php echo htmlspecialchars($p); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if (!empty($sec['experience'])): ?>
                                <p><strong>Experience:</strong> <?php echo htmlspecialchars($sec['experience']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($sec['case_studies'])): ?>
                                <h5>Case studies</h5>
                                <ul>
                                    <?php foreach ($sec['case_studies'] as $case): ?>
                                        <li><a href="<?php echo htmlspecialchars($case['link']); ?>"><?php echo htmlspecialchars($case['title']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <p class="mt-3">
                                <a href="index.php#contact-us" class="btn btn-primary">Contact us about <?php echo htmlspecialchars($sec['title']); ?></a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="gt-main-sideber sticky-style">
                            <div class="gt-single-sideber-widget">
                                <div class="gt-widget-title">
                                    <h4>Other Sectors</h4>
                                </div>
                                <ul>
                                    <?php
                                    $items = [
                                        'industrial' => 'Industrial',
                                        'commercial' => 'Commercial',
                                        'finishes'   => 'Finishes',
                                        'engineering'=> 'Engineering & Design'
                                    ];
                                    foreach ($items as $key => $label) {
                                        $liClass = ($sector_key === $key) ? ' class="active"' : '';
                                        echo '<li' . $liClass . '><a href="Sector.php?sector=' . htmlspecialchars($key) . '">' . htmlspecialchars($label) . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
   </section>

<?php
include 'Footer.php';
?>