<?php 
$profile_data = get_profile($car_view["post_author_id"]);

$profile_admin_data = get_profile(1);

$footer_data = get_header_footer_by_id(1);

?>

<?php
// Calculate if bid has reached 90% of fixed price
$hide_fast_pris = false;

// Hide if fixed price is not entered or is 0
if (empty($car_view["fixed_price"]) || $car_view["fixed_price"] == 0) {
    $hide_fast_pris = true;
}

// Hide if bid reached 90% of fixed price
if (!empty($highest_bid) && !empty($car_view["fixed_price"]) && $car_view["fixed_price"] > 0) {
    $target_price = !empty($car_view["reduce_price"]) ? $car_view["reduce_price"] : $car_view["fixed_price"];
    $threshold = $target_price * 0.90;
    if ($highest_bid >= $threshold) {
        $hide_fast_pris = true;
    }
}

// Hide in last 24 hours of auction
$timer_data = get_auction_timer_data($car_view['id']);
if ($timer_data['show_timer']) {
    $hide_fast_pris = true;
}
?>

<style>
    /* changes made by muslim ahmad */
    @media (max-width: 576px) {
        
    .car-details-area .kye-features ul {
        -webkit-columns: unset !important;
        -moz-columns: unset !important;
        columns: unset !important;

        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;

        -webkit-flex-wrap: wrap !important;
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;

        gap: 6px 14px !important;
    }

    .car-details-area .kye-features ul li {
        width: auto !important;
        white-space: nowrap !important;
    }
    .lead_wrap2 {
        font-size:12.5px !important;
    }
    .lead_wrap1 {
    font-size: 12.5px !important;
    }
}

.car-details-area .overview-content ul li {
    color: black;
}
li span {
    color: black;
}
    </style>

    <style>

/* NEW: Bid Type Badges */
.bid-type-badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 600;
    margin-left: 8px;
    text-transform: uppercase;
}

.bid-type-manual {
    background-color: #10b981;
    color: white;
}

.bid-type-auto {
    background-color: #3b82f6;
    color: white;
}

