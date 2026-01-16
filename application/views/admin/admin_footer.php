<script src="<?php echo base_url(); ?>/assets/js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/slick.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/gsap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/simpleParallax.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/TweenMax.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.marquee.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/script.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/src/richtext.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/src/jquery.richtext.js"></script>


        <script>
        $(document).ready(function() {
            $('#footer_menu1_content').richText();
            $('#footer_menu2_content').richText();
            $('#footer_menu3_content').richText();
            $('#footer_menu4_content').richText();
            $('#about_page_content').richText();
            $('#privacy_policy_content').richText();
            $('#terms_and_conditions_content').richText();
            $('#blog_paragraph').richText();
               $('#bidding_guide').richText();
            
            
            
        });
        </script>
<script>
function cls(ts) {
for(i=1;i<9;i++)
{

document.getElementById("tb"+i).style.display="none";
document.getElementById("clsa"+i).className = "";
}

document.getElementById("tb"+ts).style.display="";
document.getElementById("clsa"+ts).className = "active";
}


function dealerMessage(id){

    $.ajax({ 
                url: '<?= base_url('getdealermessage') ?>', // Replace with your server-side script
                type: 'POST', // Or 'POST' if you're sending data
                data: { brand_id: id }, // Data to send to the server
                success: function(response) {
                    // Handle the response from the server
                    console.log(response); // For debugging purposes
                    // You can update the DOM or take other actions here

                    var res = JSON.parse(response);

                  $("#dealer_message").html(res.message);  


                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.error('AJAX Error:', status, error);
                }
            });

}
</script>


<script>
        $(".marquee_text").marquee({
            direction: "left",
            duration: 25000,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true,
        });
        $(".marquee_text2").marquee({
            direction: "left",
            duration: 25000,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true,
        });

        pureScriptSelect('#select');
    </script>
    
    <script>
    	function openNav() {
  document.getElementById("mySidenav55").style.width = "";
  document.getElementById("bid_side").classList.add("sidecart");
   document.getElementById("mySidenav55").classList.add("sidecart5");
}

function closeNav() {
  document.getElementById("mySidenav55").style.width = "0";
  document.getElementById("bid_side").classList.remove("sidecart");
  document.getElementById("mySidenav55").classList.add("sidecart5");
}	
    </script>

<script>
$(document).ready(function(){
$('li.dropdown').click(function() {
   $('.dropdown ul').hide();
    $(this).children('ul').show();
});
});
</script>

<script>



