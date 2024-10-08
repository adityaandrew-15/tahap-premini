<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href={{"home/assets/css/fontawesome.css"}}>
    <link rel="stylesheet" href={{"home/assets/css/templatemo-space-dynamic.css"}}>
    <link rel="stylesheet" href={{"home/assets/css/animated.css"}}>
    <link rel="stylesheet" href={{"home/assets/css/owl.css"}}>
    <title>Kursus</title>
</head>
<body>
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="/dashboard" class="logo">
                  <h4>kur<span>sus</span></h4>
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section"><a href="/dashboard">Home</a></li>
                  <li class="scroll-to-section"><a href="/kursus">kursus</a></li>
                  <li class="scroll-to-section"><a href="/instruktur">instruktur</a></li>
                  <li class="scroll-to-section"><a href="/pendaftaran">pendaftaran</a></li> 
                  <li class="scroll-to-section"><a href="/siswa">siswa</a></li>
                  <li class="scroll-to-section"><a href="/kelas">kelas</a></li> 
                  <li class="scroll-to-section"><a href="/ulasan">ulasan</a></li> 
                  <li class="scroll-to-section"><a href="/nilai">nilai</a></li> 
                  <li class="scroll-to-section"><div class="main-red-button"><a href="/logout" onclick="return confirm('Anda yakin ingin logout?')">logout</a></div></li> 
                </ul>        
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>
@yield('content')
<script src="home/vendor/jquery/jquery.min.js"></script>
<script src="home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src={{"home/assets/js/owl-carousel.js"}}></script>
<script src={{"home/assets/js/animation.js"}}></script>
<script src={{"home/assets/js/imagesloaded.js"}}></script>
<script src={{"home/assets/js/templatemo-custom.js"}}></script>
</body>
</html>