(function($){"use strict";$(function(){$('.choose-payment-mathord ul li').on('click',function(){$('.choose-payment-mathord ul li').removeClass('active');if($(this).hasClass('stripe')){$('#StripePayment').show();$('#OfflinePayment').hide();$(this).addClass('active');}
else if($(this).hasClass('paypal')){$('#OfflinePayment').hide();$('#StripePayment').hide();$(this).addClass('active');}
else if($(this).hasClass('offline')){$('#OfflinePayment').show();$('#StripePayment').hide();$(this).addClass('active');}
else{$('#StripePayment').hide();$('#OfflinePayment').hide();}});});$(".header-cart-btn").on("click",function(e){e.stopPropagation();$(".cart-menu").toggleClass("active");});$(document).on("click",function(e){if(!$(e.target).closest(".cart-menu, .header-cart-btn").length){$(".cart-menu").removeClass("active");}});$('[data-fancybox]').fancybox({buttons:['close'],wheel:false,transitionEffect:"slide",loop:true,toolbar:false,clickContent:false});$('.select-wrap').on('click',function(){$(this).addClass('selected').siblings().removeClass('selected');})
jQuery(window).on('load',function(){$(".egns-preloader").delay(1600).fadeOut("slow");});$('.preloader-close-btn').on("click",function(){$('.egns-preloader').addClass('close');});$('.sidebar-btn2').on("click",function(){$('.header-sidebar').addClass('slide');});$('.close-btn').on("click",function(){$('.header-sidebar').removeClass('slide');});jQuery('.dropdown-icon').on('click',function(){jQuery(this).toggleClass('active').next('ul, .mega-menu').slideToggle();jQuery(this).parent().siblings().children('ul, .mega-menu').slideUp();jQuery(this).parent().siblings().children('.active').removeClass('active');});jQuery('.dropdown5').on('click',function(){jQuery(this).toggleClass('active').next('.checkbox-container ul').slideToggle();jQuery(this).parent().siblings().children('.checkbox-container ul').slideUp();jQuery(this).parent().siblings().children('.active').removeClass('active');});window.addEventListener('scroll',function(){const header=document.querySelector('.add_sty5');header.classList.toggle("sticky",window.scrollY>0);});$('.search-btn').on("click",function(){$('.search-bar').addClass('slide');});$('.close-btn').on("click",function(){$('.search-bar').removeClass('slide');});$('.cart-btn').on("click",function(){$('.cart-sidebar').addClass('slide');});$('.cart-close-btn').on("click",function(){$('.cart-sidebar').removeClass('slide');});$("#phoneNumber").on("click",function(){let phone=$(this).data('phone');$("#phoneNumber a").replaceWith(`<a href="tel:${phone}"><i class='bx bx-phone-call'></i> ${phone}</a>`);});$("#emailAdress").on("click",function(){let email=$(this).data('email');$("#emailAdress a").replaceWith(`<a href="mailto:${email}"><i class='bx bx-at'></i>${email}</a>`);});$("#emailAdresss").on("click",function(){let emails=$(this).data('emails');let whatsapp=$(this).data('whatsapp');$("#emailAdresss a").replaceWith(`<a href="${emails}"><i class='bx bxl-whatsapp'></i>${whatsapp}</a>`);});$('.counter').counterUp({delay:10,time:1000});$('.sidebar-button').click(function(){$(this).toggleClass('active');});jQuery(window).on('load',function(){$(".preloader").fadeOut("1000");});const currentLocation=location.href;const menuItem=document.querySelectorAll('ul li a');const menuLength=menuItem.length;for(let i=0;i<menuLength;i++){if(menuItem[i].href===currentLocation){menuItem[i].className="active";}}
$('.video-popup').magnificPopup({disableOn:700,type:'iframe',mainClass:'mfp-fade',removalDelay:160,preloader:false,fixedContentPos:false});$('select').niceSelect();jQuery(window).on('load',function(){new WOW().init();window.wow=new WOW({boxClass:'wow',animateClass:'animated',offset:0,mobile:true,live:true,offset:100})
window.wow.init();});const togglePassword=document.querySelector('#togglePassword');const password=document.querySelector('#password');if(togglePassword){togglePassword.addEventListener('click',function(e){const type=password.getAttribute('type')==='password'?'text':'password';password.setAttribute('type',type);this.classList.toggle('bi-eye');});}
const togglePassword2=document.getElementById('togglePassword2');const password2=document.querySelector('#password2');if(togglePassword2){togglePassword2.addEventListener('click',function(e){const type=password2.getAttribute('type')==='password'?'text':'password';password2.setAttribute('type',type);this.classList.toggle('bi-eye');});}
const togglePassword3=document.getElementById('togglePassword3');const password3=document.querySelector('#password3');if(togglePassword3){togglePassword3.addEventListener('click',function(e){const type=password3.getAttribute('type')==='password'?'text':'password';password3.setAttribute('type',type);this.classList.toggle('bi-eye');});}
$('#slick1').slick({rows:2,dots:false,arrows:true,infinite:true,autoplay:true,autoplaySpeed:2000,speed:2000,slidesToShow:6,slidesToScroll:2,responsive:[{breakpoint:1200,settings:{slidesToShow:5}},{breakpoint:991,settings:{arrows:false,slidesToShow:4}},{breakpoint:768,settings:{arrows:false,slidesToShow:3}},{breakpoint:576,settings:{arrows:false,slidesToShow:2}},{breakpoint:480,settings:{arrows:false,slidesToShow:2}},{breakpoint:350,settings:{arrows:false,slidesToShow:1}}]});$('#slick2').slick({rows:3,dots:false,arrows:true,infinite:true,autoplay:true,autoplaySpeed:2000,speed:2000,slidesToShow:3,slidesToScroll:2,responsive:[{breakpoint:1200,settings:{slidesToShow:2}},{breakpoint:991,settings:{arrows:false,slidesToShow:3}},{breakpoint:768,settings:{arrows:false,slidesToShow:3}},{breakpoint:576,settings:{arrows:false,slidesToShow:2}},{breakpoint:480,settings:{arrows:false,slidesToShow:2}},{breakpoint:350,settings:{arrows:false,slidesToShow:1}}]});$('#slick3').slick({rows:2,dots:false,arrows:true,infinite:true,autoplay:true,autoplaySpeed:2000,speed:2000,slidesToShow:2,slidesToScroll:2,responsive:[{breakpoint:1200,settings:{arrows:false,slidesToShow:2}},{breakpoint:991,settings:{arrows:false,slidesToShow:1}},{breakpoint:768,settings:{arrows:false,slidesToShow:1}},{breakpoint:576,settings:{arrows:false,slidesToShow:1}},{breakpoint:480,settings:{arrows:false,slidesToShow:1}},{breakpoint:350,settings:{arrows:false,slidesToShow:1}}]});const sliders=document.querySelectorAll('.product-img-slider');sliders.forEach((slider)=>{const nextBtn=slider.parentElement.querySelector('.product-stand-next');const prevBtn=slider.parentElement.querySelector('.product-stand-prev');const swiper=new Swiper(slider,{slidesPerView:1,speed:1500,spaceBetween:10,loop:true,autoplay:false,navigation:{nextEl:nextBtn,prevEl:prevBtn,},});nextBtn.addEventListener('click',()=>{swiper.slideNext();});prevBtn.addEventListener('click',()=>{swiper.slidePrev();});});var swiper=new Swiper(".most-search-slider",{slidesPerView:1,speed:1500,spaceBetween:25,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-1",prevEl:".prev-1",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:15,},1400:{slidesPerView:4},}});var swiper=new Swiper(".compare-car-slider",{slidesPerView:3,speed:1500,spaceBetween:25,loop:true,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-3",prevEl:".prev-3",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:24,},1400:{slidesPerView:3},}});var swiper=new Swiper(".upcoming-car-slider",{slidesPerView:4,speed:1500,spaceBetween:10,navigation:{nextEl:".next-2",prevEl:".prev-2",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:2,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:24,},1400:{slidesPerView:4},}});var swiper=new Swiper(".customer-feedback-slider",{slidesPerView:3,speed:1500,spaceBetween:25,loop:true,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-4",prevEl:".prev-4",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:2,spaceBetween:15,},1200:{slidesPerView:2,spaceBetween:24,},1400:{slidesPerView:2},}});var swiper=new Swiper(".customer-feedback-slider2",{slidesPerView:3,speed:1500,spaceBetween:25,loop:true,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-6",prevEl:".prev-6",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:2,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:24,},1400:{slidesPerView:3},}});var swiper=new Swiper(".news-slider",{slidesPerView:3,speed:1500,spaceBetween:25,loop:true,navigation:{nextEl:".next-4",prevEl:".prev-4",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:24,},1400:{slidesPerView:3},}});var swiper=new Swiper(".home2-featured-slider",{slidesPerView:1,speed:1500,spaceBetween:25,slidesPerView:1,centerSlides:true,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-1",prevEl:".prev-1",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:15,},1400:{slidesPerView:4},}});var swiper=new Swiper(".recent-launch-car-slider",{slidesPerView:1,speed:1500,spaceBetween:25,slidesPerView:1,centerSlides:true,loop:true,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-5",prevEl:".prev-5",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:15,},1400:{slidesPerView:4},}});var swiper=new Swiper(".home2-compare-slider",{slidesPerView:1,speed:1500,spaceBetween:10,loop:true,centeredSlides:true,roundLengths:true,parallax:true,effect:'fade',navigation:false,fadeEffect:{crossFade:true,},autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-7",prevEl:".prev-7",},});var swiper=new Swiper(".home3-banner-slider",{slidesPerView:1,speed:1500,spaceBetween:25,slidesPerView:1,centerSlides:true,loop:true,effect:'fade',autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-4",prevEl:".prev-4",},pagination:{el:".paginations111",clickable:true,},});var swiper=new Swiper(".brand-category-slider",{slidesPerView:1,speed:1500,spaceBetween:25,slidesPerView:1,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-5",prevEl:".prev-5",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:15,},1400:{slidesPerView:4},}});var swiper=new Swiper(".home3-featured-car-slider",{slidesPerView:1,speed:1500,spaceBetween:30,slidesPerView:1,centerSlides:true,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-8",prevEl:".prev-8",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:15,},1400:{slidesPerView:4},}});var swiper=new Swiper(".testimonial-slider3",{slidesPerView:1,speed:1500,spaceBetween:30,slidesPerView:1,centerSlides:true,loop:true,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-10",prevEl:".prev-10",},});var swiper=new Swiper(".categoty-filter-slider",{slidesPerView:3,speed:1500,spaceBetween:15,centerSlides:true,loop:false,navigation:{nextEl:".next-10",prevEl:".prev-10",},});var swiper=new Swiper(".home4-latest-car-slider",{speed:1500,spaceBetween:25,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-11",prevEl:".prev-11",},pagination:{el:".pagination11",clickable:"true",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:15,},1400:{slidesPerView:3},}});var swiper=new Swiper(".home4-featured-car-slider",{speed:1500,spaceBetween:25,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-12",prevEl:".prev-12",},pagination:{el:".pagination12",clickable:"true",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:15,},1400:{slidesPerView:3},}});var swiper=new Swiper(".customer-feedback-slider4",{slidesPerView:3,speed:1500,spaceBetween:25,loop:true,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-6",prevEl:".prev-6",},pagination:{el:".pagination8",clickable:"true",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:1,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:2,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:24,},1400:{slidesPerView:3},}});var swiper=new Swiper(".home5-fetured-slider",{speed:1500,spaceBetween:25,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-51",prevEl:".prev-51",},pagination:{el:".pagination8",clickable:"true",},breakpoints:{280:{slidesPerView:1,},386:{slidesPerView:1,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:4,spaceBetween:24,},1400:{slidesPerView:4},}});var swiper=new Swiper(".home5-brand-category-slider",{speed:1500,spaceBetween:25,autoplay:{delay:3000,disableOnInteraction:false,},navigation:{nextEl:".next-52",prevEl:".prev-52",},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:2,spaceBetween:15,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:4,spaceBetween:15,},1200:{slidesPerView:5,spaceBetween:24,},1400:{slidesPerView:6},}});var swiper=new Swiper(".home6-brand-category-slider",{speed:1500,spaceBetween:25,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-1",prevEl:".prev-1",},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:2,spaceBetween:15,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,spaceBetween:15,},992:{slidesPerView:4,spaceBetween:15,},1200:{slidesPerView:5,spaceBetween:24,},1400:{slidesPerView:6},}});var swiper=new Swiper(".home6-top-use-car-slider",{speed:1500,spaceBetween:25,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-2",prevEl:".prev-2",},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:1,spaceBetween:15,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:2,spaceBetween:15,},992:{slidesPerView:3,spaceBetween:15,},1200:{slidesPerView:3,spaceBetween:24,},1400:{slidesPerView:3},}});var swiper=new Swiper(".car-color-slider",{speed:1500,spaceBetween:40,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-2",prevEl:".prev-2",},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:1,spaceBetween:15,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:3,},992:{slidesPerView:2,},1200:{slidesPerView:4,},1400:{slidesPerView:4},}});var swiper=new Swiper(".product-details-slider",{speed:1500,spaceBetween:24,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-2",prevEl:".prev-2",},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:1,spaceBetween:10,},576:{slidesPerView:2,spaceBetween:10,},768:{slidesPerView:2,},992:{slidesPerView:3,},1200:{slidesPerView:4,},1400:{slidesPerView:4},}});var swiper=new Swiper(".product-details-slider2",{speed:1500,spaceBetween:24,autoplay:{delay:2000,disableOnInteraction:false,},navigation:{nextEl:".next-2",prevEl:".prev-2",},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:1,spaceBetween:15,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:2,},992:{slidesPerView:3,},1200:{slidesPerView:4,},1400:{slidesPerView:4},}});var swiper=new Swiper(".recent-post-sidebar-slider",{speed:1500,spaceBetween:24,autoplay:{delay:2500,disableOnInteraction:false,},navigation:{nextEl:".next-51",prevEl:".prev-51",},});const sliders2=document.querySelectorAll('.category-pages-slider');sliders2.forEach((slider)=>{const nextBtn=slider.parentElement.querySelector('.next-100');const prevBtn=slider.parentElement.querySelector('.prev-100');const swiper=new Swiper(slider,{speed:1500,spaceBetween:24,navigation:{nextEl:nextBtn,prevEl:prevBtn,},breakpoints:{280:{slidesPerView:1,},420:{slidesPerView:1,spaceBetween:15,},576:{slidesPerView:2,spaceBetween:15,},768:{slidesPerView:2,},992:{slidesPerView:3,},1200:{slidesPerView:3,},1400:{slidesPerView:3},}});nextBtn.addEventListener('click',()=>{swiper.slideNext();});prevBtn.addEventListener('click',()=>{swiper.slidePrev();});});$('.shop-big-img ul li:first-child').addClass('active');$('.shop-big-img').mouseenter(function(){$('.shop-big-img ul li:not(:first-child)').removeClass('active');});$('.shop-big-img').mouseleave(function(){$('.shop-big-img ul li:not(:first-child)').removeClass('active');$('.shop-big-img ul li:first-child').addClass('active');});$('.shop-big-img ul li').hover(function(){$(this).addClass('active').siblings().removeClass('active');});$('.quantity__minus').click(function(e){e.preventDefault();var input=$(this).siblings('.quantity__input');var value=parseInt(input.val());if(value>1){value--;}
input.val(value.toString().padStart(2,'0'));});$('.quantity__plus').click(function(e){e.preventDefault();var input=$(this).siblings('.quantity__input');var value=parseInt(input.val());value++;input.val(value.toString().padStart(2,'0'));});document.querySelector('.sidebar-button').addEventListener('click',()=>document.querySelector('.main-menu, .sidebar-menu').classList.toggle('show-menu'));$('.menu-close-btn').on("click",function(){$('.sidebar-menu').removeClass('show-menu');});$("#eg-range-slider").slider({range:true,min:0,max:3000,values:[200,2000],slide:function(event,ui){$(".from").val(ui.values[0]);$(".to").val(ui.values[1]);}});$(".from").change(function(){var value=$(this).val();console.log(typeof(value));$("#eg-range-slider").slider("values",0,value);});$(".to").change(function(){var value=$(this).val();console.log(typeof(value));$("#eg-range-slider").slider("values",1,value);});$("[data-countdown]").each(function(){var $deadline=new Date($(this).data("countdown")).getTime();var $dataDays=$(this).children("[data-days]");var $dataHours=$(this).children("[data-hours]");var $dataMinutes=$(this).children("[data-minutes]");var $dataSeconds=$(this).children("[data-seconds]");var x=setInterval(function(){var now=new Date().getTime();var t=$deadline-now;var days=Math.floor(t/(1000*60*60*24));var hours=Math.floor((t%(1000*60*60*24))/(1000*60*60));var minutes=Math.floor((t%(1000*60*60))/(1000*60));var seconds=Math.floor((t%(1000*60))/1000);$dataDays.html(`${days} <span>D</span>`);$dataHours.html(`${hours} <span>H</span>`);$dataMinutes.html(`${minutes} <span>M</span>`);$dataSeconds.html(`${seconds} <span>S</span>`);if(t<=0){clearInterval(x);$dataDays.html("00 <span>D</span>");$dataHours.html("00 <span>H</span>");$dataMinutes.html("00 <span>M</span>");$dataSeconds.html("00 <span>S</span>");}},1000);});}(jQuery));