$(document).ready(function() {
    
    
    

$('#resetform').validate({
    rules: {
        newpassword: {
            required: true,
            minlength: 6
        },
        confirmnewpassword: {
            required: true,
            minlength: 6,
            equalTo: "#newpassword" // Ensure this matches the ID of the new password field
        }
    },
    messages: {
        newpassword: {
            required: "Please enter a new password.",
            minlength: "Your password must be at least 6 characters long."
        },
        confirmnewpassword: {
            required: "Please confirm your new password.",
            minlength: "Your confirmation password must be at least 6 characters long.",
            equalTo: "Your confirmation password does not match the new password."
        }
    },
    submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('reset_password_process') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                              setTimeout(function() {
                        window.location.href = "<?= base_url('profile') ?>";  
                    }, 2000);  
                                               
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    // Handle banner image upload
    $('#banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    // Initialize array for gallery image IDs
    var fileUrls = [];

    // Handle multiple image uploads for gallery
    $('#gallery_images').on('change', function() {
        var files = $(this)[0].files;
        $.each(files, function(i, file) {
            var formData = new FormData();
            formData.append('file', file);
            
            $.ajax({
                url: '<?= base_url('admin/about/uploadImage') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        // Append new image to gallery preview
                        $('#gallery_preview').append('<div id="img_' + res.media_id  + '" class="add_imk_car2" style="background-image:url(' + res.file_url + ');"><a href="javascript:;" class="remove-image" data-id="' + res.media_id + '"><i class="fa fa-close"></i></a></div>');
                        // Store media ID in fileUrls array
                        fileUrls.push(res.media_id);
                        // Update hidden input with JSON string of fileUrls
                        $('#about_gallery_ids').val(JSON.stringify(fileUrls));
                    } else {
                        alert(res.message);
                    }
                }
            });
        });
    });

    // Initialize fileUrls from data-ids attribute on page load
    var dataIds = $('#gallery_preview').attr('data-ids');
    try {
        fileUrls = JSON.parse(dataIds);
    } catch (e) {
        console.error('Invalid JSON data:', dataIds);
        fileUrls = [];
    }
    $('#about_gallery_ids').val(JSON.stringify(fileUrls));

    // Handle removing images from the gallery preview and input field
    $('#gallery_preview').on('click', '.remove-image', function(e) {
        e.preventDefault();
        var mediaId = $(this).data('id');
        // Remove image container from gallery preview
        $('#img_' + mediaId).remove();
        // Remove media ID from fileUrls array
        fileUrls = fileUrls.filter(function(id) {
            return id !== mediaId;
        });
        // Update hidden input with updated fileUrls array as JSON string
        $('#about_gallery_ids').val(JSON.stringify(fileUrls));
    });

    // Handle removing banner image preview
    $('#banner_image_preview').on('click', '#remove_about_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#banner_image_id").val("");
    });

    // Form validation rules using jQuery Validation Plugin
    $('#aboutForm').validate({
        rules: {
            banner_subtitle: {
                required: true
            },
            banner_title: {
                required: true
            },
            page_title: {
                required: true
            },
            page_content: {
                required: true
            }
        },
        messages: {
            banner_subtitle: {
                required: "Please enter a banner subtitle"
            },
            banner_title: {
                required: "Please enter a banner title"
            },
            page_title: {
                required: "Please enter a page title"
            },
            page_content: {
                required: "Please enter page content"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/about/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });



        // Form validation rules using jQuery Validation Plugin
        $('#privacy_policyForm').validate({
        rules: {
            privacy_policy_title: {
                required: true
            }
        },
        messages: {
            privacy_policy_title: {
                required: "Please enter a banner subtitle"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/privacy_policy/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    $('#privacy_policy_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#privacy_policy_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#privacy_policy_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#privacy_policy_banner_image_preview').on('click', '#remove_privacy_policy_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#privacy_policy_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#privacy_policy_banner_image_id").val("");
    });


/*********************** term *************************/

        // Form validation rules using jQuery Validation Plugin
        $('#terms_and_conditionsForm').validate({
        rules: {
            terms_and_conditions_title: {
                required: true
            }
        },
        messages: {
            terms_and_conditions_title: {
                required: "Please enter a banner subtitle"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/terms_and_conditions/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    $('#terms_and_conditions_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#terms_and_conditions_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#terms_and_conditions_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#terms_and_conditions_banner_image_preview').on('click', '#remove_terms_and_conditions_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#terms_and_conditions_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#terms_and_conditions_banner_image_id").val("");
    });





    /************** Header footer page************/



       // Handle banner image upload
       $('#logo').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#logo_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#logo_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#logo').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#logo_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#logo_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#logo_preview').on('click', '#remove_logo', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#logo_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#logo_id").val("");
    });


    $('#favicon').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#favicon_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#favicon_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#favicon_preview').on('click', '#remove_favicon', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#favicon_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#favicon_id").val("");
    });

    $('#footer_logo').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#footer_logo_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#footer_logo_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#footer_logo_preview').on('click', '#remove_footer_logo', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#footer_logo_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#footer_logo_id").val("");
    });

        // Form validation rules using jQuery Validation Plugin
        $('#headefooter').validate({
        rules: {
            site_title: {
                required: true
            }
        },
        messages: {
            site_title: {
                required: "Please enter a site title"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/header_footer/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    $('#banner_image_preview').on('click', '#remove_about_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#banner_image_id").val("");
    });

    /* Home page */



    $('#home_page_form').validate({
        rules: {
            home_page_banner_title: {
                required: true
            }
        },
        messages: {
            home_page_banner_title: {
                required: "Please enter a sub site title"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/home/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  

                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    
    $('#home_page_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#home_page_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#home_page_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#home_page_banner_image_preview').on('click', '#remove_home_page_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#home_page_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#home_page_banner_image_id").val("");
    });

    $('#main_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#main_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#main_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#main_banner_image_preview').on('click', '#remove_main_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#main_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#main_banner_image_id").val("");
    });

    $('#our_trusted_partners').on('change', function() {
        var files = $(this)[0].files;
        $.each(files, function(i, file) {
            var formData = new FormData();
            formData.append('file', file);
            
            $.ajax({
                url: '<?= base_url('admin/about/uploadImage') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        // Append new image to gallery preview
                        $('#our_trusted_partners_preview').append('<div id="img_' + res.media_id  + '" class="add_imk_car2" style="background-image:url(' + res.file_url + ');"><a href="javascript:;" class="remove-image" data-id="' + res.media_id + '"><i class="fa fa-close"></i></a></div>');
                        // Store media ID in fileUrls array
                        fileUrls.push(res.media_id);
                        // Update hidden input with JSON string of fileUrls
                        $('#our_trusted_partners_id').val(JSON.stringify(fileUrls));
                    } else {
                        alert(res.message);
                    }
                }
            });
        });
    });

      // Initialize fileUrls from data-ids attribute on page load
      var dataIds = $('#our_trusted_partners_preview').attr('data-ids');
    try {
        fileUrls = JSON.parse(dataIds);
    } catch (e) {
        console.error('Invalid JSON data:', dataIds);
        fileUrls = [];
    }
    $('#our_trusted_partners_id').val(JSON.stringify(fileUrls));

    // Handle removing images from the gallery preview and input field
    $('#our_trusted_partners_preview').on('click', '.remove-image', function(e) {
        e.preventDefault();
        var mediaId = $(this).data('id');
        // Remove image container from gallery preview
        $('#img_' + mediaId).remove();
        // Remove media ID from fileUrls array
        fileUrls = fileUrls.filter(function(id) {
            return id !== mediaId;
        });
        // Update hidden input with updated fileUrls array as JSON string
        $('#our_trusted_partners_id').val(JSON.stringify(fileUrls));
    });


        /* Contact page */

    $('#contact_form').validate({
        rules: {
            contact_banner_sub_title: {
                required: true
            }
        },
        messages: {
            contact_banner_sub_title: {
                required: "Please enter a sub site title"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/contact/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');

                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  

                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });

    $('#contact_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#contact_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#contact_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#contact_banner_image_preview').on('click', '#remove_contact_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#contact_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#contact_banner_image_id").val("");
    });


    /* FAQ PAGE */

    
    $('#faqForm').validate({
        rules: {
            faq_banner_sub_title: {
                required: true
            }
        },
        messages: {
            faq_banner_sub_title: {
                required: "Please enter a sub site title"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/faq/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');

                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  

                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    
    $('#faq_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#faq_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#faq_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#faq_banner_image_preview').on('click', '#remove_faq_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#faq_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#faq_banner_image_id").val("");
    });


    $('#faq_page_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#faq_page_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#faq_page_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#faq_page_image_preview').on('click', '#remove_faq_page_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#faq_page_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#faq_page_image_id").val("");
    });


    
    $('#add-review').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('admin/reviews/add') ?>',
            type: 'POST',
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {

                   
               
                    var newFaq ='<div class="row review-item"><div class="col-lg-11"><div class="add_sty1"><label>Review</label><input class="review" name="review[]" data-id="'+ res.review_id+'" data-feild="review" type="text"></div><div class="add_sty1 mb-0"><label>Name</label><input data-feild="name" class="name" data-id="'+ res.review_id+'"  name="name[]" /> </div></div> <div class="col-lg-1"><a href="javascript:;" data-id="'+ res.review_id+'"  class="close_po5 remove-review"><i class="fa fa-close"></i></a></div></div>';
                      $('#review-container').append(newFaq);


                } else {
                    alert(res.message);
                }
            }
        });
       
    });

    $(document).on('click', '.remove-review', function(e) {
        e.preventDefault();
        const value = $(this).val();
        const id = $(this).data('id');
        $(this).closest('.review-item').remove();
          // Make AJAX call
          $.ajax({
            url: '<?= base_url('admin/reviews/delete') ?>', // Replace with your server endpoint
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log('AJAX call successful', response);
               
            },
            error: function(error) {
                console.error('AJAX call failed', error);
            }
        });


    });


    $('#add-faq').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('admin/faqs/add') ?>',
            type: 'POST',
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {

                   
               
                    var newFaq ='<div class="row faq-item"><div class="col-lg-11"><div class="add_sty1"><label>Question</label><input class="question" name="question[]" data-id="'+ res.faq_id+'" data-feild="question" type="text"></div><div class="add_sty1 mb-0"><label>Answer</label><input data-feild="answer" class="answer" data-id="'+ res.faq_id+'"  name="answer[]" /> </div></div> <div class="col-lg-1"><a href="javascript:;" data-id="'+ res.faq_id+'"  class="close_po5 remove-faq"><i class="fa fa-close"></i></a></div></div>';
                      $('#faq-container').append(newFaq);


                } else {
                    alert(res.message);
                }
            }
        });
       
    });

    // Function to remove a FAQ item
    $(document).on('click', '.remove-faq', function(e) {
        e.preventDefault();
        const value = $(this).val();
        const id = $(this).data('id');
        $(this).closest('.faq-item').remove();
          // Make AJAX call
          $.ajax({
            url: '<?= base_url('admin/faqs/delete') ?>', // Replace with your server endpoint
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                console.log('AJAX call successful', response);
               
            },
            error: function(error) {
                console.error('AJAX call failed', error);
            }
        });


    });

    // Debounce function to limit the rate of AJAX calls
    function debounce(func, delay) {
        let debounceTimer;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), delay);
        };
    }

    // Function to handle the keyup event and make an AJAX call
    function handleKeyUp() {
        const value = $(this).val();
        const id = $(this).data('id');
        const feild = $(this).data('feild');

        if(feild=='answer'){
        // Make AJAX call
        $.ajax({
            url: '<?= base_url('admin/faqs/update') ?>', // Replace with your server endpoint
            method: 'POST',
            data: {
                id: id,
                answer: value,
                'feild':feild
            },
            success: function(response) {
                console.log('AJAX call successful', response);
            },
            error: function(error) {
                console.error('AJAX call failed', error);
            }
        });
    }
    if(feild=='question'){
        // Make AJAX call
        $.ajax({
            url: '<?= base_url('admin/faqs/update') ?>', // Replace with your server endpoint
            method: 'POST',
            data: {
                id: id,
                question: value,
                'feild':feild
            },
            success: function(response) {
                console.log('AJAX call successful', response);
            },
            error: function(error) {
                console.error('AJAX call failed', error);
            }
        });
    }

    if(feild=='review'){
        // Make AJAX call
        $.ajax({
            url: '<?= base_url('admin/reviews/update') ?>', // Replace with your server endpoint
            method: 'POST',
            data: {
                id: id,
                review: value,
                'feild':feild
            },
            success: function(response) {
                console.log('AJAX call successful', response);
            },
            error: function(error) {
                console.error('AJAX call failed', error);
            }
        });
    }

    if(feild=='name'){
        // Make AJAX call
        $.ajax({
            url: '<?= base_url('admin/reviews/update') ?>', // Replace with your server endpoint
            method: 'POST',
            data: {
                id: id,
                name: value,
                'feild':feild
            },
            success: function(response) {
                console.log('AJAX call successful', response);
            },
            error: function(error) {
                console.error('AJAX call failed', error);
            }
        });
    }

    }

    // Attach keyup event handler with debounce
    $(document).on('keyup', '.question', debounce(handleKeyUp, 500));

    // Attach keyup event handler with debounce
    $(document).on('keyup', '.answer', debounce(handleKeyUp, 500));

    $(document).on('keyup', '.review', debounce(handleKeyUp, 500));

    $(document).on('keyup', '.name', debounce(handleKeyUp, 500));