.bid-type-max-reached {
    background-color: #f59e0b;
    color: white;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.bid-history-item {
    padding: 10px 15px;
    border-bottom: 1px solid #e5e7eb;
    transition: background-color 0.2s;
}

.bid-history-item:hover {
    background-color: #f9fafb;
}

.bidder-info {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.bidder-name {
    font-weight: 600;
    color: #1f2937;
}

.bid-amount-info {
    text-align: right;
}

.bid-amount {
    font-weight: 700;
    color: #111827;
    font-size: 16px;
}

.bid-time {
    font-size: 11px;
    color: #6b7280;
    display: block;
    margin-top: 2px;
}

.max-reached-notice {
    display: block;
    font-size: 10px;
    color: #f59e0b;
    font-style: italic;
    margin-top: 4px;
    font-weight: 600;
}

.auto-bid-icon {
    color: #3b82f6;
    margin-left: 4px;
}
</style>
<div class="car-details-area mt-4 pt-50 mb-40" style="padding-top:0px;">
<div class="container">
<div class="row mt_po5 mb-50">
<div class="col-lg-12 position-relative">
<div class="car-details-menu">
<nav id="navbar-example2" class="navbar">
<ul class="nav nav-pills">
<li class="nav-item">
<a class="nav-link" href="#car-img">Bilfoton</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#car-info">Bilinfo</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#kye-features">Utrustning</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#overview">Bilfakta</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#performance">Tekniska data</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#car-color">Anmärkning Bilder</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#recommended">Rekommenderad  </a>
</li>
</ul>
</nav>
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-12" style="font-size:0px !important;">
        <!-- SWIPER.JS DUPLICATE SLIDER SECTION -->
<div class="col-lg-12 mb-5">
    <div class="swiper-container-wrapper">
        <!-- Main Swiper Slider -->
        <div class="swiper main-swiper-test">
            <div class="swiper-wrapper">
                <?php 
                // Reuse the same gallery images from above
                if(!empty($car_view["car_photo_gallery_ids"])){
                    $gallery_images_duplicate = json_decode($car_view["car_photo_gallery_ids"], true); 
                    $gallery_images_duplicate = json_decode($gallery_images_duplicate);
                    
                    if (is_array($gallery_images_duplicate) && !empty($gallery_images_duplicate)) {
                        foreach ($gallery_images_duplicate as $image) {
                ?>
                            <div class="swiper-slide">
                                <img src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } else { echo base_url().'/uploads/preview.png'; } ?>" alt="Car Image">
                            </div>
                <?php
                        }
                    }
                } 
                ?>
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- Thumbnail Swiper Slider -->
        <div class="swiper thumbnail-swiper-test">
            <div class="swiper-wrapper">
                <?php 
                if (isset($gallery_images_duplicate) && is_array($gallery_images_duplicate) && !empty($gallery_images_duplicate)) {
                    foreach ($gallery_images_duplicate as $image) {
                ?>
                    <div class="swiper-slide">
                        <img src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" alt="Thumbnail">
                    </div>
                <?php 
                    }
                }
                ?>
            </div>
            <!-- Thumbnail navigation buttons -->
            <div class="thumbnail-button-next">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path d="M5 15l5-5-5-5" stroke="currentColor" stroke-width="2" fill="none"/>
                </svg>
            </div>
            <div class="thumbnail-button-prev">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path d="M15 5l-5 5 5 5" stroke="currentColor" stroke-width="2" fill="none"/>
                </svg>
            </div>
        </div>
    </div>
</div>
<!-- END SWIPER.JS DUPLICATE SLIDER SECTION -->

<!-- Add Swiper CSS (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper Styles -->
<style>
/* Container Wrapper */
.swiper-container-wrapper {
    display: flex;
    gap: 15px;
    width: 100%;
}

/* Main Slider */
.main-swiper-test {
    width: 82%;
    height: 800px;
    position: relative;
}

.main-swiper-test .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #000;
}

.main-swiper-test .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Thumbnail Slider */
.thumbnail-swiper-test {
    width: 18%;
    height: 800px;
    position: relative;
    overflow: hidden;
}

.thumbnail-swiper-test .swiper-slide {
    height: auto !important;
    margin-bottom: 8px;
    cursor: pointer;
    opacity: 0.5;
    border: 3px solid transparent;
    transition: all 0.3s;
    filter: grayscale(50%);
}

.thumbnail-swiper-test .swiper-slide-thumb-active {
    opacity: 1;
    border-color: white;
    filter: grayscale(0%);
}

.thumbnail-swiper-test .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

/* Thumbnail Navigation Buttons */
.thumbnail-button-prev,
.thumbnail-button-next {
    position: absolute;
    width: 100%;
    height: 30px;
    background: rgba(255, 255, 255, 0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: opacity 0.3s;
    left: 0;
}

.thumbnail-button-prev {
    top: 0;
    transform: rotate(180deg);
}

.thumbnail-button-next {
    bottom: 0;
}

.thumbnail-button-prev.swiper-button-disabled,
.thumbnail-button-next.swiper-button-disabled {
    opacity: 0.1;
    cursor: default;
    pointer-events: none;
}

.thumbnail-button-prev svg,
.thumbnail-button-next svg {
    color: #000;
}

/* Main Slider Navigation */
.main-swiper-test .swiper-button-next,
.main-swiper-test .swiper-button-prev {
    color: white;
}

/* Mobile Responsive - Tablets */
@media screen and (max-width: 950px) {
    .swiper-container-wrapper {
        flex-direction: column;
        gap: 0;
    }
    
    .main-swiper-test {
        width: 100%;
        height: 400px;
    }
    
    .thumbnail-swiper-test {
        width: 100%;
        height: 100px;
        margin-top: 15px;
    }
    .thumbnail-button-prev,
    .thumbnail-button-next {
        display: none !important;
    }
    .main-swiper-test .swiper-button-next,
    .main-swiper-test .swiper-button-prev {
        display: none !important;
    }
    
    .thumbnail-swiper-test .swiper-slide {
        width: 100px !important;
        height: 100px !important;
        margin-bottom: 0;
        margin-right: 8px;
    }
    
    .thumbnail-button-prev {
        left: 0;
        top: 50%;
        transform: translateY(-50%) rotate(180deg);
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    
    .thumbnail-button-next {
        right: 0;
        bottom: auto;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        left: auto;
    }
}

/* Mobile Responsive - Phones */
@media (max-width: 768px) {
    .main-swiper-test {
        height: 300px;
    }
}

@media screen and (max-width: 600px) {
    .thumbnail-swiper-test {
        height: 80px;
    }
    
    .thumbnail-swiper-test .swiper-slide {
        width: 80px !important;
        height: 80px !important;
    }
}
</style>

<!-- Add Swiper JS (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Initialization Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {

  const THUMBS_PER_VIEW_DESKTOP = 6;

const thumbnailSwiperTest = new Swiper('.thumbnail-swiper-test', {
  direction: 'vertical',
  slidesPerView: THUMBS_PER_VIEW_DESKTOP,
  spaceBetween: 8,
  watchSlidesProgress: true,
  slideToClickedSlide: true,
  freeMode: false,
  speed: 450,

  navigation: {
    nextEl: '.thumbnail-button-next',
    prevEl: '.thumbnail-button-prev',
  },

  breakpoints: {
    0: {
      direction: 'horizontal',
      slidesPerView: 'auto',
      freeMode: true,
      allowTouchMove: true,   // ✅ mobile can drag
      speed: 450,
    },
    951: {
      direction: 'vertical',
      slidesPerView: THUMBS_PER_VIEW_DESKTOP,
      freeMode: false,
      allowTouchMove: false,  // ✅ desktop cannot “follow” gestures
      speed: 450,
    }
  }
});
  const mainSwiperTest = new Swiper('.main-swiper-test', {
    spaceBetween: 10,
    speed: 450,               // ✅ smoother main slider too
    loop: false,
    navigation: {
      nextEl: '.main-swiper-test .swiper-button-next',
      prevEl: '.main-swiper-test .swiper-button-prev',
    },
    keyboard: { enabled: true },
    thumbs: { swiper: thumbnailSwiperTest },
  });

  // ✅ Auto-scroll thumbs so active thumb stays visible (desktop + mobile)
function keepThumbInView(activeIndex) {
  const dir = thumbnailSwiperTest.params.direction;
  const total = thumbnailSwiperTest.slides.length;

  if (dir === 'vertical') {
    const perView = thumbnailSwiperTest.params.slidesPerView;
    if (typeof perView !== 'number') return;

    const maxStart = Math.max(total - perView, 0);
    const target = Math.min(Math.max(activeIndex - Math.floor(perView / 2), 0), maxStart);
    thumbnailSwiperTest.slideTo(target, 450);
    return;
  }

  // ✅ MOBILE FIX
  const perViewMobile = 4;
  const maxStart = Math.max(total - perViewMobile, 0);
  const target = Math.min(Math.max(activeIndex - 1, 0), maxStart);
  thumbnailSwiperTest.slideTo(target, 450);
}

  mainSwiperTest.on('slideChange', () => {
    keepThumbInView(mainSwiperTest.activeIndex);
  });

  thumbnailSwiperTest.on('click', () => {
    keepThumbInView(mainSwiperTest.activeIndex);
  });

});
</script>

</div>
<div class="col-lg-8">
    
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">


<div class="inner-page-banner bg_wrap555">
<div class="banner-wrapper p-0">
<div class="banner-main-content-wrap p-0">
<div class="banner-content style-2">
<?php 
  if (empty($this->session->userdata('user_id'))) {
    $user_id = 0;
  }else{
    $user_id = $this->session->userdata('user_id');
  }

  if(is_already_favourite($car_view["id"],$user_id)==0){

     $class = 'fa-heart-o';
  }else{
    $class = 'fa-heart';
  }

?>


<h1 class="mar_p5"> <?php echo $car_view["car_title"]; ?>




<?php 
  if (empty($this->session->userdata('user_id'))) {
    $user_id = 0;
	$class = 'fa-heart-o';
	?>
	<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#signUpModal01"  class="fav add-fav share-icon5 add-fav innerfav"><i class="fa <?php echo $class; ?>"></i></a>
	<?php
  }else{
    $user_id = $this->session->userdata('user_id');
	 if(is_already_favourite($car_view['id'],$user_id)==0){

     $class = 'fa-heart-o';
	 ?>
	 <a href="javascript:;" data-id="<?php echo $car_view['id']; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>"  class="fav add-fav share-icon5 add-fav innerfav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }else{
    $class = 'fa-heart';
	?>
	 <a href="<?php echo base_url();  ?>/favourite"   class="fav add-fav share-icon5 add-fav innerfav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }
  }

 


  // print_r();
?>



<?php /*?><a  data-id="<?php echo $car_view["id"]; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>" class="share-icon5 add-fav innerfav">
    <svg width="22" height="" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
<path d="M7.00012 2.40453L6.37273 1.75966C4.90006 0.245917 2.19972 0.76829 1.22495 2.67141C0.767306 3.56653 0.664053 4.8589 1.4997 6.50827C2.30473 8.09639 3.97953 9.99864 7.00012 12.0706C10.0207 9.99864 11.6946 8.09639 12.5005 6.50827C13.3362 4.85803 13.2338 3.56653 12.7753 2.67141C11.8005 0.76829 9.10019 0.245042 7.62752 1.75879L7.00012 2.40453ZM7.00012 13.125C-6.41666 4.25953 2.86912 -2.65995 6.84612 1.00016C6.89862 1.04829 6.95024 1.09816 7.00012 1.14979C7.04949 1.09821 7.10087 1.04859 7.15413 1.00104C11.1302 -2.6617 20.4169 4.25865 7.00012 13.125Z">
</path>
</svg>

<!-- <i class="fa <?php echo $class; ?>"></i> -->
</a><?php */?></h1> 
<div class="location-and-notification">
<ul>
<li><?php echo $car_view["car_sub_title"]; ?></li>
</ul>
</div>

</div>
</div>
</div>
</div>

<style>
.mibreit-thumbElement {
    height: auto !important;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center;
	cursor:pointer;}

</style>

<div class="single-item mb-50" id="car-info">
<div class="car-info">
<div class="title mb-20">
<h5>Bilinfo</h5>
</div>
<ul>
<li>
<div class="icon">
<img src="<?php echo base_url();  ?>assets/img/inner-page/icon/mileage.svg" alt>
</div>
<div class="content">
<h6><?php if(!empty($car_view["mileage"])){ echo $car_view["mileage"]; }else{ echo"-"; } ?></h6>
<span><?php echo $footer_data["mileage_text"]; ?></span>
</div>
</li>

<li>
<div class="icon">
<img src="<?php echo base_url();  ?>assets/img/inner-page/icon/engine.svg" alt>
</div>
<div class="content">
<h6><?php if(!empty($car_view["cat_engine"])){ 
 $cat_engine= get_car_cat_by_id_and_table_name($car_view["cat_engine"],'engine_category');
 if(!empty( $cat_engine)){
 echo $cat_engine["engine_name"];
 }else{
     echo"-";
 }
 }else{ echo"-"; } ?></h6>
<span><?php echo $footer_data["engine_text"]; ?></span>
</div>
</li>
<li>
<div class="icon">
<img src="<?php echo base_url();  ?>assets/img/inner-page/icon/fuel.svg" alt>
</div>
<div class="content">
<h6><?php if(!empty($car_view["cat_fuel"])){ 
 $cat_engine= get_car_cat_by_id_and_table_name($car_view["cat_fuel"],'fuel_category');
 if(!empty($cat_engine)){
 echo $cat_engine["fuel_name"];
 }else{
      echo"-";
 }
 }else{ echo"-"; } ?></h6>
<span><?php echo $footer_data["fuel_type_text"]; ?></span>
</div>
</li>
<li>
<div class="icon">
<img src="<?php echo base_url();  ?>assets/img/inner-page/icon/condition.svg" alt>
</div>
<div class="content">
<h6><?php if(!empty($year_data['year_name'])){ echo $year_data['year_name']; }else{ echo "-"; } ?></h6>
<span>Fordonsår</span>
</div>
</li></ul>
</div>
</div>


<div class="mobile-only-section">
    <?php if($car_view["cat_buy_method"] != 2) { ?>
    <div class="contact-info mb-40" style="background:#ffecdd !important; padding: 20px !important; border-radius:10px !important;">
        <div class="title">
            <h4>Budgivning</h4>
        </div>

        <div class="lead_wrap_add">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="lead_wrap1">Ledande bud inkl. Moms </td>
                    <td class="lead_wrap2">
                        <span class="leadingbox">
                            <?php if(!empty($highest_bid)) { ?>
                                <?php echo number_format($highest_bid); ?> <?php echo $this->config->item('CURRENCY'); ?>
                            <?php } else { 
                                echo "Inga bud har lagts ännu"; 
                            } ?>
                        </span>
                    </td>
                </tr>
                <?php if($car_view["emi_show"]=='yes') { ?>
                <tr>
                    <td class="lead_wrap1">Med billån från</td>
                    <td class="lead_wrap2 <?php if(!empty($highest_bid)) { ?> emi_wapper <?php } ?>">
                        <?php if(!empty($highest_bid)) { 
                            $principal = $highest_bid;
                            $annual_rate = 12;
                            $months = 48;
                            echo $emi = number_format(calculate_emi($principal, $annual_rate, $months));
                        ?> <?php echo $this->config->item('CURRENCY'); ?> / month
                        <?php } else { 
                            echo "Det finns inget ledande bud"; 
                        } ?>
                    </td>
                </tr>
                <?php } ?>

                <?php if(!empty($car_view["market_price"])) { ?> 
                <tr>
                    <td class="lead_wrap1">Marknadsvärde Pris</td>
                    <td class="lead_wrap2">
                        <?php echo number_format($car_view["market_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="resv_wrap">
            <span class="reservation_cls">Reservationspriset har inte uppnåtts</span>
            <a href="javascript:void(0)" onClick="openNav()" class="see_wrap_bid">Se Budgivning</a>
            <span>Budgivning Avslutas: 
                <?php if (get_post_status($car_view["id"]) == 'timer'): ?>
                    <b id="countdown_mobile_<?php echo $car_view["id"]; ?>" style="color:red;"></b>
                <?php else: ?>
                    <b><?php 
                        $status = get_post_status($car_view["id"]);
                        echo ($status == "Auction Time Completed") ? "Auktionstid avslutad" : $status; 
                    ?></b>

                <?php endif; ?>
            </span>
        </div>
    </div>
    <?php } ?>
    <?php 
$car_id = $car_view['id'];
$timer_data = get_auction_timer_data($car_id);

if ($timer_data['show_timer']): 
?>
    <div class="auction-details">
        <h3>Auktionen avslutas snart!</h3>
        
        <div class="auction-timer-wrapper" 
             data-car-id="<?php echo $car_id; ?>"
             data-created-timestamp="<?php echo $timer_data['created_timestamp']; ?>"
             data-show-timer="1">
        </div>
        <br>
    </div>
<?php endif; ?>

</div>
<style>
/* Hide mobile sections by default */
.mobile-only-section {
    display: none;
}

/* Show mobile sections and hide sidebar on mobile */
@media (max-width: 991px) {
    .mobile-only-section {
        display: block;
        margin-bottom: 30px;
    }
    
    .car-details-sidebar {
        display: none;
    }
}
</style>



<!-- ahmad muslim changes -->
<!-- MOBILE ONLY: Fast Pris Section -->
<?php if (!$hide_fast_pris) { ?>
<div class="mobile-only-section">
    <div class="contact-info blue_wrap mb-40" style="padding: 20px !important; border-radius:10px !important;">
        <div class="title">
            <h4>Fast Pris</h4>
        </div>

        <div class="lead_wrap_add">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="lead_wrap1">Fast pris inkl. moms</td>
                    <?php if($car_view["fixed_price"]==0) { ?>
                        <td class="lead_wrap2"><span class="fix_st2 ledf55">Inte Nämnt</span></td>
                    <?php } else { ?>
                        <td class="lead_wrap2">
                            <span class="fix_st2 ledf55">
                                <?php if(!empty($car_view["reduce_price"])) { ?>  
                                    <?php echo number_format($car_view["reduce_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?>
                                <?php } else { ?>
                                    <?php echo number_format($car_view["fixed_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?>
                                <?php } ?>
                            </span>
                            <?php if(!empty($car_view["reduce_price"])) { ?>
                                <div class="price_wrap16">
                                    <?php echo number_format($car_view["fixed_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?>
                                </div>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php if($car_view["emi_show"]=='yes') { ?>
                <tr>
                    <td class="lead_wrap1">With car loan from</td>
                    <td class="lead_wrap2 emi_wapper1">
                        <?php
                            $fixed_price = $car_view["fixed_price"];
                            $reduce_price = $car_view["reduce_price"];
                            $principal = !empty($reduce_price) ? $reduce_price : $fixed_price;
                            $annual_rate = 12;
                            $months = 48;
                            echo $emi = number_format(calculate_emi($principal, $annual_rate, $months));
                        ?> <?php echo $this->config->item('CURRENCY'); ?> / month
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="resv_wrap">
            <span class="see_wrap_bid5">
                <p>RING MIG FÖR ATT BOKA NU</p>
                <?php echo $profile_admin_data["phone_number"]; ?>
            </span>
        </div>
    </div>
</div>
<?php } ?>
<?php if(!empty($profile_data["city"]) && !empty($profile_data["pincode"])) { ?>
<!-- ======================
     MOBILE BLOCK (sm-down)
     ====================== -->
<div class="reseller-info-mobile d-block d-md-none" style="padding:0 !important; margin-bottom:40px; border-radius:10px !important;">
  <div class="card border-0 shadow-sm reseller-card" style="padding: 25px !important;">
    <div class="card-body p-0">
      <h5 class="mb-3 fw-semibold">Återförsäljarinformation</h5>

      <div class="mb-3">
        <label class="form-label mb-2">Stad</label>
        <input style="font-weight:bold; text-transform: capitalize;" type="text" class="form-control reseller-input" disabled
               value="<?php echo htmlspecialchars($profile_data["city"]); ?>">
      </div>

      <div class="mb-0">
        <label class="form-label mb-2">Postadress</label>
        <input style="font-weight:bold;" type="text" class="form-control reseller-input" disabled
               value="<?php echo htmlspecialchars($profile_data["pincode"]); ?>">
      </div>

    </div>
  </div>
</div>
<?php } ?>



<div class="single-item mb-50" id="kye-features">
    <?php 
    if(!empty($car_view['cat_equipment'])){
$cat_equipment = json_decode($car_view['cat_equipment'], true); 
if(!empty($cat_equipment)){
    ?>
<div class="kye-features" style="color: black;">
<div class="title mb-20">
<h5><?php echo $footer_data["equipment_text"]; ?></h5>
</div>
<ul>
<?php 

foreach ($cat_equipment as $value7) { 
    
    if(!empty($value7)){
         $cat_engine= get_car_cat_by_id_and_table_name($value7,'equipment_category');
if(!empty($cat_engine)){
?>
<li style="color:black;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
<path d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z" />
<path d="M8.22751 3.72747C8.22217 3.73264 8.21716 3.73816 8.21251 3.74397L5.60776 7.06272L4.03801 5.49222C3.93138 5.39286 3.79034 5.33876 3.64462 5.34134C3.49889 5.34391 3.35985 5.40294 3.25679 5.506C3.15373 5.60906 3.0947 5.7481 3.09213 5.89382C3.08956 6.03955 3.14365 6.18059 3.24301 6.28722L5.22751 8.27247C5.28097 8.32583 5.34463 8.36788 5.4147 8.39611C5.48476 8.42433 5.5598 8.43816 5.63532 8.43676C5.71084 8.43536 5.78531 8.41876 5.85428 8.38796C5.92325 8.35716 5.98531 8.31278 6.03676 8.25747L9.03076 4.51497C9.13271 4.40796 9.18845 4.26514 9.18593 4.11737C9.18341 3.9696 9.12284 3.82875 9.0173 3.72529C8.91177 3.62182 8.76975 3.56405 8.62196 3.56446C8.47417 3.56486 8.33247 3.62342 8.22751 3.72747Z" />
</svg> <?php 
 echo $cat_engine["equipment_name"];

 ?></li>

<?php } } } ?>


</ul>
</div>
<?php  } } ?>
</div>
<div class="single-item mb-50" id="overview">
<div class="overview">
<div class="title mb-25">
<h5><?php echo $footer_data["car_facts_text"]; ?></h5>
</div>
<div class="overview-content">
<ul>
    <?php 
    $brand=get_car_cat_by_id_and_table_name($car_view["cat_brand"],'brand_category');
    $model =get_car_cat_by_id_and_table_name($car_view["cat_model"],'model_category');
    $fuel =get_car_cat_by_id_and_table_name($car_view["cat_fuel"],'fuel_category');
    $body =get_car_cat_by_id_and_table_name($car_view["cat_body"],'body_category');
     $year= get_car_cat_by_id_and_table_name($car_view["cat_year"],'model_year_category');
	 
	 $model_year= get_car_cat_by_id_and_table_name($car_view["cat_year"],'model_year_category');
	 
     $engine= get_car_cat_by_id_and_table_name($car_view["cat_engine"],'engine_category');
    
	//print_r($model_year);
	?>

<li><span><?php echo $footer_data["category_text"]; ?> </span> <?php if(!empty($car_view["category"])){ echo ucwords($car_view["category"]); }else{ echo"-"; } ?> </li>  
<li><span><?php echo $footer_data["brand_text"]; ?>  </span> <?php if(!empty($brand["brand_name"])){ echo ucwords($brand["brand_name"]); }else{ echo"-"; } ?> </li> 
<li><span><?php echo $footer_data["model_text"]; ?>  </span> <?php if(!empty($model["model_name"])){ echo ucwords($model["model_name"]); }else{ echo"-"; } ?> </li> 
<li><span><?php echo $footer_data["fuel_type_text"]; ?>  </span> <?php if(!empty($fuel["fuel_name"])){ echo ucwords($fuel["fuel_name"]); }else{ echo"-"; } ?> </li> 
<li><span><?php echo $footer_data["mileage_text"]; ?>  </span> <?php if(!empty($car_view["mileage"])){ echo $car_view["mileage"]." Mileage"; }else{ echo"-"; } ?>  </li> 
<li><span><?php echo $footer_data["model_year_text"]; ?> year</span> <?php if(!empty($model_year["year_name"])){ echo $year["year_name"]; }else{ echo"-"; } ?></li> 
 <li><span><?php echo $footer_data["body_text"]; ?> </span> <?php if(!empty($body["body_name"])){ echo ucwords($body["body_name"]); }else{ echo"-"; } ?> </li>
 <li><span><?php echo $footer_data["engine_text"]; ?> </span> <?php if(!empty($engine["engine_name"])){ echo ucwords($engine["engine_name"]); }else{ echo"-"; } ?> </li>
 
<li><span><?php echo $footer_data["previous_owners_text"]; ?></span> <?php if(!empty($car_view["previous_owners"])){ echo $car_view["previous_owners"]; }else{ echo"-"; } ?> </li>
<li><span><?php echo $footer_data["license_number"]; ?></span> <?php if(!empty($car_view["license_number"])){ echo $car_view["license_number"]; }else{ echo"-"; } ?> </li>

</ul>
<ul>
<li><span><?php echo $footer_data["Number_of_seats"]; ?></span> <?php if(!empty($car_view["number_of_seats"])){ echo $car_view["number_of_seats"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["number_of_keys"]; ?></span> <?php if(!empty($car_view["number_of_keys"])){ echo $car_view["number_of_keys"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["color_text"]; ?></span> <?php if(!empty($car_view["color"])){ echo $car_view["color"]; }else{ echo"-"; } ?></li>
<li><span><?php echo "Import"; ?></span> <?php if(!empty($car_view["finish"])){ echo $car_view["finish"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["textile_text"]; ?></span> <?php if(!empty($car_view["textile"])){ echo $car_view["textile"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["first_date_traffic_sweden_text"]; ?> </span> <?php if(!empty($car_view["first_date_traffic_sweden"])){ echo $car_view["first_date_traffic_sweden"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["service_history_text"]; ?></span>  <?php if(!empty($car_view["service_history"])){ echo $car_view["service_history"]; }else{ echo"-"; } ?></li>
<!-- manufracture_month is actually status, in database it is wrong field, to make it up I am just giving "status" as constant value -->
<li><span><?php echo "Status"; ?></span> <?php if(!empty($car_view["manufacture_month"])){ echo $car_view["manufacture_month"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["horsepower_text"]; ?></span> <?php if(!empty($car_view["horsepower"])){ echo $car_view["horsepower"]; }else{ echo"-"; } ?> </li>
</ul>
</div>
</div>
</div>
<div class="single-item mb-50" id="performance">
<div class="engine-performance">
<div class="title mb-25">
<h5><?php echo $footer_data["technical_data_text"]; ?></h5>
</div>
<div class="overview-content">
<ul>
<li><span><?php echo $footer_data["chassis_number_text"]; ?></span> <?php if(!empty($car_view["chassis_number"])){ echo $car_view["chassis_number"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["engine_effect_text"]; ?></span> <?php if(!empty($car_view["engine_effect"])){ echo $car_view["engine_effect"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["max_payload_text"]; ?></span>  <?php if(!empty($car_view["max_playload"])){ echo $car_view["max_playload"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["max_pull_weight_text"]; ?></span> <?php if(!empty($car_view["max_pull_weight"])){ echo $car_view["max_pull_weight"]; }else{ echo"-"; } ?></li>
</ul>
<ul>
<!--<li><span>Max pull weight</span> <?php if(!empty($car_view["max_pull_weight"])){ echo $car_view["max_pull_weight"]; }else{ echo"-"; } ?></li>-->
<li><span><?php echo $footer_data["vehicle_total_weight_text"]; ?> </span> <?php if(!empty($car_view["vehicle_tital_weight"])){ echo $car_view["vehicle_tital_weight"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["next_inspection_the_latest_text"]; ?></span> <?php if(!empty($car_view["next_inspection"])){ echo $car_view["next_inspection"]; }else{ echo"-"; } ?></li>
<li><span><?php echo $footer_data["curb_weight_text"]; ?></span>  <?php if(!empty($car_view["curb_weight"])){ echo $car_view["curb_weight"]; }else{ echo"-"; } ?></li>
</ul>
</div>
</div>
</div>
<div class="single-item mb-50" id="car-color">
<div class="car-colors">
<div class="title-and-slider-btn mb-25">
<div class="title">
<h5>Remark Images</h5>
</div>
<div class="slider-btn-group2">
<div class="slider-btn prev-2">
<svg width="7" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
<path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
</svg>
</div>
<div class="slider-btn next-2">
<svg width="7" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
<path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
</svg>
</div>
</div>
</div>
<div class="swiper car-color-slider">
<div class="swiper-wrapper">

<?php 
            
            if(!empty($car_view["car_photo_gallery_ids"])){
              $remark_images = json_decode($car_view['remark_image_ids'], true); 
            ?>
<?php
       // Decode as an associative array
        
   
       $remark_images  =    json_decode( $remark_images);
          
       if (is_array($remark_images) && !empty($remark_images)) {
           foreach ($remark_images as $image) {

               
          ?>
             
              <div class="swiper-slide">
<div class="car-color-wrap">
    
<div class="car-img">
<img src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" alt>
</div>
</div>
</div>
              <?php
              }
          }
               
          ?>

              <?php } ?>




</div>
</div>
</div>
</div>
<div class="single-item mb-0" id="car-milage">
<div class="car-milage">
<div class="title mb-25">
<h5><?php echo $footer_data["remark_text"]; ?></h5>
</div>
<div class="row">
  <div class="col-md-6">
  <div class="overview-content">
	<ul class="add15468">
    <li class="brad_inq">
      <span><img src="<?php echo base_url();  ?>assets/img/icon1.jpg" alt="" /> <?php echo $footer_data["breaks_text"]; ?> </span>
      <div class="star-rating">
        <?php for($i = 1; $i <= 5; $i++): ?>
          <span class="star <?php echo ($i <= $car_view['bracks_count']) ? 'active' : ''; ?>">★</span>
        <?php endfor; ?>
      </div>
    </li>
    <li><?php echo $car_view['Breaks_description']; ?></li>
    </ul>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="overview-content">
	<ul class="add15468">
    <li class="brad_inq">
      <span><img src="<?php echo base_url();  ?>assets/img/icon3.jpg" alt="" /> <?php echo $footer_data["tires_text"]; ?></span> 
      <div class="star-rating">
        <?php for($i = 1; $i <= 5; $i++): ?>
          <span class="star <?php echo ($i <= $car_view['tires']) ? 'active' : ''; ?>">★</span>
        <?php endfor; ?>
      </div>
    </li>
    <li><?php echo $car_view['tires_description']; ?></li>
    </ul>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="overview-content">
	<ul class="add15468">
    <li class="brad_inq">
      <span><img src="<?php echo base_url();  ?>assets/img/icon2.jpg" alt="" /> <?php echo $footer_data["exterior_body_text"]; ?> </span> 
      <div class="star-rating">
        <?php for($i = 1; $i <= 5; $i++): ?>
          <span class="star <?php echo ($i <= $car_view['exterior_body']) ? 'active' : ''; ?>">★</span>
        <?php endfor; ?>
      </div>
    </li>
    <li><?php echo $car_view['exterior_body_description']; ?></li>
    </ul>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="overview-content">
	<ul class="add15468">
    <li class="brad_inq">
      <span><img src="<?php echo base_url();  ?>assets/img/icon4.jpg" alt="" /> <?php echo $footer_data["interior_body_text"]; ?></span> 
      <div class="star-rating">
        <?php for($i = 1; $i <= 5; $i++): ?>
          <span class="star <?php echo ($i <= $car_view['interior_body']) ? 'active' : ''; ?>">★</span>
        <?php endfor; ?>
      </div>
    </li>
    <li><?php echo $car_view['interior_body_description']; ?></li>
    </ul>
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="car-details-sidebar">


  
<?php 


if($car_view["cat_buy_method"]==2){
  ?>

  <?php 

}else{

?>
<div class="contact-info mb-40">
<div class="title">
<h4>Budgivning</h4>
</div>

<div class="lead_wrap_add">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="lead_wrap1">Ledande bud inkl. Moms </td>
    <td class="lead_wrap2"><span class="leadingbox" ><?php if(!empty($highest_bid)){  ?><?php echo number_format($highest_bid); ?>  <?php echo $this->config->item('CURRENCY'); ?><?php }else{ echo "Inga bud har lagts ännu"; } ?></span></td>
  </tr>
  <?php if($car_view["emi_show"]=='yes'){ ?>
  <tr>
    <td class="lead_wrap1">Med billån från</td>
    <td class="lead_wrap2 <?php if(!empty($highest_bid)){  ?> emi_wapper <?php } ?>"  >
        <?php if(!empty($highest_bid)){  ?>
      <?php
      $principal = $highest_bid; // Example principal amount
      $annual_rate = 12; // Annual interest rate in percentage
      $months = 48; // Number of monthly installments
      
    echo $emi = number_format(calculate_emi($principal, $annual_rate, $months));
      ?> <?php echo $this->config->item('CURRENCY'); ?> / month
  <?php }else{ echo "Det finns inget ledande bud"; } ?>
  </td>
  </tr>
  <?php } ?>

  <?php if(!empty($car_view["market_price"])){  ?> 
  <tr>
    <td class="lead_wrap1">Marknadsvärde Pris</td>
    <td class="lead_wrap2"><?php echo number_format($car_view["market_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?></td>
  </tr>
  <?php } ?>

</table>
</div>

<div class="resv_wrap">
<span class="reservation_cls">Reservationspriset har inte uppnåtts</span>
<a href="javascript:void(0)" onClick="openNav()" class="see_wrap_bid">Se Budgivning</a>

            <span>Budgivning Avslutas: 
                <?php if (get_post_status($car_view["id"]) == 'timer'): ?>
                    <b id="countdown_mobile_<?php echo $car_view["id"]; ?>" style="color:red;"></b>
                <?php else: ?>
                    <b><?php 
                        $status = get_post_status($car_view["id"]);
                        echo ($status == "Auction Time Completed") ? "Auktionstid avslutad" : $status; 
                    ?></b>

                <?php endif; ?>
            </span>

</div>
</div>
<?php } ?>
<?php 
$car_id = $car_view['id'];
$timer_data = get_auction_timer_data($car_id);

if ($timer_data['show_timer']): 
?>
    <div class="auction-details">
        <h3>Auktionen avslutas snart!</h3>
        
        <div class="auction-timer-wrapper" 
             data-car-id="<?php echo $car_id; ?>"
             data-created-timestamp="<?php echo $timer_data['created_timestamp']; ?>"
             data-show-timer="1">
        </div>
        <br>
        <br>
    </div>
<?php endif; ?>
<!-- ahmad muslim changes -->

<?php if (!$hide_fast_pris) { ?>
<div class="contact-info blue_wrap mb-40">
<div class="title">
<h4>Fast Pris</h4>
</div>

<div class="lead_wrap_add">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="lead_wrap1">Fast pris inkl. moms</td>
    <?php 
    if($car_view["fixed_price"]==0){ 
        ?>
        <td class="lead_wrap2"><span class="fix_st2 ledf55">Inte Nämnt</span></td>
    
    <?php
    }else{
    ?>
    <td class="lead_wrap2"><span class="fix_st2 ledf55"><?php if(!empty($car_view["reduce_price"])){  ?>  
<?php echo number_format($car_view["reduce_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo number_format($car_view["fixed_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?></span>
<?php if(!empty($car_view["reduce_price"])){ ?>
<div class="price_wrap16"><?php echo  number_format($car_view["fixed_price"]); ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>
</td>
<?php } ?>
  </tr>
  <?php if($car_view["emi_show"]=='yes'){ ?>
  <tr>
    <td class="lead_wrap1">With car loan from</td>
    <td class="lead_wrap2 emi_wapper1">     <?php
   
        $fixed_price = $car_view["fixed_price"]; // Example principal amount
          $reduce_price = $car_view["reduce_price"];
          
          if(!empty($reduce_price)){
             $principal = $reduce_price;
          }else{
             $principal = $fixed_price;
          }
    
      $annual_rate = 12; // Annual interest rate in percentage
      $months = 48; // Number of monthly installments
      
    echo $emi = number_format(calculate_emi($principal, $annual_rate, $months));
      ?> <?php echo $this->config->item('CURRENCY'); ?> / month</td>
  </tr>
  <?php } ?>
</table>
</div>

<div class="resv_wrap">
<span class="see_wrap_bid5">
<p>RING MIG FÖR ATT BOKA NU</p>
<?php echo $profile_admin_data["phone_number"]; ?>
</span>
</div>

</div>
<?php } ?>


</div>
<?php if(!empty($profile_data["city"]) && !empty($profile_data["pincode"])) { ?>

<!-- =========================
     DESKTOP BLOCK (md and up)
     ========================= -->
<div class="reseller-info-desktop d-none d-md-block my-4">
  <div class="card border-0 shadow-sm reseller-card mx-auto" style="max-width:520px;">
    <div class="card-body p-4">
      <h4 class="mb-4 fw-semibold">Återförsäljarinformation</h4>

      <div class="mb-3">
        <label class="form-label mb-2">Stad</label>
        <input style="font-weight:bold; text-transform: capitalize;" type="text" class="form-control reseller-input" disabled
               value="<?php echo htmlspecialchars($profile_data["city"]); ?>">
      </div>

      <div class="mb-0">
        <label class="form-label mb-2">Postadress</label>
        <input style="font-weight:bold;" type="text" class="form-control form-control-lg reseller-input" disabled
               value="<?php echo htmlspecialchars($profile_data["pincode"]); ?>">
      </div>

    </div>
  </div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>

<div id="recommended" class="most-search-area style-2 pt-50 pb-60 mb-0">
<div class="container">
<div class="row mb-30 wow fadeInUp" data-wow-delay="300ms">
<div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
<div class="section-title1">
<h2>Rekommenderas för dig</h2>


<?php

// print_r($cars);

?>
</div>
</div>
</div>

<div class="row wow fadeInUp" data-wow-delay="300ms">

<div class="col-lg-12 position-relative">
<div class="swiper upcoming-car-slider mb-50">
<div class="swiper-wrapper pb-3">

<?php

if(count($cars)>5){
  
}else{
  
    ?>
    <style>
    .slider-btn{
        display: none !important;
    }
    
    </style>
    <?php 
}
if(!empty($cars)){



foreach ($cars as $car):

  $gallery_images = json_decode($car->car_photo_gallery_ids, true); 

  $model_year= get_car_cat_by_id_and_table_name($car->cat_year,'model_year_category');
  $engine= get_car_cat_by_id_and_table_name($car->cat_engine,'engine_category');
  

?>

<div class="swiper-slide hovgh55" style="cursor: pointer;" <?php /*?>onclick=' window.location.href = "<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"'<?php */?>>
<div class="product-card">
<div class="product-img">
<div class="number-of-img">
<i class="fa fa-clock"></i> 


    <?php if (get_post_status($car->id) == 'timer'): ?>
        <span id="countdown_<?php echo $car->id; ?>" style="color:red;"></span>
     
    <?php else: ?>
        <span><?php if(get_post_status($car->id) == "Auction Time Completed" ) { echo "Auktionstid slutförd"; } else { echo get_post_status($car->id); } ?></span>
    <?php endif; ?>
</div>

<?php 
  if (empty($this->session->userdata('user_id'))) {
    $user_id = 0;
	$class = 'fa-heart-o';
	?>
	<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#signUpModal01"  class="fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	<?php
  }else{
    $user_id = $this->session->userdata('user_id');
	if(is_already_favourite($car->id,$user_id)==0){

     $class = 'fa-heart-o';
	 ?>
	 <a href="javascript:;" data-id="<?php echo $car->id; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>"  class="fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }else{
    $class = 'fa-heart';
	?>
	 <a href="<?php echo base_url();  ?>/favourite"   class="fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }
  }

  


  // print_r();
?>
<?php 
if(!empty($car->reduce_price)){
?>
<div class="reduc_wrap">Sänkt Pris</div>
<?php } ?>
<?php if(!empty($gallery_images)){ ?>
<div class="suporty587 mobile-slider-container">
    <?php
        $gallery_images  =    json_decode( $gallery_images);
        
        $image_urls = array();
        $i = 0;
         if (is_array($gallery_images) && !empty($gallery_images)) {
              foreach ($gallery_images as $image) {
                if($i < 3){ // Limit to 3 images
                  $image_urls[] = get_image_path_by_id($image);
                } 
                $i++;
              }
         }
         
         // Fill with placeholder if less than 3 images
         while(count($image_urls) < 3) {
             $image_urls[] = base_url()."/uploads/preview.png";
         }
    ?>
    
    <!-- Desktop view (2 images) -->
    <a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>" class="desktop-image-view">
        <div class="nwt1" style="background-image:url(<?php echo $image_urls[0]; ?>);"></div>
        <div class="nwt2" style="background-image:url(<?php echo isset($image_urls[1]) ? $image_urls[1] : $image_urls[0]; ?>);"></div>
    </a>
    
    <!-- Mobile slider view (3 images) -->
    <div class="mobile-image-slider" data-car-id="<?php echo $car->id; ?>">
        <?php foreach(array_slice($image_urls, 0, 3) as $img_url): ?>
        <div class="slider-image" style="background-image:url(<?php echo $img_url; ?>);">
            <a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"></a>
        </div>
        <?php endforeach; ?>
        <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</div>
<?php } ?>


</div>

<div class="product-content">
<h5><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"> <?php echo $car->car_title; ?> </a></h5>
<div class="date_wrap">
    <span><?php if(!empty($model_year)){ echo  $model_year["year_name"]; } ?></span> 
    <span><?php echo $car->mileage; ?> Mil</span> 
    <span><?php if(!empty($fuel)){ echo  $fuel["fuel_name"]; } ?></span>  
    <span><?php if(!empty($engine)){ echo  $engine["engine_name"]; } ?></span>
    <?php if(isset($car->cat_buy_method) && $car->cat_buy_method == 3): ?>
<div class="bidder-count-wrapper" style="display: inline-block; float: right; font-size: 12px;">
    <i class="fa fa-gavel" style="color: #007bff;"></i>
    <span class="bidder-count"><?php echo isset($car->total_bidders) ? $car->total_bidders : 0; ?></span>
    <i class="fa fa-info-circle" 
       data-toggle="tooltip" 
       data-placement="top" 
       title="Detta visar det totala antalet personer som bjuder på denna bil och inte totalt antal bud" 
       style="color: #6c757d; cursor: help; margin-left: 0px;"></i>
</div>
<?php endif; ?>

    <?php if(!empty($car->city)): ?>
<div class="city_wrap">
    <i class="fa fa-map-marker"></i> 
        <span style="text-transform: capitalize;">
            <?php echo strtolower($car->city); ?>
        </span>
</div>
<?php endif; ?>

</div>

<?php if($car->cat_buy_method==3){

$bids=get_bid_by_id($car->id);

if(!empty($bids)){
    ?>

<div class="price_wrap15"><span class="fix_st1">Ledande Bud:</span>

<span class="fix_st2 ledf55">
<?php echo $bids[0]->bidding_price; ?> <?php echo $this->config->item('CURRENCY'); ?>

</span>

</div>

    
    <?php
    
}else{
    


?>
<div class="price_wrap15"><span class="fix_st1">Fast Pris:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car->reduce_price)){  ?>  
<?php echo $car->reduce_price; ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo $car->fixed_price; ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php if(!empty($car->reduce_price)){ ?>
<div class="price_wrap16"><?php echo $car->fixed_price; ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<?php } ?>

<?php if($car->emi_show=='yes'){ ?>
<div class="price_wrap17"><span class="pr1556">With financing:</span> <span class="pr1557"><?php monthlyEMI($car->id); ?></span></div>
<?php } ?>

<?php }else{ ?>

<div class="price_wrap15"><span class="fix_st1">Fast Pris:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car->reduce_price)){  ?>  
<?php echo $car->reduce_price; ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo $car->fixed_price; ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php if(!empty($car->reduce_price)){ ?>
<div class="price_wrap16"><?php echo $car->fixed_price; ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<?php if($car->emi_show=='yes'){ ?>
<div class="price_wrap17"><span class="pr1556">With financing:</span> <span class="pr1557"><?php monthlyEMI($car->id); ?></span></div>
<?php } ?>


<?php } ?>

</div>

</div>
</div>


<?php 
endforeach;

}else{

  echo"<p>HITTADE INTE !</p>";

} ?>



</div>
</div>
</div>
</div>
<div class="row wow fadeInUp" data-wow-delay="400ms">
<div class="col-lg-12 divider">
<div class="slider-btn-group style-2 justify-content-md-between justify-content-center">
<div class="slider-btn prev-2 d-md-flex d-none">
<svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
<path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
</svg>
</div>
<div class="view-btn-area">
<p>There will be <?php echo total_cars(); ?>+ Similar Car</p>
<a class="view-btn" href="<?php echo base_url();  ?>search">View More</a>
</div>
<div class="slider-btn next-2 d-md-flex d-none">
<svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
<path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
</svg>
</div>
</div>
</div>
</div>
</div>
</div>

<?php


$gallery_images = json_decode($car_view["car_photo_gallery_ids"], true); 

    $gallery_images  =    json_decode( $gallery_images);
?>


<div id="mySidenav55" class="sidenav55">
   <div class="wrapper_inq_side">
    <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a>
     <div class="bid_destails_wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
           <div class="bid_deatil_car">
           <img src="<?php if (!empty($gallery_images[0])) { echo get_image_path_by_id($gallery_images[0]); } ?>" class="mrapp_mk5" alt="" />
           <h2><?php echo $car_view["car_title"]; ?></h2>
           <p><?php echo $car_view["car_sub_title"]; ?></p>
            <ul class="list-unstyled d-flex flex-wrap align-items-center gap-5 mt-3">

                <!-- Mileage -->
                <li class="d-flex align-items-center gap-2">
                    <img src="<?php echo base_url(); ?>assets/img/inner-page/icon/mileage.svg" width="24" height="24" alt="">
                    <div>
                        <h6 class="mb-0 fw-semibold">
                            <?php echo !empty($car_view["mileage"]) ? $car_view["mileage"] : "-"; ?>
                        </h6>
                        <small class="text-muted">
                            <?php echo $footer_data["mileage_text"]; ?>
                        </small>
                    </div>
                </li>

                <!-- Engine -->
                <li class="d-flex align-items-center gap-2">
                    <img src="<?php echo base_url(); ?>assets/img/inner-page/icon/engine.svg" width="24" height="24" alt="">
                    <div>
                        <h6 class="mb-0 fw-semibold">
                            <?php 
                            if(!empty($car_view["cat_engine"])) {
                                $cat_engine = get_car_cat_by_id_and_table_name($car_view["cat_engine"], 'engine_category');
                                echo !empty($cat_engine) ? $cat_engine["engine_name"] : "-";
                            } else { echo "-"; }
                            ?>
                        </h6>
                        <small class="text-muted">
                            <?php echo $footer_data["engine_text"]; ?>
                        </small>
                    </div>
                </li>

                <!-- Fuel -->
                <li class="d-flex align-items-center gap-2">
                    <img src="<?php echo base_url(); ?>assets/img/inner-page/icon/fuel.svg" width="24" height="24" alt="">
                    <div>
                        <h6 class="mb-0 fw-semibold">
                            <?php 
                            if(!empty($car_view["cat_fuel"])) {
                                $cat_fuel = get_car_cat_by_id_and_table_name($car_view["cat_fuel"], 'fuel_category');
                                echo !empty($cat_fuel) ? $cat_fuel["fuel_name"] : "-";
                            } else { echo "-"; }
                            ?>
                        </h6>
                        <small class="text-muted">
                            <?php echo $footer_data["fuel_type_text"]; ?>
                        </small>
                    </div>
                </li>

                <!-- Year -->
                <li class="d-flex align-items-center gap-2">
                    <img src="<?php echo base_url(); ?>assets/img/inner-page/icon/condition.svg" width="24" height="24" alt="">
                    <div>
                        <h6 class="mb-0 fw-semibold">
                            <?php echo !empty($year_data['year_name']) ? $year_data['year_name'] : "-"; ?>
                        </h6>
                        <small class="text-muted">Fordonsår</small>
                    </div>
                </li>

            </ul>

           </div>
          </div>
          
          <div class="col-md-4">
          <div class="bid_wrap_call">
          <span id="bidcount" > </span>
          
          <a href="#help15" data-bs-toggle="modal"><i class="fa fa-comments"></i> Budgivningsguide</a>
          </div>
          </div>
        </div>
        <div class="row mt_r155" >
          <div class="col-md-5">
          <div class="par_wrap_time">
<?php 
$car_id = $car_view['id'];
$timer_data = get_auction_timer_data($car_id);

// Only show h2 and p if second timer should NOT be shown
if (!$timer_data['show_timer']): 
?>
    <h2><?php if($this->session->userdata('user_id')!=$car_view["post_author_id"]) { echo "Delta i budgivningen"; } else { echo "Du kan inte delta i budet"; } ?></h2>
    <p><?php if (get_post_status($car_view["id"]) == 'timer'): ?>
        <span id="countdown_<?php echo $car_view["id"]; ?>" style="color:red;"></span>
    <?php else: ?>
        <span><?php echo get_post_status($car_view["id"]); ?></span>
    <?php endif; ?></p>
<?php endif; ?>

<?php 
$car_id = $car_view['id'];
$timer_data = get_auction_timer_data($car_id);

if ($timer_data['show_timer']): 
?>
    <div class="auction-details">
        <h3>Auktionen avslutas snart!</h3>
        
        <div class="auction-timer-wrapper" 
             data-car-id="<?php echo $car_id; ?>"
             data-created-timestamp="<?php echo $timer_data['created_timestamp']; ?>"
             data-show-timer="1">
        </div>
        <br>
    </div>
<?php endif; ?>
          </div>
          
          <div class="gray_wrap554">
          <?php if(!$this->session->userdata('user_id')){ ?>
          <div class="sign_filpo5">
      
          <a onclick="closeNav()" href="javascript:;" data-bs-toggle="modal" data-bs-target="#logInModal01" >Sign in</a> <span>or</span> <a onclick="closeNav()" href="javascript:;" data-bs-toggle="modal" data-bs-target="#signUpModal01">Skapa konto</a>
       
          <p>in order to participate in bidding.</p>
          </div>
          <input type="hidden" name="car_id" id="car_id" value="<?php echo $car_view["id"]; ?>" /> 
          <?php }else{ ?>

            <?php 
			//print_r($car_view);
			
			if($car_view["auction_status"]!=1){ ?>
            
<div class="plaf55" id="bidformbox">
<?php if($this->session->userdata('user_id')!=$car_view["post_author_id"] && get_post_status($car_view["id"]) != "Auction Time Completed"){ ?>  
<h3>Lägg ett bud på detta fordon</h3>

<?php 
// Show recommended bid if there's already a bid placed
if(!empty($highest_bid)) { 
    $recommended = $highest_bid + 500;
?>
<div id="recommended_bid" style="margin-bottom: 10px; padding: 8px; background: #f0f8ff; border-left: 3px solid #2196F3; border-radius: 4px;">
    <small style="color: #666; font-size: 12px;">Rekommenderat bud:</small>
    <div style="font-size: 16px; font-weight: 600; color: #2196F3; margin-top: 3px;">
        <?php echo number_format($recommended, 0, '', ' ') . ' ' . $this->config->item('CURRENCY'); ?>
    </div>
</div>
<?php 
}
?>

<?php } ?>

<div class="place_wrap_add">
<?php if(($this->session->userdata('user_id')!=$car_view["post_author_id"]) && get_post_status($car_view["id"]) != "Auction Time Completed"){ ?>

<!-- Single input field that changes purpose based on checkbox -->
<input name="bidprice" id="bidprice" class="plac_inpt" placeholder="Budbelopp" type="text" required>


<!-- Single Lägg bud button -->
<input name="" id="place_bid_btn" class="plac_inpt2" value="Lägg bud" type="button"> 
<?php } ?>

<input type="hidden" name="car_id" id="car_id" value="<?php echo $car_view["id"]; ?>" />
</div>
</div>
<!-- Dynamic help text that changes based on checkbox -->
<div id="bid_input_help" style="font-size: 11px; color: #666; margin-top: 5px; margin-bottom: 10px;">
    Ange ditt budbelopp
</div>

<p class="message"></p>

<!-- SIMPLIFIED AUTO-BID CHECKBOX -->
<?php if($this->session->userdata('user_id')!=$car_view["post_author_id"] && get_post_status($car_view["id"]) != "Auction Time Completed"){ ?>
<div style="margin-top: 15px; padding: 15px; background: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;">
    <label style="display: flex; align-items: center; margin-bottom: 0; cursor: pointer;">
        <input type="checkbox" id="enable_auto_bid" name="enable_auto_bid" style="margin-right: 8px; width: 18px; height: 18px;">
        <span style="font-size: 15px; font-weight: 600; color: #495057;">
            <i class="fa fa-robot" style="color: #3b82f6;"></i> Aktivera Auto-Bud
        </span>
    </label>
    
    <!-- Info section that shows when checkbox is checked -->
    <div id="auto_bid_info" style="display: none; margin-top: 12px; background: #e3f2fd; padding: 12px; border-radius: 6px; border-left: 3px solid #2196F3;">
        <p style="font-size: 12px; color: #1565c0; margin: 0; line-height: 1.6;">
            <i class="fa fa-info-circle"></i> 
            <strong>Hur det fungerar:</strong><br>
            • Beloppet ovan blir ditt <strong>maximala auto-bud</strong><br>
            • Systemet lägger först ett bud på <span id="initial_auto_bid_amount" style="font-weight: 600;">-</span><br>
            • Därefter bjuds automatiskt åt dig med 500 SEK åt gången<br>
            • Budgivningen fortsätter tills någon bjuder över ditt max-belopp
        </p>
    </div>
    
    <!-- Warning if amount is too low -->
    <div id="auto_bid_warning" style="display: none; margin-top: 10px; background: #fff3cd; padding: 10px; border-radius: 6px; border-left: 3px solid #ffc107;">
        <p style="font-size: 11px; color: #856404; margin: 0;">
            <i class="fa fa-exclamation-triangle"></i> 
            Max auto-bud måste vara minst <strong>1000 SEK</strong> högre än nuvarande högsta bud
        </p>
    </div>
</div>
<?php } ?>
          <?php }else{ ?>
		  <button name="" class="plac_inpt" style="border-radius: 7px;font-size: 13px;font-weight: 600;background-color: #ff7400;padding: 5px 0px; color: #fff;" value="" type="button"><i class="fa fa-trophy"></i> Vinnare utsedd</button>
            <input type="hidden" name="car_id" id="car_id" value="<?php echo $car_view["id"]; ?>" />
            <?php

          } } ?>

          </div>
          </div>
          <div class="col-md-7">
            <div class="resv_wrap_bid">
               <div class="head_res_p5 reservation_cls">Reservationspriset har inte uppnåtts</div>

              
               
               <div class="row">
                <div class="col-md-12">
                 <div class="row" id="yourContainerId" >
                 </div>
                 </div>
                 


               </div>

            </div>
          </div>
        </div>
      </div>
     </div>
   </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const initialBidBtn = document.getElementById('initial_bid_btn');
    const verifyBidBtn = document.getElementById('verify_bid_btn');
    const finalPlaceBidBtn = document.getElementById('final_place_bid_btn');
    const bidPriceInput = document.getElementById('bidprice');
    const bidForm = document.getElementById('bidform');

    // Step 1: Click "Lägg bud" - Show Verify Bid button
    if (initialBidBtn) {
        initialBidBtn.addEventListener('click', function() {
            if (!bidPriceInput.value) {
                alert('Vänligen ange ett budbelopp');
                return;
            }
            
            // Hide initial button, show verify button
            initialBidBtn.style.display = 'none';
            verifyBidBtn.style.display = 'block';
        });
    }

    // Step 2: Click "Verify Bid" - Show Place Bid button
    if (verifyBidBtn) {
        verifyBidBtn.addEventListener('click', function() {
            // Hide verify button, show final place bid button
            verifyBidBtn.style.display = 'none';
            finalPlaceBidBtn.style.display = 'block';
        });
    }

    // Step 3: Submit form when "Place Bid" is clicked
    if (bidForm) {
        bidForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Your existing form submission logic here
            // For example:
            // submitBidForm();
        });
    }
});
</script>

<div class="modal signUp-modal fade" id="help15" tabindex="-1" aria-labelledby="signUpModal01Label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="signUpModal01Label"> Budgivningsguide</h4>

<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
</div>
<div class="modal-body">
<p><?php 
$footer_data = get_header_footer_by_id(1);

echo $footer_data["bidding_guide"]; ?></p>
</div>
</div>
</div>
</div>

<script>
// ahmad muslim changes
// Mobile image slider functionality
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 768) {
        const sliders = document.querySelectorAll('.mobile-image-slider');
        
        sliders.forEach(slider => {
            const images = slider.querySelectorAll('.slider-image');
            const dots = slider.querySelectorAll('.dot');
            let currentIndex = 0;
            let startX = 0;
            let isDragging = false;
            
            // Show first image
            images[0].classList.add('active');
            
            function showImage(index) {
                images.forEach(img => img.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));
                images[index].classList.add('active');
                dots[index].classList.add('active');
                currentIndex = index;
            }
            
            // Touch events for swipe
            slider.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                isDragging = true;
            });
            
            slider.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
            });
            
            slider.addEventListener('touchend', (e) => {
                if (!isDragging) return;
                const endX = e.changedTouches[0].clientX;
                const diff = startX - endX;
                
                if (Math.abs(diff) > 50) { // Minimum swipe distance
                    if (diff > 0 && currentIndex < images.length - 1) {
                        showImage(currentIndex + 1);
                    } else if (diff < 0 && currentIndex > 0) {
                        showImage(currentIndex - 1);
                    }
                }
                isDragging = false;
            });
            
            // Dot click navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => showImage(index));
            });
        });
    }
});


 const offset = 330; // Offset value (200px from the top)
const scrollDuration = 100; // Duration in milliseconds (increase for slower scrolling)

document.querySelectorAll('a.nav-link').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    if (this.hash !== "") {
      e.preventDefault();
      const targetID = this.hash;
      const targetElement = document.querySelector(targetID);

      if (targetElement) {
        const startPosition = window.pageYOffset;
        const targetPosition = targetElement.offsetTop - offset;
        const distance = targetPosition - startPosition;
        let startTime = null;

        function animation(currentTime) {
          if (startTime === null) startTime = currentTime;
          const timeElapsed = currentTime - startTime;
          const run = ease(timeElapsed, startPosition, distance, scrollDuration);

          window.scrollTo(0, run);

          if (timeElapsed < scrollDuration) {
            requestAnimationFrame(animation);
          }
        }

        function ease(t, b, c, d) {
          t /= d / 2;
          if (t < 1) return c / 2 * t * t + b;
          t--;
          return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
      }
    }
  });
});

</script>
<script type="text/javascript">
// Immediately check if script is being loaded
<?php 
$current_user_id = $this->session->userdata('user_id');
if (!empty($current_user_id)) {
    echo "window.currentLoggedInUserId = " . intval($current_user_id) . ";";
} else {
    echo "window.currentLoggedInUserId = null;";
}
?>

// Function to initialize everything
function initializeBidSystem() {
    if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
        console.error('❌ jQuery not loaded yet, retrying in 100ms...');
        setTimeout(initializeBidSystem, 100);
        return;
    }

    /**
     * REAL-TIME BID UPDATES CLASS
     */
    class RealtimeBidUpdates {
        constructor(carId) {
            this.carId = carId;
            this.pollInterval = null;
            this.lastBidCount = 0;
            this.isRunning = false;
            this.currentHighestBid = 0;
        }

        start() {
            if (this.isRunning) return;
            this.isRunning = true;
            this.loadBidData();
            this.pollInterval = setInterval(() => {
                this.loadBidData();
            }, 500);
        }

        stop() {
            if (this.pollInterval) {
                clearInterval(this.pollInterval);
                this.pollInterval = null;
                this.isRunning = false;
            }
        }

        loadBidData() {
            const baseUrl = '<?php echo base_url(); ?>';
            
            $.ajax({
                url: baseUrl + 'auth/get_bid_updates',
                method: 'POST',
                dataType: 'json',
                data: { car_id: this.carId },
                success: (response) => {
                    if (response.success) {
                        this.updateUI(response.data);
                        if (response.data.bid_count > this.lastBidCount && this.lastBidCount > 0) {
                            // Optional: Show notification
                        }
                        this.lastBidCount = response.data.bid_count;
                    }
                },
                error: (xhr, status, error) => {
                    console.error('❌ AJAX Error:', error);
                }
            });
        }

            updateUI(data) {
                // Store current highest bid for auto-bid calculations
                if (data.highest_bid !== undefined) {
                    this.currentHighestBid = parseInt(data.highest_bid) || 0;  // ✅ FIX: Convert to integer
                }            
            // Update countdown/status
            if (data.post_status !== undefined) {
                const statusText = data.post_status === 'timer' ? data.time_remaining : data.post_status;
                
                $('[id^="countdown_' + this.carId + '"]').each(function() {
                    const $parent = $(this).parent();
                    if (data.post_status === 'timer') {
                        $parent.html('<span id="' + $(this).attr('id') + '" style="color:red;">' + statusText + '</span>');
                    } else {
                        $parent.html('<span>' + statusText + '</span>');
                    }
                });
            }
            
            // Update bid count
            if (data.bid_count !== undefined) {
                $('#bidcount').html('<strong>' + data.bid_count + '</strong> bud');
            }

            // Update highest bid
            if (data.highest_bid !== undefined) {
                const bidText = data.highest_bid > 0 
                    ? this.formatNumber(data.highest_bid) + ' SEK'
                    : 'Inga bud har lagts ännu';
                $('.leadingbox').html(bidText);
            }

            // Update recommended bid
            if (data.highest_bid !== undefined && data.highest_bid > 0) {
                const recommendedBid = parseInt(data.highest_bid) + 500;
                $('#recommended_bid div:last-child').html(
                    this.formatNumber(recommendedBid) + ' SEK'
                );
            }

            // Update reservation status
            if (data.reservation_met !== undefined) {
                if (data.reservation_met) {
                    $('.reservation_cls')
                        .removeClass('reservation_cls')
                        .addClass('reservation_met_cls')
                        .text('Reservationspriset har uppnåtts');
                } else {
                    $('.reservation_met_cls')
                        .removeClass('reservation_met_cls')
                        .addClass('reservation_cls')
                        .text('Reservationspriset har inte uppnåtts');
                }
            }

            // Update bid list
            if (data.bids !== undefined && data.bids.length > 0) {
                this.updateBidList(data.bids);
            }

            // Update timer
            if (data.timer_timestamp !== undefined) {
                this.updateTimer(data.timer_timestamp);
            }

            // Update auction status
            if (data.auction_active !== undefined && data.auction_active) {
                this.enableBidding();
            } else if (data.auction_active === false) {
                this.disableBidding();
            }
        }

updateBidList(bids) {
    const container = $('#yourContainerId');
    container.empty();
    
    const currentUserId = window.currentLoggedInUserId || null;
    const anonymousUserMap = {};
    let anonymousCounter = 1;
    
    // Assign anonymous numbers
    bids.forEach((bid) => {
        const userId = bid.user_id;
        const isCurrentUser = currentUserId && (String(userId) === String(currentUserId));
        
        if (!isCurrentUser && !anonymousUserMap[userId]) {
            anonymousUserMap[userId] = anonymousCounter++;
        }
    });
    
    // Get the overall highest bid (first bid in the list)
    const overallHighest = bids.length > 0 ? parseInt(bids[0].amount) : 0;
    const totalBids = bids.length;
    
    // Display bids
    bids.forEach((bid, index) => {
        const userId = bid.user_id;
        const isAuto = bid.is_auto_bid == 1;
        const bidAmount = parseInt(bid.amount);
        const timeAgo = bid.time_ago || 'Unknown';
        const bidderName = bid.bidder_name || 'Anonymous';
        const maxAutoBid = bid.max_auto_bid ? parseInt(bid.max_auto_bid) : null;
        
        const isCurrentUser = currentUserId && (String(userId) === String(currentUserId));
        
        let displayName;
        if (isCurrentUser) {
            displayName = bidderName;
        } else {
            const anonNumber = anonymousUserMap[userId];
            displayName = `Anonym budgivare ${anonNumber}`;
        }
        
        const isTopBid = index === 0;
        const showLeadingBadge = isTopBid && isCurrentUser;
        
        // Bid number badge (reversed: 0 for oldest, highest number for newest)
        const bidNumber = totalBids - 1 - index;
        const bidNumberHTML = `<span class="bid-number-badge">Bud #${bidNumber}</span>`;
        
        // ✅ SIMPLE LOGIC: Show "Max Reached" if this auto-bid's max is exceeded by current highest
        let badgeHTML = '';
        if (isAuto && maxAutoBid && overallHighest > maxAutoBid) {
            // Current highest bid exceeded this auto-bid's max
            badgeHTML = '<span class="bid-type-badge bid-type-max-reached">⚠️ Max Auto-Bud Uppnådd ' + this.formatNumber(maxAutoBid) + ' SEK</span>';
        } else if (isAuto) {
            // Regular auto-bid, still active
            badgeHTML = '<span class="bid-type-badge bid-type-auto"><i class="fa fa-robot auto-bid-icon"></i> Auto Bud</span>';
        } else {
            // Manual bid
            badgeHTML = '<span class="bid-type-badge bid-type-manual">✓ Manuellt</span>';
        }
        
        const topBidClass = isTopBid ? 'top-bid-item' : '';
        const colClass = 'col-md-12';
        
        const bidItemHTML = `
            <div class="${colClass}">
                <div class="bid-history-item ${topBidClass}">
                    ${showLeadingBadge ? '<div class="leading-bid-banner"><i class="fa fa-trophy"></i> Detta är ditt ledande bud</div>' : ''}
                    <div class="bidder-info">
                        ${bidNumberHTML}
                        <span class="bidder-name">${displayName}</span>
                        ${badgeHTML}
                    </div>
                    <div class="bid-amount-info">
                        <div class="bid-amount">${this.formatNumber(bidAmount)} SEK</div>
                        <span class="bid-time">${timeAgo}</span>
                    </div>
                </div>
            </div>
        `;
        
        container.append(bidItemHTML);
    });
    
    if (bids.length === 0) {
        container.html('<div class="col-md-12"><p style="text-align:center; padding:20px; color:#999;">Inga bud har lagts ännu</p></div>');
    }
}

        updateTimer(newTimestamp) {
            if (window.auctionTimers && window.auctionTimers.length > 0) {
                window.auctionTimers.forEach(timer => {
                    if (timer.carId == this.carId) {
                        timer.createdTimestamp = newTimestamp;
                        timer.render();
                    }
                });
            }
        }

        enableBidding() {
            $('#bidformbox').show();
            $('#place_bid_btn').prop('disabled', false).show();
            $('.message').html('');
        }

        disableBidding() {
            $('#bidformbox').hide();
            $('.message').html('<p style="color:red;">Auktionstiden avslutad</p>');
        }

        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        }
        
        getCurrentHighestBid() {
            return parseInt(this.currentHighestBid) || 0;  // ✅ FIX: Always return integer
        }
    }

    // Initialize when DOM is ready
    $(document).ready(function() {
        const carId = $('#car_id').val();
        
        if (!carId) {
            console.warn('⚠️ No car ID found, real-time updates disabled');
            return;
        }
        
        window.bidUpdates = new RealtimeBidUpdates(carId);
        window.bidUpdates.start();
        
        // Auto-bid checkbox handler - changes UI based on state
        $('#enable_auto_bid').on('change', function() {
            const isChecked = $(this).is(':checked');
            const currentHighest = parseInt(window.bidUpdates.getCurrentHighestBid()) || 0;  // ✅ CRITICAL FIX
            const initialBid = currentHighest + 500;
            
            if (isChecked) {
                // Show auto-bid info
                $('#auto_bid_info').slideDown(300);
                
                // Update placeholder and help text
                const minMax = initialBid + 1000;
                var displayValue = Math.max(minMax - 500, 0);

                $('#bidprice').attr(
                    'placeholder',
                    'Max auto-bud belopp (minst ' + displayValue.toLocaleString('sv-SE') + ' SEK)'
                );
                $('#bid_input_help').html('<strong style="color: #2196F3;">Auto-bud aktiverat:</strong> Ange ditt maximala budbelopp');
                
                // Update initial auto-bid amount in info
                $('#initial_auto_bid_amount').text(initialBid.toLocaleString('sv-SE') + ' SEK');
                
                // Validate current input
                validateAutoBidAmount();
            } else {
                // Hide auto-bid info and warning
                $('#auto_bid_info').slideUp(300);
                $('#auto_bid_warning').slideUp(300);
                
                // Reset placeholder and help text
                $('#bidprice').attr('placeholder', 'Budbelopp');
                $('#bid_input_help').html('Ange ditt budbelopp');
            }
        });
        // Validate auto-bid amount as user types
        $('#bidprice').on('input', function() {
            if ($('#enable_auto_bid').is(':checked')) {
                validateAutoBidAmount();
            }
        });
        
        function validateAutoBidAmount() {
            const enteredAmount = $('#bidprice').val().replace(/\s/g, '');
            
            if (!enteredAmount) {
                $('#auto_bid_warning').slideUp(200);
                return;
            }
            
            const amount = parseInt(enteredAmount);
            const currentHighestInt = parseInt(window.bidUpdates.getCurrentHighestBid()) || 0;  // ✅ FIX
            const minimumMax = currentHighestInt + 1000;  // ✅ FIX
            
            if (amount < minimumMax) {
                // ✅ Show the ACTUAL required amount, not just "1000 SEK"
                $('#auto_bid_warning p').html(`
                    <i class="fa fa-exclamation-triangle"></i> 
                    Max auto-bud måste vara minst <strong>${minimumMax.toLocaleString('sv-SE')} SEK</strong>
                `);
                $('#auto_bid_warning').slideDown(200);
            } else {
                $('#auto_bid_warning').slideUp(200);
            }
        }
// Place bid button click handler
$('#place_bid_btn').on('click', function(e) {
    e.preventDefault();
    
    let bidAmount = $('#bidprice').val();
    
    if (!bidAmount || bidAmount.trim() === '') {
        alert('Vänligen ange ett belopp');
        return;
    }
    
    bidAmount = bidAmount.replace(/\s/g, '');
    const bidAmountInt = parseInt(bidAmount);
    
    if (isNaN(bidAmountInt) || bidAmountInt <= 0) {
        alert('Vänligen ange ett giltigt belopp');
        return;
    }
    
    const autoBidEnabled = $('#enable_auto_bid').is(':checked');
    const currentHighest = window.bidUpdates.getCurrentHighestBid();
    
    if (autoBidEnabled) {
        // AUTO-BID MODE: Amount is max auto-bid
        const currentHighestInt = parseInt(currentHighest) || 0;  // ✅ FIX
        const minimumMax = currentHighestInt + 1000;
        
        if (bidAmountInt < minimumMax) {
            alert('Max auto-bud måste vara minst ' + minimumMax.toLocaleString('sv-SE') + ' SEK');
            return;
        }
        
        const initialBid = currentHighestInt + 500;  // ✅ FIX
        const formattedInitial = initialBid.toLocaleString('sv-SE');
        const formattedMax = bidAmountInt.toLocaleString('sv-SE');
        
        const confirmMessage = `Aktivera auto-bud:\n\n` +
            `• Första budet: ${formattedInitial} SEK\n` +
            `• Max auto-bud: ${formattedMax} SEK\n\n` +
            `Systemet bjuder automatiskt åt dig upp till max-beloppet.\n\nFortsätt?`;
        
        if (confirm(confirmMessage)) {
            submitBid(initialBid, bidAmountInt, true);
        }
    } else {
        // MANUAL BID MODE: Amount is the actual bid
        const currentHighestInt = parseInt(currentHighest) || 0;  // ✅ FIX
        const minimumBid = currentHighestInt + 500;  // ✅ FIX
        
        if (bidAmountInt < minimumBid) {
            alert('Ditt bud måste vara minst ' + minimumBid.toLocaleString('sv-SE') + ' SEK');
            return;
        }
        
        const formattedAmount = bidAmountInt.toLocaleString('sv-SE');
        const confirmMessage = `Lägg ett manuellt bud på ${formattedAmount} SEK?`;
        
        if (confirm(confirmMessage)) {
            submitBid(bidAmountInt, null, false);
        }
    }
});
        // Add Enter key support
        $('#bidprice').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                $('#place_bid_btn').click();
            }
        });

        // Submit bid function
        function submitBid(bidAmount, maxAutoBid, isAutoBid) {
            const dataToSend = {
                car_id: carId,
                bidprice: bidAmount
            };
            
            if (isAutoBid && maxAutoBid) {
                dataToSend.max_auto_bid = maxAutoBid;
            }
                        
            $('#place_bid_btn').prop('disabled', true).val('Skickar...');
            
            $.ajax({
                url: '<?php echo base_url(); ?>auth/bid_added',
                method: 'POST',
                dataType: 'json',
                data: dataToSend,
                success: function(response) {
                    
                    if (response.status === 'success') {
                        $('.message').html('<p style="color:green; padding: 10px; background: #d4edda; border-radius: 5px; margin-top: 10px;">' + 
                            '<i class="fa fa-check-circle"></i> ' + response.message + '</p>');
                        
                        // Clear form
                        $('#bidprice').val('');
                        $('#enable_auto_bid').prop('checked', false);
                        $('#auto_bid_info').hide();
                        $('#auto_bid_warning').hide();
                        $('#bidprice').attr('placeholder', 'Budbelopp');
                        $('#bid_input_help').html('Ange ditt budbelopp');
                        
                        // Reload bid data
                        window.bidUpdates.loadBidData();
                    } else {
                        $('.message').html('<p style="color:red; padding: 10px; background: #f8d7da; border-radius: 5px; margin-top: 10px;">' + 
                            '<i class="fa fa-exclamation-circle"></i> ' + response.message + '</p>');
                    }
                    
                    $('#place_bid_btn').prop('disabled', false).val('Lägg bud');
                },
                error: function(xhr, status, error) {
                    console.error('❌ AJAX Error:', error);
                    console.error('Response:', xhr.responseText);
                    $('.message').html('<p style="color:red; padding: 10px; background: #f8d7da; border-radius: 5px; margin-top: 10px;">' + 
                        '<i class="fa fa-exclamation-circle"></i> Ett fel uppstod. Försök igen.</p>');
                    $('#place_bid_btn').prop('disabled', false).val('Lägg bud');
                }
            });
        }
    });
}

// Start initialization
initializeBidSystem();
</script>