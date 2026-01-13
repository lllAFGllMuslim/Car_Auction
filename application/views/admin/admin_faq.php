<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">

<?php $this->load->view('admin/admin_sidebar'); ?>

</div>
<div class="col-xl-9">
<form id="faqForm">
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Faq Page</div>
</div>
<div class="col-lg-5">
<div class="add_photo_net1">Banner image</div>
<div class="add_imk_car_foot"><input name="faq_banner_image" id="faq_banner_image" type="file"></div>
<div class="add_imk_car_foot2" <?php if(empty($faq['faq_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="faq_banner_image_preview" style="background-image:url(<?php if(!empty($faq['faq_banner_image_id'])){echo get_image_path_by_id($faq['faq_banner_image_id']);  } ?>);"><a  id="remove_faq_banner_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>
<div class="col-lg-5"></div>
<div class="col-lg-12 add_sty1">
<label>Banner sub title</label>
<input name="faq_banner_sub_title" id="faq_banner_sub_title" value="<?php echo $faq['faq_banner_sub_title']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Banner main title</label>
<input name="faq_banner_main_title" id="faq_banner_main_title" value="<?php echo $faq['faq_banner_main_title']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Page main title</label>
<input name="faq_page_main_title" id="faq_page_main_title" value="<?php echo $faq['faq_page_main_title']; ?>" type="text">
</div>

<div class="col-lg-5">
<div class="add_photo_net1">Page image</div>
<div class="add_imk_car_foot"><input name="faq_page_image" id="faq_page_image" type="file"></div>

<div class="add_imk_car_foot2" <?php if(empty($faq['faq_page_image_id'])){ ?> style="display: none;" <?php } ?> id="faq_page_image_preview" style="background-image:url(<?php if(!empty($faq['faq_page_image_id'])){echo get_image_path_by_id($faq['faq_page_image_id']);  } ?>);"><a  id="remove_faq_page_image" href="javascript:;"><i class="fa fa-close"></i></a></div>

</div>


<div class="container">
    <div id="faq-container">

    <?php


if (!empty($faqs)) {
    foreach ($faqs as $value) {
        ?>
        <div class="row faq-item">
            <div class="col-lg-11"> 
                <div class="add_sty1">
                    <label>Question</label>
                    <input class="question" data-feild="question" data-id="<?php echo $value['id']; ?>" name="question[]" value="<?php echo htmlspecialchars($value['quesion'], ENT_QUOTES, 'UTF-8'); ?>" type="text">
                </div>
                <div class="add_sty1 mb-2">
                    <label>Answer</label>
                    <input class="answer" data-feild="answer" data-id="<?php echo $value['id']; ?>" name="answer[]" value="<?php echo htmlspecialchars($value['ans'], ENT_QUOTES, 'UTF-8'); ?>" >
                </div>
            </div>
            <div class="col-lg-1">
                <a href="javascript:;" data-id="<?php echo $value['id']; ?>" class="close_po5 remove-faq"><i class="fa fa-close"></i></a>
            </div>
        </div>
        <?php
    }
}
?>


    </div>

    <div class="col-lg-12 mt-0">
        <a href="javascript:;" class="add_nj5" id="add-faq">+ Add FAQ</a>
      
    </div>
</div>






<div class="col-lg-12">
<div class="form-inner">
<button class="primary-btn2" type="submit">Update now</button>
<input type="hidden" name="faq_banner_image_id" id="faq_banner_image_id" value="<?php echo $faq['faq_banner_image_id']; ?>" />
<input type="hidden" name="faq_page_image_id" id="faq_page_image_id" value="<?php echo $faq['faq_page_image_id']; ?>" />
<input type="hidden" name="id" id="id" value="1" />
</div>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>
</div>
</div>