// blog category




         

            $('#blogcatform').validate({
        rules: {
            category_name: {
                required: true
            }
        },
        messages: {
            category_name: {
                required: "Enter category name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/blog/add_category') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        loadCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/blog/get_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a href="#">${category.cat_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#categories_list').html(html);
        }
    });
}


            loadCategories();

            $(document).on('click', '.edit-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new category name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/blog/update_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                        loadCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/blog/delete_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadCategories();
                    }
                });
            });

            /** Blog */

            $('#addblog').validate({
        rules: {
            blog_category: {
                required: true
            },
            blog_title: {
                required: true
            },
            blog_paragraph: {
                required: true
            } 
        },
        messages: {
            blog_category: {
                required: "Please select blog category"
            },
            blog_title: {
                required: "Please enter blog title"
            },
            blog_paragraph: {
                required: "Please enter blog paragraph"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/blog/added') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#addblog')[0].reset();
                        $("#blog_list_image_preview").hide();
                        $("#blog_page_image_preview").hide();
                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    
    $('#editblog').validate({
        rules: {
            blog_category: {
                required: true
            },
            blog_title: {
                required: true
            },
            blog_paragraph: {
                required: true
            } 
        },
        messages: {
            blog_category: {
                required: "Please select blog category"
            },
            blog_title: {
                required: "Please enter blog title"
            },
            blog_paragraph: {
                required: "Please enter blog paragraph"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/blog/update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#addblog')[0].reset();
                        $("#blog_list_image_preview").hide();
                        $("#blog_page_image_preview").hide();

                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    $('#blog_list_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#blog_list_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#blog_list_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#blog_list_image_preview').on('click', '#remove_blog_list_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#blog_list_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#blog_list_image_id").val("");
    });



    $('#blog_page_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#blog_page_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#blog_page_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#blog_page_image_preview').on('click', '#remove_blog_page_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#blog_page_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#blog_page_image_id").val("");
    });


    $(document).on('click', '.delete_blog', function() {
                if (!confirm('Are you sure you want to delete this blog?')) return;

                var blogId = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/blog/delete'); ?>',
                    method: 'POST',
                    data: { id: blogId },
                    success: function(response) {
                        location.reload();
                    }
                });
            });

    
    $('#blog_page_banner_image').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#blog_page_banner_image_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#blog_page_banner_image_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#blog_page_banner_image_preview').on('click', '#remove_blog_page_banner_image', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#blog_page_banner_image_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#blog_page_banner_image_id").val("");
    });


    $('#editblogpage').validate({
        rules: {
            blog_page_banner_sub_title: {
                required: true
            },
            blog_page_banner_main_title: {
                required: true
            }
        },
        messages: {
            blog_page_banner_sub_title: {
                required: "Please enter banner sub title"
            },
            blog_page_banner_main_title: {
                required: "Please enter banner main title"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/blog/page_update') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');

                        setTimeout(function() {
                        window.location.href = "";  
                    }, 2000);  
                                               
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });
    

    $('#adminloginform').validate({
        rules: {
        email_address: {
            required: true,
            email: true // Add the email validation rule
        },
        password: {
            required: true
        }
    },
    messages: {
        email_address: {
            required: "Please enter your email address",
            email: "Please enter a valid email address" // Custom message for invalid email
        },
        password: {
            required: "Please enter your password"
        }
    },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/loginprocess') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        // window.location.href = "<?= base_url('admin/profile') ?>";
                        setTimeout(function() {
                        window.location.href = "<?= base_url('admin/profile') ?>";  
                    }, 2000);  
                                               
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });

    $('#profle_photo').on('change', function() {
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        
        $.ajax({
            url: '<?= base_url('admin/about/uploadImage') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    // Show and set background image for banner preview
                    $('#profile_photo_preview').show().css('background-image', 'url(' + res.file_url + ')');
                    // Set banner image ID in hidden input
                    $("#profle_photo_id").val(res.media_id);
                } else {
                    alert(res.message);
                }
            }
        });
    });


    $('#profile_photo_preview').on('click', '#remove_profile_photo', function(e) {
        e.preventDefault();
        // Clear background image and hide banner image preview
        $('#profile_photo_preview').css('background-image', 'url()').hide();
        // Clear banner image ID from hidden input
        $("#profle_photo_id").val("");
    });

    $('#profileform').validate({
        rules: {
            email_address: {
            required: true,
            email: true // Add the email validation rule
        },
        first_name: {
                required: true
        },
        last_name: {
                required: true
        },
           phone_number: {
                  required: true,
            digits: true, // Ensures only numbers are entered
            minlength: 10, // Ensures the minimum length is 10 digits
            maxlength: 10 // Ensures the maximum length is 10 digits
        },
        social_security_number: {
                  required: true,
            digits: true, // Ensures only numbers are entered
            minlength: 10, // Ensures the minimum length is 10 digits
            maxlength: 10 // Ensures the maximum length is 10 digits
        },
          pincode: {
            required: true,
            digits: true, // Ensures only numbers are entered
            minlength: 5, // Ensures the minimum length is 10 digits
            maxlength: 5 // Ensures the maximum length is 10 digits
        },
        country: {
                required: true
        },
        state: {
                required: true
        },
        city: {
                required: true
        },
        registration_number: {
                required: true
        },
        company_name: {
                required: true
        },
       
        change_password: {
            required: false,
            minlength: 6
        },
        confirm_password: {
            required: false,
            minlength: 6,
            equalTo: "#change_password" // Matches confirm_password with password
        }
    },
    messages: {
        email_address: {
            required: "Please enter your email address",
            email: "Please enter a valid email address" // Custom message for invalid email
        },
        first_name: {
            required: "Please enter first name"
        },
        last_name: {
            required: "Please enter last name"
        },
        phone_number: {
            required: "Please enter phone number"
        },
        social_security_number: {
            required: "Please enter social security number"
        },
        country: {
            required: "Select country"
        },
        state: {
            required: "Please enter state"
        },
        city: {
            required: "Please enter city"
        },
        change_password: {
            minlength: "Password must be at least 6 characters long"
        },
        confirm_password: {
            equalTo: "Password and confirm password must match",
            minlength: "Confirm password must be at least 6 characters long"
        }
    },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/profileprocess') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                       
                        setTimeout(function() {
                        window.location.href = "<?= base_url('admin/profile') ?>";  
                    }, 2000);  
                                               
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


/*** Brand  ***/

    $('#brand_form').validate({
        rules: {
            brand_name: {
                required: true
            }
        },
        messages: {
            brand_name: {
                required: "Enter brand name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/brand_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#brand_form')[0].reset();
                        loadbrandCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    /*** Sell your car profile update  ***/

    $('#sellyourcar_profileform').validate({
        rules: {
            vendor: {
                required: true
            }
        },
        messages: {
            vendor: {
                required: "Please Select vendor"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            console.log($(form).serialize());
            $.ajax({
                url: '<?= base_url('admin/car/sellyourcar_profileupdate') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        setTimeout(function() {
                        window.location.href = "<?= base_url('admin/car/sellyourcarlist') ?>";  
                    }, 2000);
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });

    function loadbrandCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_brand_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_brand=${category.brand_slug}">${category.brand_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-brand-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-brand-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#brand_categories_list').html(html);
        }
    });
}


loadbrandCategories();

            $(document).on('click', '.edit-brand-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new brand name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_brand_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadbrandCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-brand-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_brand_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadbrandCategories();
                    }
                });
            });



