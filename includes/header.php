<!-- <div id="header">
    <div class="top_right">
        <div class="big_banner"> <a href="./index.php"><img src="img/banner.jpg" alt="" border="0" width="400" height="100"/></a> </div>
    </div>
    <div id="logo"> <a href="./index.php"><img src="img/logo.jpg" alt="" border="0" width="182" height="85" /></a> </div>
  </div>-->
<style>
    .mySlides {display:none}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

</style>


<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="img/cover1.jpg" style="width:100%;height: 150px">
    </div>

    <div class="mySlides fade">
        <img src="img/cover2.jpg" style="width:100%;height: 150px">
    </div>

    <div class="mySlides fade">
        <img src="img/cover3.jpg" style="width:100%;height: 150px">
    </div>

</div>

<div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>