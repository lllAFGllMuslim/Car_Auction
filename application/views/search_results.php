  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css">
   <style>
       .max-value{
           float:right;
       }
	   .add_wrt15 label {
    font-family: var(--font-open-sans) !important;
    color: var(--text-color) !important;
}
   </style>

<div class="inner-page-banner">
<div class="banner-wrapper">
<div class="container-fluid">
<div class="banner-main-content-wrap bh556">
<div class="row">
<div class="col-xl-6 col-lg-7 d-flex align-items-center">
<div class="banner-content">
<h1>Sök Efter Din Bil</h1>

<?php 
// print_r($brand_category);
?>
</div>
</div>
<div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
<div class="banner-img">
<img src="<?php echo base_url(); ?>assets/img/inner-page/inner-banner-img.png" class="ma_r55" alt>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="product-search-area mb-100">
<div class="container">
<!-- Mobile Accordion - Only visible on mobile -->
<div class="mobile-search-accordion d-block d-md-none">
<div class="accordion-header" onclick="toggleAccordion()">
<span>Filtrera din bil</span>
<span class="accordion-icon">+</span>
</div>
<div class="accordion-content" id="mobileSearchContent">
<form>
<div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 justify-content-right5">
<div class="col">
<div class="form-inner">
<select name="category" id="category" onchange="this.form.submit()">
<option value="0">Välj Typ</option>
<option  <?php if($this->input->get('category')=='car'){ echo"selected"; } ?> value="car">Car</option>
<option <?php if($this->input->get('category')=='light_truck'){ echo"selected"; } ?> value="light_truck">Light truck</option>
</select>
</div>
</div>
<div class="col">
<div class="form-inner">
<select name="city" onchange="this.form.submit()">
<option value="0">Välj Stad</option>
<?php if(!empty($available_cities)): foreach($available_cities as $c): if(!empty($c['city'])): ?>
<option <?php if(strtolower($this->input->get('city'))==strtolower($c['city'])) echo 'selected'; ?> 
        value="<?php echo strtolower($c['city']); ?>">
    <?php echo ucwords(strtolower($c['city'])); ?>