/*** Fuel  ***/

    $('#fuel_form').validate({
        rules: {
            brand_name: {
                required: true
            }
        },
        messages: {
            brand_name: {
                required: "Enter fuel name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/fuel_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#fuel_form')[0].reset();
                        loadfuelCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadfuelCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_fuel_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_fuel=${category.fuel_slug}">${category.fuel_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-fuel-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-fuel-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#fuel_categories_list').html(html);
        }
    });
}


loadfuelCategories();

            $(document).on('click', '.edit-fuel-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new fuel name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_fuel_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadfuelCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-fuel-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_fuel_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadfuelCategories();
                    }
                });
            });            


            
/*** Fuel  ***/

    $('#year_form').validate({
        rules: {
            year_name: {
                required: true
            }
        },
        messages: {
            year_name: {
                required: "Enter year name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/model_year_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#year_form')[0].reset();
                        loadmodel_yearCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadmodel_yearCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_model_year_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_year=${category.year_slug}">${category.year_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-model_year-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-model_year-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#year_categories_list').html(html);
        }
    });
}


loadmodel_yearCategories();

            $(document).on('click', '.edit-model_year-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new year name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_model_year_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadmodel_yearCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-model_year-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_model_year_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadmodel_yearCategories();
                    }
                });
            });            


   
            