function switchMobileLayout(columns) {
    const grid = document.getElementById('cars-grid-container');
    const btn1 = document.getElementById('layout-btn-1');
    const btn2 = document.getElementById('layout-btn-2');
    
    if (!grid) {
        console.error('Grid container not found');
        return;
    }
    
    if (columns === 1) {
        grid.classList.remove('mobile-layout-2');
        grid.classList.add('mobile-layout-1');
        btn1.classList.add('active');
        btn2.classList.remove('active');
        // Save preference
        try {
            localStorage.setItem('mobileLayout', '1');
        } catch(e) {}
    } else {
        grid.classList.remove('mobile-layout-1');
        grid.classList.add('mobile-layout-2');
        btn1.classList.remove('active');
        btn2.classList.add('active');
        // Save preference
        try {
            localStorage.setItem('mobileLayout', '2');
        } catch(e) {}
    }
}

// Restore saved layout on page load
(function() {
    if (window.innerWidth <= 768) {
        try {
            const savedLayout = localStorage.getItem('mobileLayout');
            if (savedLayout === '2') {
                // Wait for DOM to be ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', function() {
                        switchMobileLayout(2);
                    });
                } else {
                    switchMobileLayout(2);
                }
            }
        } catch(e) {}
    }
})();


// ahmad muslim changes
// Hyper-fast inline execution - lightning bolt speed
(function() {
    const p = document.getElementsByClassName('product-content');
    
    for (let i = 0; i < p.length; i++) {
        const wraps = p[i].getElementsByClassName('price_wrap15');
        const fin = p[i].getElementsByClassName('price_wrap17')[0];
        let leadBid = 0, fixPrice = 0, fixElem = null;
        
        for (let j = 0; j < wraps.length; j++) {
            const txt = wraps[j].getElementsByClassName('fix_st1')[0];
            const val = wraps[j].getElementsByClassName('fix_st2')[0];
            
            if (txt && val) {
                const t = txt.textContent.toLowerCase();
                const v = parseInt(val.textContent.replace(/\D/g, ''));
                
                if (t.includes('ledande bud')) {
                    leadBid = v;
                } else if (t.includes('fast pris')) {
                    fixPrice = v;
                    fixElem = wraps[j];
                }
            }
        }
        
        // Hide fast pris and financing if bid >= 90% of fixed price
        if (leadBid && fixPrice && leadBid >= fixPrice * 0.9) {
            if (fixElem) fixElem.style.display = 'none';
        }
    }
})();

