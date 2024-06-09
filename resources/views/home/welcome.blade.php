<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{asset('wamy.css')}}">
    <title>site</title>
</head>
<body>

<!-- test  -->
<div class="slideshow-container">

<div class="mySlides fade">
<img src="{{asset('img/test.jpg')}}" style="width:100%">
</div>

<div class="mySlides fade">
<img src="{{asset('img/test2.jpg')}}" style="width:100%">
</div>

<div class="mySlides fade">
<img src="{{asset('img/test3.jpg')}}" style="width:100%">
</div>
</div>
<!-- test  -->
@include('home.header')
    <main>
        <section>  
            <div class="titre">
                <marquee>  <h1>bienvenue chez nous </h1></marquee>
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
          </section>
      
    </main>
  @include('home.footer')



    <script>
let slideIndex = 0;
showSlides();

function showSlides() {
let i;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");
for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";  
}
slideIndex++;
if (slideIndex > slides.length) {slideIndex = 1}    
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";  
dots[slideIndex-1].className += " active";
setTimeout(showSlides, 10000); // Change image every 2 seconds
}
</script>
</body>
</html>