/*** buy method  ***/

$('#buy_method_form').validate({
        rules: {
            buy_method_name: {
                required: true
            }
        },
        messages: {
            buy_method_name: {
                required: "Enter buy method name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/buy_method_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#buy_method_form')[0].reset();
                        loadbuy_methodCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadbuy_methodCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_buy_method_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_buy_method=${category.buy_method_slug}">${category.buy_method_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-buy_method-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-buy_method-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#buy_method_categories_list').html(html);
        }
    });
}


loadbuy_methodCategories();

            $(document).on('click', '.edit-buy_method-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new buy method name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_buy_method_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadbuy_methodCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-buy_method-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_buy_method_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadbuy_methodCategories();
                    }
                });
            });         
            
            
             
/*** body method  ***/

$('#body_form').validate({
        rules: {
            buy_method_name: {
                required: true
            }
        },
        messages: {
            buy_method_name: {
                required: "Enter body name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/body_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#body_form')[0].reset();
                        loadbodyCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadbodyCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_body_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_body=${category.body_slug}">${category.body_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-body-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-body-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#body_categories_list').html(html);
        }
    });
}


loadbodyCategories();

            $(document).on('click', '.edit-body-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new body name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_body_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadbodyCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-body-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_body_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadbodyCategories();
                    }
                });
            });      


 