// Ultra-fast inline execution - no DOM wait
(function() {
    const products = document.getElementsByClassName('product-content');
    
    for (let i = 0; i < products.length; i++) {
        const fixed = products[i].getElementsByClassName('fix_st2')[0];
        const orig = products[i].getElementsByClassName('price_wrap16')[0];
        
        if (fixed && orig) {
            const f = parseInt(fixed.textContent.replace(/\D/g, ''));
            const o = parseInt(orig.textContent.replace(/\D/g, ''));
            
            if (f < o) fixed.style.color = '#ff0000';
        }
    }
})();


pureScriptSelect = (selector) => {
    let selectors = document.querySelectorAll(selector);
    
    function eventDelegation(event, psSelector, program) {
        document.body.addEventListener(event, function(e) {
            document.querySelectorAll(psSelector).forEach(elem => {
                if (e.target === elem) {
                    program(e);
                }
            })
        });
    }
    let defaultValues = {
        [document.querySelector(selector).getAttribute('id')]: eval(document.querySelector(selector).getAttribute('data-multiSelect'))
    };
    let isMax = {
        [document.querySelector(selector).getAttribute('id')]: eval(document.querySelector(selector).getAttribute('data-max'))
    };
  
    selectors.forEach((item, index) => {
        const multiSelect = item.getAttribute('data-multiSelect');
        const isSearch = item.getAttribute('data-isSearch');
        
        function singleSelect(){
            let virtualSelect = document.createElement('div');
            virtualSelect.classList.add('directorist-select__container');
            item.append(virtualSelect);
            item.style.position = 'relative';
            item.style.zIndex = '2';
            let select = item.querySelectorAll('select'),
            sibling = item.querySelector('.directorist-select__container'),
            option = ''           ;
            select.forEach((sel) =>{
                option = sel.querySelectorAll('option');
            });
            let html = `
            <div class="directorist-select__label">
                <div class="directorist-select__label--text">${option[0].text}</div>
                <span class="directorist-select__label--icon"><img src="assets/svg/angle-down-solid.svg" alt=""></span>
            </div>
            <div class="directorist-select__dropdown">
                <input class='directorist-select__search ${ isSearch ? 'directorist-select__search--show' : 'directorist-select__search--hide' }' type='text' class='value' placeholder='' />
                <div class="directorist-select__dropdown--inner"></div>
            </div>`;
            sibling.innerHTML = html;
            let arry = [],
            arryEl = [],
            selectTrigger = sibling.querySelector('.directorist-select__label');

            option.forEach((el, index) => {
                arry.push(el.value);
                arryEl.push(el);
                el.style.display = 'none';
                if(el.hasAttribute('selected')){
                    selectTrigger.innerHTML = el.value +'<img src="assets/svg/angle-down-solid.svg" alt="">';
                };
            });

            var input = item.querySelector('.directorist-select__dropdown input');
            document.body.addEventListener('click', (event) => {
                if(event.target == selectTrigger || event.target == input)
                return;
                sibling.querySelector('.directorist-select__dropdown').classList.remove('directorist-select__dropdown-open');
                input.value = '';
            });

            selectTrigger.addEventListener('click', (e) => {
                e.preventDefault();
                sibling.querySelector('.directorist-select__dropdown').classList.toggle('directorist-select__dropdown-open');
                var filter = arry.filter((el, index) => {
                    return el;
                });
                var elem = [];
                arryEl.forEach((el, index) => {
                    filter.forEach(e => {
                        if(el.text.toLowerCase() == e){
                            elem.push(el);
                            el.style.display = 'block';
                        }
                    });
                });
                var item2 = '<ul>';
                elem.forEach((el, key) => {
                    let attribute = '';
                    let attribute2 = '';
                    if(el.hasAttribute('img')){
                        attribute = el.getAttribute('img');
                    }

                    if(el.hasAttribute('icon')) {
                        attribute2 = el.getAttribute('icon');
                    }
                    item2 += `<li><span class="directorist-select-dropdown-text">${el.text}</span> <span class="directorist-select-dropdown-item-icon"><img src="${attribute}" style="${attribute == null && {display: 'none'} } " /><b class="${attribute2}"></b></b></span></li>`;
                });
                item2 += '</ul>';
                var popUp = item.querySelector('.directorist-select__dropdown--inner');
                popUp.innerHTML = item2;
                var li = item.querySelectorAll('li');
                li.forEach((el, index) => {
                    el.addEventListener('click', (event) => {
                        elem[index].setAttribute('selected', 'selected');
                        sibling.querySelector('.directorist-select__dropdown').classList.remove('directorist-select__dropdown-open');
                        item.querySelector('.directorist-select__label').innerHTML = el.querySelector('.directorist-select-dropdown-text').textContent +'<img src="assets/svg/angle-down-solid.svg" alt="">';
                    });
                });
            });

            var value = item.querySelector('input');

            value && value.addEventListener('keyup', (event) => {                
                var itemValue = event.target.value.toLowerCase();
                var filter = arry.filter((el, index) => {
                        return el.startsWith(itemValue);
                    });
                var elem = [];
                arryEl.forEach((el, index) => {
                    filter.forEach(e => {
                        if(el.text.toLowerCase() == e){
                            elem.push(el);
                            el.style.display = 'block';
                        }
                    });
                });
                var item2 = '<ul>';
                elem.forEach((el, key) => {
                    var attribute = '';
                    var attribute2 = '';
                    if(el.hasAttribute('img')){
                        attribute = el.getAttribute('img');
                    }

                    if(el.hasAttribute('icon')) {
                        attribute2 = el.getAttribute('icon');
                    }
                    item2 += `<li><span class="directorist-select-dropdown-text">${el.text}</span><span class="directorist-select-dropdown-item-icon"><img src="${attribute}" style="${attribute == null && {display: 'none'} } " /><b class="${attribute2}"></b></b></span></li>`;
                });
                item2 += '</ul>';
                var popUp = item.querySelector('.directorist-select__dropdown--inner');
                popUp.innerHTML = item2;
                var li = item.querySelectorAll('li');
                li.forEach((el, index) => {
                    el.addEventListener('click', (event) => {
                        elem[index].setAttribute('selected', 'selected');
                        sibling.querySelector('.directorist-select__dropdown').classList.remove('directorist-select__dropdown-open');
                        item.querySelector('.directorist-select__label').innerHTML = el.querySelector('.directorist-select-dropdown-text').textContent +'<img src="assets/svg/angle-down-solid.svg" alt="">';
                    });
                });
            });
        }
        function multiSelects(){
            const arraySelector = item.getAttribute('id');
            
            
            let virtualSelect = document.createElement('div');
            virtualSelect.classList.add('directorist-select__container');
            item.append(virtualSelect);
            item.style.position = 'relative';
            item.style.zIndex = '0';        
            let select = item.querySelectorAll('select'),
            sibling = item.querySelector('.directorist-select__container'),
            option = '';
            select.forEach((sel) =>{
                option = sel.querySelectorAll('option');
            });        
            let html = `
            <div class="directorist-select__label">
                <div class="directorist-select__selected-list"></div>
                <input class='directorist-select__search ${ isSearch ? 'directorist-select__search--show' : 'directorist-select__search--hide' }' type='text' class='value' placeholder='' />
            </div>
            <div class="directorist-select__dropdown">            
                <div class="directorist-select__dropdown--inner"></div>
            </div>
            <span class="directorist-error__msg"></span>`;

            function insertSearchItem () {
                item.querySelector('.directorist-select__selected-list').innerHTML = defaultValues[arraySelector].map(item => `<span class="directorist-select__selected-list--item">${item.value}&nbsp;&nbsp;<a href="#" data-key="${item.key}" class="directorist-item-remove"><i class="fa fa-times"></i></a></span>`).join("")
            }
            sibling.innerHTML = html;
            let arry = [],
            arryEl = [],
            button = sibling.querySelector('.directorist-select__label');
            el1 = '';
            insertSearchItem();
            option.forEach((el, index) => {
                arry.push(el.value);
                arryEl.push(el);
                el.style.display = 'none';            
                if(el.hasAttribute('selected')){
                    button.innerHTML = el.value +'<span class="angel">&raquo;</span>';
                };            
            });
            option[0].setAttribute('selected', 'selected');
            option[0].value = JSON.stringify(defaultValues[arraySelector]);
                        
            document.body.addEventListener('click', (event) => {                        
                if(event.target == button || event.target.closest('.directorist-select__container')){
                    return;
                } else {
                    sibling.querySelector('.directorist-select__dropdown').classList.remove('directorist-select__dropdown-open');
                }                
            });
            
            button.addEventListener('click', (e) => {
                
                e.preventDefault();
                var value = item.querySelector('input');  
                value.focus();                
                document.querySelectorAll('.directorist-select__dropdown').forEach(el => el.classList.remove('directorist-select__dropdown-open'));
                e.target.closest('.directorist-select__container').querySelector('.directorist-select__dropdown').classList.add('directorist-select__dropdown-open');
                
                var elem = [];
                arryEl.forEach((el, index) => {
                    arry.forEach(e => {
                        if(el.text.toLowerCase() == e){                            
                            elem.push(el);
                            el.style.display = 'block';                
                        } 
                    });     
                });
                var popUp = item.querySelector('.directorist-select__dropdown--inner');
                
                var item2 = '<ul>';
                elem.forEach((el, key) => {                    
                    var attribute = '';
                    var attribute2 = '';
                    if(el.hasAttribute('img')){
                        attribute = el.getAttribute('img');
                    }

                    if(el.hasAttribute('icon')) {
                        attribute2 = el.getAttribute('icon');
                    }
                    
                    item2 += `<li data-key="${key}" class="directorist-select-item-hide">${el.text}<i class="item"><img src="${attribute}" style="${attribute == null && {display: 'none'} } " /><b class="${attribute2}"></b></b></i></li>`;
                });
                item2 += '</ul>';
                
                popUp.innerHTML = item2;
                var li = item.querySelectorAll('li');
                
                defaultValues[arraySelector].map((item, key) => {
                    li[item.key].classList.remove('directorist-select-item-hide')
                    return li[item.key].classList.add('directorist-select-item-show')
                });

                               
                value && value.addEventListener('keyup', (event) => {                    
                    var itemValue = event.target.value.toLowerCase();
                    var filter = arry.filter((el, index) => {
                            return el.startsWith(itemValue);
                        });   
                        
                    var elem = [];
                    arryEl.forEach((el, index) => {
                        filter.forEach(e => {
                            if(el.text.toLowerCase() == e){
                                elem.push({el, index});
                                el.style.display = 'block';                
                            } 
                        });    
                    });
                    var item2 = '<ul>';                
                    elem.forEach(({el, index}, key) => {
                        var attribute = '';
                        var attribute2 = '';
                        if(el.hasAttribute('img')){
                            attribute = el.getAttribute('img');
                        }

                        if(el.hasAttribute('icon')) {
                            attribute2 = el.getAttribute('icon');
                        }                        
                        item2 += `<li data-key="${index - 1}" class="directorist-select-item-hide">${el.text}<i class="item"><img src="${attribute}" style="${attribute == null && {display: 'none'} } " /><b class="${attribute2}"></b></b></i></li>`;
                    });
                    item2 += '</ul>';
                    
                    var popUp = item.querySelector('.directorist-select__dropdown--inner');
                    popUp.innerHTML = item2;
                    var li = item.querySelectorAll('li');
                    li.forEach((element, index) => {
                        defaultValues[arraySelector].map(item => {
                            if(item.key == element.getAttribute('data-key')){
                                element.classList.remove('directorist-select-item-hide');
                                element.classList.add('directorist-select-item-show');
                            }
                        });                        
                        element.addEventListener('click', (event) => {
                            elem[index].el.setAttribute('selected', 'selected');
                            sibling.querySelector('.directorist-select__dropdown--inner').classList.remove('directorist-select__dropdown.open');                                                
                        });
                    });
                });
                     
                eventDelegation('click', 'li', function(e){
                    var index = e.target.getAttribute('data-key');
                    var closestId = e.target.closest('.directorist-select').getAttribute('id');
                    
                                                         
                    if(isMax[closestId] === null && defaultValues[closestId]){
                        defaultValues[closestId].filter(item => item.key === index ).length === 0 &&  defaultValues[closestId].push({value: elem[index].value, key: index});
                        option[0].setAttribute('selected', 'selected');
                        option[0].value = JSON.stringify(defaultValues[closestId]);                        
                        e.target.classList.remove('directorist-select-item-hide');
                        e.target.classList.add('directorist-select-item-show');
                        insertSearchItem();
                    } else {   
                        if(defaultValues[closestId])
                        if(defaultValues[closestId].length < parseInt(isMax[closestId])){                                                      
                            defaultValues[closestId].filter(item => item.key == index ).length === 0 &&  defaultValues[closestId].push({value: elem[index].value, key: index});
                            option[0].setAttribute('selected', 'selected');
                            option[0].value = JSON.stringify(defaultValues[closestId]);                        
                            e.target.classList.remove('directorist-select-item-hide');
                            e.target.classList.add('directorist-select-item-show');
                            insertSearchItem();
                        } else {                            
                            item.querySelector('.directorist-select__dropdown').classList.remove('directorist-select__dropdown-open');
                            e.target.closest('.directorist-select').querySelector('.directorist-select__container').classList.add('directorist-error');
                            e.target.closest('.directorist-select').querySelector('.directorist-error__msg').innerHTML = `Max ${isMax[arraySelector]} Items Added `;
                        }
                    }
                });
            });

            eventDelegation('click', '.directorist-item-remove', function(e){
                var li = item.querySelectorAll('li');
                var closestId = e.target.closest('.directorist-select').getAttribute('id');
                
                defaultValues[closestId] = defaultValues[closestId] && defaultValues[closestId].filter(item => item.key != parseInt(e.target.getAttribute('data-key')));
                if((defaultValues[closestId] && defaultValues[closestId].length) < (isMax[closestId] && parseInt(isMax[closestId]))){
                    e.target.closest('.directorist-select').querySelector('.directorist-select__container').classList.remove('directorist-error');
                    e.target.closest('.directorist-select').querySelector('.directorist-error__msg').innerHTML = '';
                }

                li.forEach((element, index) => {
                    if(parseInt(e.target.getAttribute('data-key')) === index){                            
                        element.classList.add('directorist-select-item-hide')
                        element.classList.remove('directorist-select-item-show')
                    }
                });

                insertSearchItem();
                option[0].setAttribute('selected', 'selected');
                option[0].value = JSON.stringify(defaultValues[closestId]);
            });            
        }

        multiSelect ? multiSelects() : singleSelect();
       
    });  
}