</option>
<?php endif; endforeach; endif; ?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_brand" id="cat_brand1" onchange="this.form.submit()">
<option value="0" >Välj Varumärke</option>
<?php
if(!empty($brand_category)){
foreach ($brand_category as $value) { ?>
<option <?php if($this->input->get('cat_brand')==$value->brand_slug){ echo"selected"; } ?> value="<?php echo $value->brand_slug; ?>"><?php echo $value->brand_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner modelbox">
<select name="cat_model" id="cat_model">
<option value="0" >Välj Modell</option>
<?php
if(!empty($model_category)){
foreach ($model_category as $value1) { ?>
<option <?php if($this->input->get('cat_model')==$value1->model_slug){ echo"selected"; } ?> value="<?php echo $value1->model_slug; ?>"><?php echo $value1->model_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_fuel" id="cat_fuel">
<option value="0" >Välj Bränsle</option>
<?php
if(!empty($fuel_category)){
foreach ($fuel_category as $value2) { ?>
<option  <?php if($this->input->get('cat_fuel')==$value2->fuel_slug){ echo"selected"; } ?> value="<?php echo $value2->fuel_slug; ?>"><?php echo $value2->fuel_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col polk55">
    <div class="add_wrt15" id="sdr">
        <label onclick="sst()">Välj Miltal</label>
        <div class="slider-container" id="slider1" style="display:none;">
            <div id="dual-slider1"></div>
            <div class="range-values">
                <span class="min-value">10</span>
                <span class="max-value">1000</span>
            </div>
            <input type="hidden" class="min-hidden" name="min-mileage">
            <input type="hidden" class="max-hidden" name="max-mileage">
        </div>
    </div>
</div>

<div class="col polk55">
    <div class="add_wrt15" id="sdr1">
        <label onclick="sstw()">Välj årsmodell</label>
        <div class="slider-container" id="year-slider1" style="display:none;">
            <div id="dual-slider3"></div>
            <div class="range-values">
                <span class="min-value">2000</span>
                <span class="max-value">2024</span>
            </div>
            <input type="hidden" class="min-hidden" name="min-year">
            <input type="hidden" class="max-hidden" name="max-year">
        </div>
    </div>
</div>

<div class="col polk55">
    <div class="add_wrt15" id="sdr2">
        <label onclick="sstr()" class="lku55">Välj Prisklass</label>
        <div class="slider-container" id="slider2" style="display:none;">
            <div id="dual-slider2"></div>
            <div class="range-values">
                <span class="min-value">1</span>
                <span class="max-value">500000</span>
            </div>
            <input type="hidden" class="min-hidden" name="min-price">
            <input type="hidden" class="max-hidden" name="max-price">
        </div>
    </div>
</div>
   
<div class="col">
<div class="form-inner">
<select name="cat_buy_method" id="cat_buy_method">
<option value="0">Välj Köpmetod</option>
<?php
if(!empty($buy_method_category)){
foreach ($buy_method_category as $value4) { ?>
<option  <?php if($this->input->get('cat_buy_method')==$value4->buy_method_slug){ echo"selected"; } ?> value="<?php echo $value4->buy_method_slug; ?>"><?php echo $value4->buy_method_name; ?></option>
<?php
 }
}
?>
</select> 
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_body" id="cat_body">
<option value="0" >Välj Kaross</option>
<?php
if(!empty($body_category)){
foreach ($body_category as $value5) { ?>
<option <?php if($this->input->get('cat_body')==$value5->body_slug){ echo"selected"; } ?> value="<?php echo $value5->body_slug; ?>"><?php echo $value5->body_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_engine" id="cat_engine">
<option value="0">Välj Växellåda</option>
<?php
if(!empty($engine_category)){
foreach ($engine_category as $value6) { ?>
<option <?php if($this->input->get('cat_engine')==$value6->engine_slug){ echo"selected"; } ?> value="<?php echo $value6->engine_slug; ?>"><?php echo $value6->engine_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="condition" id="condition">
<option value="0">Välj Tillstånd</option>
<option  <?php if($this->input->get('condition')=='used'){ echo"selected"; } ?> value="used">Used</option>
<option <?php if($this->input->get('condition')=='new'){ echo"selected"; } ?> value="new">New</option>
</select>
</div>
</div>

<div class="col d-flex align-items-end">
<div class="form-inner">
<button class="primary-btn3" type="submit">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
<path d="M10.2746 9.04904C11.1219 7.89293 11.5013 6.45956 11.3371 5.0357C11.1729 3.61183 10.4771 2.30246 9.38898 1.36957C8.30083 0.436668 6.90056 -0.050966 5.46831 0.00422091C4.03607 0.0594078 2.67747 0.653346 1.66433 1.66721C0.651194 2.68107 0.0582276 4.04009 0.00406556 5.47238C-0.0500965 6.90466 0.43854 8.30458 1.37222 9.39207C2.30589 10.4795 3.61575 11.1744 5.03974 11.3376C6.46372 11.5008 7.89682 11.1203 9.05232 10.2722H9.05145C9.07769 10.3072 9.10569 10.3405 9.13719 10.3729L12.5058 13.7415C12.6699 13.9057 12.8924 13.9979 13.1245 13.998C13.3566 13.9981 13.5793 13.906 13.7435 13.7419C13.9076 13.5779 13.9999 13.3553 14 13.1232C14.0001 12.8911 13.908 12.6685 13.7439 12.5043L10.3753 9.13566C10.344 9.104 10.3104 9.07562 10.2746 9.04904ZM10.5004 5.68567C10.5004 6.31763 10.3759 6.9434 10.1341 7.52726C9.89223 8.11112 9.53776 8.64162 9.0909 9.08849C8.64403 9.53535 8.11352 9.88983 7.52967 10.1317C6.94581 10.3735 6.32003 10.498 5.68807 10.498C5.05611 10.498 4.43034 10.3735 3.84648 10.1317C3.26262 9.88983 2.73211 9.53535 2.28525 9.08849C1.83838 8.64162 1.48391 8.11112 1.24207 7.52726C1.00023 6.9434 0.875753 6.31763 0.875753 5.68567C0.875753 4.40936 1.38276 3.18533 2.28525 2.28284C3.18773 1.38036 4.41177 0.873346 5.68807 0.873346C6.96438 0.873346 8.18841 1.38036 9.0909 2.28284C9.99338 3.18533 10.5004 4.40936 10.5004 5.68567Z"></path>
</svg>
Sök
</button>
</div>
</div>

<div class="col d-flex align-items-end">
<div class="form-inner">
<button class="primary-btn3" type="button" onclick='window.location.href = "<?php echo base_url();  ?>/search?cat_buy_method=auction"'> 
Rensa
</button>
</div>
</div>
</div>
</form>
</div>
</div>

<!-- Desktop Version - Hidden on mobile -->
<div class="d-none d-md-block">
<form>
<div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 justify-content-right5">
<!-- Same content as mobile but without accordion wrapper -->
<div class="col">
<div class="form-inner">
<select name="category" id="category" onchange="this.form.submit()">
<option value="0">Välj Typ</option>
<option  <?php if($this->input->get('category')=='car'){ echo"selected"; } ?> value="car">Car</option>
<option <?php if($this->input->get('category')=='light_truck'){ echo"selected"; } ?> value="light_truck">Light truck</option>
</select>
</div>
</div>
<div class="col">
<div class="form-inner">
<select name="city" onchange="this.form.submit()">
<option value="0">Välj Stad</option>
<?php if(!empty($available_cities)): foreach($available_cities as $c): if(!empty($c['city'])): ?>
<option <?php if(strtolower($this->input->get('city'))==strtolower($c['city'])) echo 'selected'; ?> 
        value="<?php echo strtolower($c['city']); ?>">
    <?php echo ucwords(strtolower($c['city'])); ?>
</option>
<?php endif; endforeach; endif; ?>
</select>
</div>
</div>
<div class="col">
<div class="form-inner">
<select name="cat_brand" id="cat_brand1" onchange="this.form.submit()">
<option value="0" >Välj Varumärke</option>
<?php
if(!empty($brand_category)){
foreach ($brand_category as $value) { ?>
<option <?php if($this->input->get('cat_brand')==$value->brand_slug){ echo"selected"; } ?> value="<?php echo $value->brand_slug; ?>"><?php echo $value->brand_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner modelbox">
<select name="cat_model" id="cat_model">
<option value="0" >Välj Modell</option>
<?php
if(!empty($model_category)){
foreach ($model_category as $value1) { ?>
<option <?php if($this->input->get('cat_model')==$value1->model_slug){ echo"selected"; } ?> value="<?php echo $value1->model_slug; ?>"><?php echo $value1->model_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_fuel" id="cat_fuel">
<option value="0" >Välj Bränsle</option>
<?php
if(!empty($fuel_category)){
foreach ($fuel_category as $value2) { ?>
<option  <?php if($this->input->get('cat_fuel')==$value2->fuel_slug){ echo"selected"; } ?> value="<?php echo $value2->fuel_slug; ?>"><?php echo $value2->fuel_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col polk55">
    <div class="add_wrt15" id="sdr-desktop">
        <label onclick="sstDesktop()">Välj Miltal</label>
        <div class="slider-container" id="slider1-desktop" style="display:none;">
            <div id="dual-slider1-desktop"></div>
            <div class="range-values">
                <span class="min-value">10</span>
                <span class="max-value">1000</span>
            </div>
            <input type="hidden" class="min-hidden" name="min-mileage">
            <input type="hidden" class="max-hidden" name="max-mileage">
        </div>
    </div>
</div>

<div class="col polk55">
    <div class="add_wrt15" id="sdr1-desktop">
        <label onclick="sstwDesktop()">Välj årsmodell</label>
        <div class="slider-container" id="year-slider1-desktop" style="display:none;">
            <div id="dual-slider3-desktop"></div>
            <div class="range-values">
                <span class="min-value">2000</span>
                <span class="max-value">2024</span>
            </div>
            <input type="hidden" class="min-hidden" name="min-year">
            <input type="hidden" class="max-hidden" name="max-year">
        </div>
    </div>
</div>

<div class="col polk55">
    <div class="add_wrt15" id="sdr2-desktop">
        <label onclick="sstrDesktop()" class="lku55">Välj Prisklass</label>
        <div class="slider-container" id="slider2-desktop" style="display:none;">
            <div id="dual-slider2-desktop"></div>
            <div class="range-values">
                <span class="min-value">1</span>
                <span class="max-value">500000</span>
            </div>
            <input type="hidden" class="min-hidden" name="min-price">
            <input type="hidden" class="max-hidden" name="max-price">
        </div>
    </div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_buy_method" id="cat_buy_method">
<option value="0">Välj Köpmetod</option>
<?php
if(!empty($buy_method_category)){
foreach ($buy_method_category as $value4) { ?>
<option  <?php if($this->input->get('cat_buy_method')==$value4->buy_method_slug){ echo"selected"; } ?> value="<?php echo $value4->buy_method_slug; ?>"><?php echo $value4->buy_method_name; ?></option>
<?php
 }
}
?>
</select> 
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_body" id="cat_body">
<option value="0" >Välj Kaross</option>
<?php
if(!empty($body_category)){
foreach ($body_category as $value5) { ?>
<option <?php if($this->input->get('cat_body')==$value5->body_slug){ echo"selected"; } ?> value="<?php echo $value5->body_slug; ?>"><?php echo $value5->body_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="cat_engine" id="cat_engine">
<option value="0">Välj Växellåda</option>
<?php
if(!empty($engine_category)){
foreach ($engine_category as $value6) { ?>
<option <?php if($this->input->get('cat_engine')==$value6->engine_slug){ echo"selected"; } ?> value="<?php echo $value6->engine_slug; ?>"><?php echo $value6->engine_name; ?></option>
<?php
 }
}
?>
</select>
</div>
</div>

<div class="col">
<div class="form-inner">
<select name="condition" id="condition">
<option value="0">Välj Tillstånd</option>
<option  <?php if($this->input->get('condition')=='used'){ echo"selected"; } ?> value="used">Used</option>
<option <?php if($this->input->get('condition')=='new'){ echo"selected"; } ?> value="new">New</option>
</select>
</div>
</div>

<div class="col d-flex align-items-end">
<div class="form-inner">
<button class="primary-btn3" type="submit">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
<path d="M10.2746 9.04904C11.1219 7.89293 11.5013 6.45956 11.3371 5.0357C11.1729 3.61183 10.4771 2.30246 9.38898 1.36957C8.30083 0.436668 6.90056 -0.050966 5.46831 0.00422091C4.03607 0.0594078 2.67747 0.653346 1.66433 1.66721C0.651194 2.68107 0.0582276 4.04009 0.00406556 5.47238C-0.0500965 6.90466 0.43854 8.30458 1.37222 9.39207C2.30589 10.4795 3.61575 11.1744 5.03974 11.3376C6.46372 11.5008 7.89682 11.1203 9.05232 10.2722H9.05145C9.07769 10.3072 9.10569 10.3405 9.13719 10.3729L12.5058 13.7415C12.6699 13.9057 12.8924 13.9979 13.1245 13.998C13.3566 13.9981 13.5793 13.906 13.7435 13.7419C13.9076 13.5779 13.9999 13.3553 14 13.1232C14.0001 12.8911 13.908 12.6685 13.7439 12.5043L10.3753 9.13566C10.344 9.104 10.3104 9.07562 10.2746 9.04904ZM10.5004 5.68567C10.5004 6.31763 10.3759 6.9434 10.1341 7.52726C9.89223 8.11112 9.53776 8.64162 9.0909 9.08849C8.64403 9.53535 8.11352 9.88983 7.52967 10.1317C6.94581 10.3735 6.32003 10.498 5.68807 10.498C5.05611 10.498 4.43034 10.3735 3.84648 10.1317C3.26262 9.88983 2.73211 9.53535 2.28525 9.08849C1.83838 8.64162 1.48391 8.11112 1.24207 7.52726C1.00023 6.9434 0.875753 6.31763 0.875753 5.68567C0.875753 4.40936 1.38276 3.18533 2.28525 2.28284C3.18773 1.38036 4.41177 0.873346 5.68807 0.873346C6.96438 0.873346 8.18841 1.38036 9.0909 2.28284C9.99338 3.18533 10.5004 4.40936 10.5004 5.68567Z"></path>
</svg>
Sök
</button>
</div>
</div>

<div class="col d-flex align-items-end">
<div class="form-inner">
<button class="primary-btn3" type="button" onclick='window.location.href = "<?php echo base_url();  ?>/search?cat_buy_method=auction"'> 
Rensa
</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

<script>
function toggleAccordion() {
  const content = document.getElementById('mobileSearchContent');
  const icon = document.querySelector('.accordion-icon');

  const isOpening = !content.classList.contains('active');

  content.classList.toggle('active');
  icon.classList.toggle('active');

  if (isOpening) {
    document.body.classList.add('mobile-acc-open');
  } else {
    document.body.classList.remove('mobile-acc-open');
  }
}
</script>



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


function sst()
{

document.getElementById("slider1").style.display = "";

}
function sstw()
{

document.getElementById("year-slider1").style.display = "";



}
function sstr()
{


document.getElementById("slider2").style.display = "";


}
		 
</script>




<div class="recent-product-section bg_wrap_gray5">
<div class="container max_wrapfull">
<div class="row mb-30 wow fadeInUp z_ind5" data-wow-delay="200ms">
<div class="col-lg-12 product-page">
<div class="show-item-and-filte" style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
  
  <!-- Count -->
  <div data-testid="count" class="HitAndSorting__Container-sc-17cri1-0 iILyEm" style="white-space:nowrap;">
    <?php echo count($cars); ?> ST
  </div>

  <!-- Sort dropdown (no label) -->
  <form name="search" id="search" action="" method="get" style="margin:0;">
    <div class="form-inner orderby" style="margin:0;">
      <select name="order" id="order">
        <option <?php if($this->input->get('order_by')==1) echo 'selected'; ?> value="1">Rekommenderad</option>
        <option <?php if($this->input->get('order_by')==3) echo 'selected'; ?> value="3">Senaste bilarna tillagda</option>
        <?php if(!empty($_REQUEST['cat_buy_method']) && $_REQUEST['cat_buy_method']=='auction'): ?>
        <option <?php if($this->input->get('order_by')==2) echo 'selected'; ?> value="2">Mindre tid kvar</option>
        <option <?php if($this->input->get('order_by')==4) echo 'selected'; ?> value="4">Högsta bud</option>
        <option <?php if($this->input->get('order_by')==5) echo 'selected'; ?> value="5">Lägsta bud</option>
        <?php endif; ?>
        <option <?php if($this->input->get('order_by')==6) echo 'selected'; ?> value="6">Högsta pris hos återförsäljare</option>
        <option <?php if($this->input->get('order_by')==7) echo 'selected'; ?> value="7">Lägsta pris hos återförsäljare</option>
      </select>
    </div>
  </form>

  <!-- Layout switcher (icons only) -->
  <div style="display:flex; gap:6px; margin-left:auto;">
    <button type="button" class="layout-switch-btn active" id="layout-btn-1" onclick="switchMobileLayout(1)">
      <i class="fa fa-list"></i>
    </button>
    <button type="button" class="layout-switch-btn" id="layout-btn-2" onclick="switchMobileLayout(2)">
      <i class="fa fa-th"></i>
    </button>
  </div>

</div><!-- ✅ close show-item-and-filte -->
</div><!-- ✅ close col-lg-12 product-page -->
</div><!-- ✅ close row mb-30 -->

<div class="row">
<div class="car-grid-wrapper-section">
<div class="tab-content">
<div class="tab-pane fade show active" id="popular-car1" role="tabpanel" aria-labelledby="popular-car1-tab">
<div class="row g-2 g-lg-4 mobile-layout-1" id="cars-grid-container">


<?php

if(!empty($cars)){
    
    // print_r($cars);

foreach ($cars as $car):

  $gallery_images = json_decode($car->car_photo_gallery_ids, true); 

  $model_year= get_car_cat_by_id_and_table_name($car->cat_year,'model_year_category');
  $engine= get_car_cat_by_id_and_table_name($car->cat_engine,'engine_category');
  $fuel= get_car_cat_by_id_and_table_name($car->cat_fuel,'fuel_category');
  

?>
<div class="col-lg-3 col-md-6 col-sm-10 hovgh55 wow fadeInUp" data-wow-delay="200ms" style="cursor: pointer;" <?php /*?>onclick=' window.location.href = "<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"'<?php */?>>


<div class="product-card">
<div class="product-img">
  <?php if($car->cat_buy_method==3){
 ?>
<div class="number-of-img">
<i class="fa fa-clock"></i> 


    <?php if (get_post_status($car->id) == 'timer'): ?>
        <span id="countdown_<?php echo $car->id; ?>" style="color:red;"></span>
     
    <?php else: ?>
        <span><?php echo get_post_status($car->id); ?></span>
    <?php endif; ?>
</div>
<?php } ?>

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


<!-- ahmad muslim changes -->
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
<?php if(!empty($car->car_sub_title)): ?>
<p class="car-subtitle" style="font-size: 13px; color: #666; margin: 5px 0 10px 0;"><?php echo $car->car_sub_title; ?></p>
<?php endif; ?>
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

// if(!empty($bids)){
    ?>

<div class="price_wrap15"><span class="fix_st1">ledande bud</span>

<span class="fix_st2 ledf55">
<?php if(!empty($bids)) { echo number_format($bids[0]->bidding_price); } else { echo 0; } ?> <?php echo $this->config->item('CURRENCY'); ?>

</span>

</div>

    
    <?php
    
// }else{
    


?>
<?php if($car->fixed_price != 0) {  ?>
<div class="price_wrap15"><span class="fix_st1">Fast Pris:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car->reduce_price)){  ?>  
<?php echo number_format($car->reduce_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php } ?>
<?php if(!empty($car->reduce_price)){ ?>
<div class="price_wrap16"><?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<?php #} ?>

<?php if($car->emi_show=='yes'){ ?>
<div class="price_wrap17"><span class="pr1556">Med finansiering:</span> <span class="pr1557"><?php monthlyEMI($car->id); ?></span></div>
<?php } ?>

<?php }else{ ?>

<div class="price_wrap15"><span class="fix_st1">Fast Pris:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car->reduce_price)){  ?>  
<?php echo number_format($car->reduce_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php if(!empty($car->reduce_price)){ ?>
<div class="price_wrap16"><?php echo $car->fixed_price; ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<?php if($car->emi_show=='yes'){ ?>
<div class="price_wrap17"><span class="pr1556">Med finansiering:</span> <span class="pr1557"><?php monthlyEMI($car->id); ?></span></div>
<?php } ?>



<?php } ?>

</div>
</div>
</div>

<?php 
endforeach;

}else{

  echo"<p>No search result found</p>";

} ?>



<div class="col-lg-12 mt-40">
<div class="pagination-and-next-prev">
<div class="pagination">
<ul>
<?php
                    // echo "<h2>".$total_pages."</h2>";
                    if($total_pages>1){
                    
                    for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>"><a href="<?php echo base_url('search/' . $i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a></li>
                    <?php endfor; 
                    }
                    ?>
</ul>
</div>
<div class="next-prev-btn">

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

<div class="toprated-used-cars mb-0">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="title">
<h4>Topprankade begagnade bilar till salu</h4>
</div>
<div class="brand-list">
<ul>

<?php

if(!empty($brand_category)){
foreach ($brand_category as $value) { ?>

<li><a href="<?= base_url('search') ?>?cat_brand=<?php echo $value->brand_slug; ?>&cat_buy_method=auction"><?php echo $value->brand_name; ?> <span></span></a></li>
<?php
 }
}
?>
</ul>
</div>
</div>
</div>
</div>
</div>

<!-- Include the noUiSlider library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>
<script>
    // Function to create a dual handle range slider with hidden input fields
    function createRangeSlider(containerId, startValues, minRange, maxRange, stepValue) {
        const container = document.getElementById(containerId);
        const slider = container.querySelector(`#${containerId} > div`);
        const minValueDisplay = container.querySelector('.min-value');
        const maxValueDisplay = container.querySelector('.max-value');
        const minHiddenInput = container.querySelector('.min-hidden');
        const maxHiddenInput = container.querySelector('.max-hidden');

        noUiSlider.create(slider, {
            start: startValues, // Initial values for the slider
            connect: true, // Shows the connection between the handles
            range: {
                'min': minRange,
                'max': maxRange
            },
            step: stepValue // Slider step increment
        });

        // Update values in the DOM and hidden inputs on slider update
        slider.noUiSlider.on('update', function (values) {
            const minVal = Math.round(values[0]);
            const maxVal = Math.round(values[1]);
            
            minValueDisplay.textContent = minVal;
            maxValueDisplay.textContent = maxVal;

            // Update hidden input fields
            minHiddenInput.value = minVal;
            maxHiddenInput.value = maxVal;
        });
    }

    // Mobile sliders
    <?php if(isset($_GET['min-mileage']) && isset($_GET['max-mileage'])){ ?>
        createRangeSlider('slider1', [<?php echo $_GET['min-mileage']; ?>, <?php echo $_GET['max-mileage']; ?>], 0, 40000, 500);
    <?php }else{ ?>
        createRangeSlider('slider1', [1, 40000], 0, 40000, 500);
    <?php } ?>

    <?php if(isset($_GET['min-price']) && isset($_GET['max-price'])){ ?>
        createRangeSlider('slider2', [<?php echo $_GET['min-price']; ?>, <?php echo $_GET['max-price']; ?>], 0, 600000, 5000);
    <?php }else{ ?>
        createRangeSlider('slider2', [0, 600000], 0, 600000, 5000);
    <?php } ?>

    <?php if(isset($_GET['min-year']) && isset($_GET['max-year'])){ ?>
        createYearRangeSlider('year-slider1', [<?php echo $_GET['min-year']; ?>, <?php echo $_GET['max-year']; ?>], 2000, 2025, 1);
    <?php }else{ ?>
        createYearRangeSlider('year-slider1', [2000, 2025], 2000, 2025, 1);
    <?php } ?>

    // Desktop sliders
    <?php if(isset($_GET['min-mileage']) && isset($_GET['max-mileage'])){ ?>
        createRangeSlider('slider1-desktop', [<?php echo $_GET['min-mileage']; ?>, <?php echo $_GET['max-mileage']; ?>], 0, 40000, 500);
    <?php }else{ ?>
        createRangeSlider('slider1-desktop', [1, 40000], 0, 40000, 500);
    <?php } ?>

    <?php if(isset($_GET['min-price']) && isset($_GET['max-price'])){ ?>
        createRangeSlider('slider2-desktop', [<?php echo $_GET['min-price']; ?>, <?php echo $_GET['max-price']; ?>], 0, 600000, 5000);
    <?php }else{ ?>
        createRangeSlider('slider2-desktop', [0, 600000], 0, 600000, 5000);
    <?php } ?>

    <?php if(isset($_GET['min-year']) && isset($_GET['max-year'])){ ?>
        createYearRangeSlider('year-slider1-desktop', [<?php echo $_GET['min-year']; ?>, <?php echo $_GET['max-year']; ?>], 2000, 2025, 1);
    <?php }else{ ?>
        createYearRangeSlider('year-slider1-desktop', [2000, 2025], 2000, 2025, 1);
    <?php } ?>

     // Function to create a dual handle range slider for years with hidden input fields
    function createYearRangeSlider(containerId, startValues, minYear, maxYear, stepValue) {
        const container = document.getElementById(containerId);
        const slider = container.querySelector(`#${containerId} > div`);
        const minValueDisplay = container.querySelector('.min-value');
        const maxValueDisplay = container.querySelector('.max-value');
        const minHiddenInput = container.querySelector('.min-hidden');
        const maxHiddenInput = container.querySelector('.max-hidden');

        noUiSlider.create(slider, {
            start: startValues, // Initial values for the year range
            connect: true, // Shows the connection between the handles
            range: {
                'min': minYear,
                'max': maxYear
            },
            step: stepValue // Year step (typically 1 year)
        });

        // Update values in the DOM and hidden inputs on slider update
        slider.noUiSlider.on('update', function (values) {
            const minVal = Math.round(values[0]);
            const maxVal = Math.round(values[1]);
            
            minValueDisplay.textContent = minVal;
            maxValueDisplay.textContent = maxVal;

            // Update hidden input fields
            minHiddenInput.value = minVal;
            maxHiddenInput.value = maxVal;
        });
    }
function sstDesktop() {
    const slider = document.getElementById("slider1-desktop");
    slider.style.display = slider.style.display === "none" || slider.style.display === "" ? "block" : "none";
}

function sstwDesktop() {
    const slider = document.getElementById("year-slider1-desktop");
    slider.style.display = slider.style.display === "none" || slider.style.display === "" ? "block" : "none";
}

function sstrDesktop() {
    const slider = document.getElementById("slider2-desktop");
    slider.style.display = slider.style.display === "none" || slider.style.display === "" ? "block" : "none";
}

// Close sliders when clicking outside - Desktop only
document.addEventListener('click', function(event) {
    // Only apply to desktop (screen width > 768px)
    if (window.innerWidth > 768) {
        const sliderContainers = [
            { container: document.getElementById('sdr-desktop'), slider: document.getElementById('slider1-desktop') },
            { container: document.getElementById('sdr1-desktop'), slider: document.getElementById('year-slider1-desktop') },
            { container: document.getElementById('sdr2-desktop'), slider: document.getElementById('slider2-desktop') }
        ];

        sliderContainers.forEach(function(item) {
            if (item.container && item.slider) {
                // Check if click is outside the container
                if (!item.container.contains(event.target)) {
                    item.slider.style.display = "none";
                }
            }
        });
    }
});

// Prevent clicks inside slider containers from closing them
document.querySelectorAll('#sdr-desktop, #sdr1-desktop, #sdr2-desktop').forEach(function(container) {
    container.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});

<?php if(isset($_GET['min-year']) && isset($_GET['max-year']) ){ ?>
    // Initialize multiple year sliders
    createYearRangeSlider('year-slider1', [<?php echo $_GET['min-year']; ?>, <?php echo $_GET['max-year']; ?>], 2000, 2025, 1);
        <?php }else{ ?>
     createYearRangeSlider('year-slider1', [2000, 2025], 2000, 2025, 1);
    <?php } ?>
    // Add more sliders by calling createRangeSlider() with different parameters
</script>