/*** Engine method  ***/

$('#engine_form').validate({
        rules: {
            buy_method_name: {
                required: true
            }
        },
        messages: {
            buy_method_name: {
                required: "Enter engine name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/engine_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#engine_form')[0].reset();
                        loadengineCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadengineCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_engine_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_engine=${category.engine_slug}">${category.engine_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-engine-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-engine-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#engine_categories_list').html(html);
        }
    });
}


loadengineCategories();

            $(document).on('click', '.edit-engine-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new engine name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_engine_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadengineCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-engine-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_engine_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadengineCategories();
                    }
                });
            });              


  /*** equipment  ***/

$('#equipment_form').validate({
        rules: {
            equipment_name: {
                required: true
            }
        },
        messages: {
            equipment_name: {
                required: "Enter equipment name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/equipment_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#equipment_form')[0].reset();
                        loadequipmentCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadequipmentCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_equipment_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a  href="javascript:;">${category.equipment_name}</a></td>
                    
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-equipment-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-equipment-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#equipment_categories_list').html(html);
        }
    });
}


loadequipmentCategories();

            $(document).on('click', '.edit-equipment-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new equipment name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_equipment_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadequipmentCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-equipment-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_equipment_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadequipmentCategories();
                    }
                });
            });                        



           /*** equipment  ***/

$('#model_form').validate({
        rules: {
            model_name: {
                required: true
            }
        },
        messages: {
            model_name: {
                required: "Enter model name"
            }
        },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('admin/car/model_add') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                        $('#model_form')[0].reset();
                        loadmodelCategories();
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });


    function loadmodelCategories() {
    $.ajax({
        url: '<?php echo base_url('admin/car/get_model_categories'); ?>',
        method: 'GET',
        success: function(response) {
            var categories = JSON.parse(response);
            var html = '';
            categories.forEach(function(category, index) {
                var rowClass = index % 2 === 0 ? ' ' : 'bhg15';
                html += `
                    <tr class="category-item " data-id="${category.id}">
                        <td class="head15700 ${rowClass}" ><a target="blank" href="<?php echo base_url('search'); ?>?cat_model=${category.model_slug}">${category.model_name}</a></td>
                    <td class="head15700 ${rowClass}" ><a  href="javascript:;">${category.brand_name}</a></td>
                        <td class="head15700 ter156478 ${rowClass}">
                            <a href="javascript:void(0);" class="view_new edit-model-category" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="red_bt_new delete-model-category" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `;
            });
            $('#model_categories_list').html(html);
        }
    });
}


loadmodelCategories();

            $(document).on('click', '.edit-model-category', function() {
                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                var category_name = prompt('Enter new model name:');
                if (category_name) {
                    $.ajax({
                        url: '<?php echo base_url('admin/car/update_model_category'); ?>',
                        method: 'POST',
                        data: { id: id, category_name: category_name },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                loadmodelCategories();
                    } else {
                        alert(res.message); // Show error message
                    }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-model-category', function() {
                if (!confirm('Are you sure you want to delete this category?')) return;

                var category_item = $(this).closest('.category-item');
                var id = category_item.data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete_model_category'); ?>',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        loadmodelCategories();
                    }
                });
            });                        
   
            /** post car **/



            $(document).on('click', '.delete_car', function() {
                if (!confirm('Are you sure you want to delete this post?')) return;

                var blogId = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/car/delete'); ?>',
                    method: 'POST',
                    data: { id: blogId },
                    success: function(response) {
                        location.reload();



                    }
                });
            });


            $(document).on('click', '.delete_user', function() {
                if (!confirm('Are you sure you want to delete this post?')) return;

                var userid = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/user/delete'); ?>',
                    method: 'POST',
                    data: { id: userid },
                    success: function(response) {
                        location.reload();

                        
                    }
                });
            });


            
            $(document).on('click', '.add_price', function() {

                var car_id = $(this).data('car_id');

            market_price = $("#market_price_id_"+car_id).val();

         

            if(market_price==""){

                $("#market_price_id_"+car_id).addClass('error');

            }else{

                $("#market_price_id_"+car_id).removeClass('error');

              $.ajax({
                    url: '<?php echo base_url('admin/market_price/added'); ?>',
                    method: 'POST',
                    data: { car_id: car_id,market_price:market_price },
                    success: function(response) {
                        location.reload();

                    }
                });

            }


              

            });

            $(document).on('click', '.winner', function() {
     
             

        var carId = $(this).val(); // Get the car ID
        var winid = $(this).data('winid'); // Get the user ID from data attribute
        
        $.ajax({
            url: '<?php echo base_url('car/bid/winner'); ?>',
            method: 'POST',
            data: { carId: carId,winid: winid },
            success: function(response) {
                var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                    
                        
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                        

                    }

                        // Hide message after 5 seconds
                        setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                            location.reload();
                        });
                    }, 5000);
                
           
            }
           });

});


    $('#forgetform').validate({
        rules: {
            email: {
            required: true,
            email: true // Add the email validation rule
        }
    },
    messages: {
        email_address: {
            required: "Please enter your email address",
            email: "Please enter a valid email address" // Custom message for invalid email
        }
    },
        submitHandler: function(form) {
            // Handle form submission via AJAX
            $.ajax({
                url: '<?= base_url('forget') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    var res = JSON.parse(response);
                    // Show success or error message
                    if (res.status == 'success') {
                        $(".message").html('<span style="color:green;">' + res.message + '</span>');
                              setTimeout(function() {
                        window.location.href = " ";  
                    }, 2000);  
                                               
                    } else {
                        $(".message").html('<span style="color:red;">' + res.message + '</span>');
                    }
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                },
                error: function() {
                    $(".message").html('<span style="color:red;">An error occurred. Please try again later.</span>');
                    // Hide message after 5 seconds
                    setTimeout(function() {
                        $(".message span").fadeOut(500, function() {
                            $(this).remove();
                        });
                    }, 5000);
                }
            });
            return false; // Prevent default form submission
        }
    });

     
            
});
</script>


<script>
         $(document).ready(function() {
        function startCountdown(expirationTimestamp, countdownId) {
            function updateCountdown() {
                var now = new Date().getTime();
                var distance = expirationTimestamp - now;

                if (distance < 0) {
                    $('#' + countdownId).text("Expired");
                    clearInterval(interval);
                    return;
                }

                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $('#' + countdownId).text(hours + "H " + minutes + "M " + seconds + "S ");
            }

            var interval = setInterval(updateCountdown, 1000);
        }

        <?php
        if(!empty($cars)){
        foreach ($cars as $car): ?>
            <?php if (get_post_status($car->id) == 'timer'): ?>
                var expirationTimestamp_<?php echo $car->id; ?> = <?php echo get_post_expiration_timestamp($car->id); ?>;
                var countdownId_<?php echo $car->id; ?> = 'countdown_<?php echo $car->id; ?>';
                startCountdown(expirationTimestamp_<?php echo $car->id; ?>, countdownId_<?php echo $car->id; ?>);
            <?php endif; ?>
        <?php endforeach; } ?>
        
        
        
           $('#togglePassword3').click(function() {
        var input = $('#adminloginform #password');
          var togglePassword2 = $('#togglePassword3');
        var button = $(this);

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            // button.text('Hide');
        } else {
            input.attr('type', 'password');
            // button.text('Show');
        }

        // Toggle a class on the input field
        togglePassword2.toggleClass('bi-eye');
    });
    
    });
       
    </script>

</body>
</html>