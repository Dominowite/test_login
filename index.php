<!-- index.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
          font-family: 'Kanit', sans-serif; 
            color: #f8f9fa; /* โทนสีขาว */
            padding-top: 60px; /* สำหรับ Navbar */
            padding-bottom: 40px; /* สำหรับ Footer */
            background-image: url('assets/images/bg.jpg'); /* เปลี่ยนเป็นที่อยู่ของรูปภาพที่คุณต้องการใช้ */
    background-repeat: no-repeat;
    background-size: cover; /* ให้รูปภาพขยายเต็มพื้นที่ของ body */
    background-position: center; /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
    

            
        }

        body:before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('assets/images/bg.jpg'); /* เปลี่ยนเป็นที่อยู่ของรูปภาพที่คุณต้องการใช้ */
    background-repeat: no-repeat;
    background-size: cover; /* ให้รูปภาพขยายเต็มพื้นที่ของ body */
    background-position: center; /* จัดตำแหน่งรูปภาพให้อยู่กลาง */
    opacity: 0.7; /* ลดความทึบของพื้นหลังเป็น 70% */
    z-index: -1; /* ให้ส่งพื้นหลังไปอยู่ด้านหลังของเนื้อหา */
}

        .navbar {
          background-color: rgba(0, 0, 0, 0.5); /* ปรับความโปร่งใสได้ตามต้องการ */
  color: white;
  backdrop-filter: blur(5px); /* เบลอพื้นหลังเล็กน้อย */

        }
        .navbar a {
  color: white;
}
        .navbar-brand {
            color: #f8f9fa !important; /* โทนสีขาว */
        }
        .container {
            margin-top: 20px;
        }
        .jumbotron {
            background-color: #343a40; /* โทนสีดำ */
            color: #f8f9fa; /* โทนสีขาว */
            padding: 100px 0; /* ระยะห่างของข้อความภายใน jumbotron */
            text-align: center; /* การจัดวางข้อความในศูนย์กลาง */
            height: 70vh;
        }
        .carousel{
            height: 50vh;
            margin-top: 1rem;
        }

        .carousel-item{
            height: 50vh;
        }

        /* Carousel caption */
.carousel-caption {
  color: #fff; /* สีข้อความ */
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* เงาข้อความ */
}

/* Carousel button */
.btn-primary {
  background-color: #007bff; /* สีพื้นหลังปุ่ม */
  border-color: #007bff; 
}
.neon-green {
  color: #39FF14; /* สีเขียว */
  text-shadow: 
    0 0 7px #39FF14, /* เงาเรืองแสง */
    0 0 10px #39FF14, 
    0 0 21px #39FF14,
    0 0 42px #24FF00, /* สีเขียวเข้มขึ้น */
    0 0 82px #00FF00,
    0 0 92px #00FF00,
    0 0 102px #00FF00,
    0 0 151px #00FF00;
}
.navbar-brand, .navbar-nav .nav-link {
  color: #ffffff; /* สีข้อความปกติ */
  transition: color 0.3s ease; /* เพิ่ม transition เพื่อให้การเปลี่ยนสีดู smooth */
}

/* สไตล์ Hover */
.navbar-nav .nav-link:hover {
  color: #39FF14; /* สีเขียวเมื่อ hover */
  text-shadow: 0 0 7px #39FF14, 0 0 10px #39FF14, 0 0 21px #39FF14; /* เงาเรืองแสง */
}

/* สไตล์ Login */
.nav-link .fa-user-circle {
  margin-right: 5px; /* ระยะห่างระหว่างไอคอนกับข้อความ */
}
footer {
    background-color: #343a40; /* Darker background */
    color: #f8f9fa;
    text-align: center;
}

footer h1 {
    font-size: 2.5rem; /* Larger heading */
    margin-bottom: 1.5rem;
}

.contact-form {
    background-color: rgba(255, 255, 255, 0.1); /* Slightly transparent background */
    padding: 20px;
    border-radius: 10px;
}

.contact-form .form-control {
    background-color: transparent; /* Transparent input fields */
    border: 1px solid rgba(255, 255, 255, 0.5); /* Lighter border */
    color: #f8f9fa;
}

.social-media a {
    color: #f8f9fa;
    margin: 0 10px;
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

.social-media a:hover {
    color: #007bff; /* Blue on hover */
}



    </style>
</head>
<body>
<?php include 'layout/navbar.php'; ?>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>ยินดีต้องรับสู้เว็ปไซต์</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">ดาวน์โหลด Resume</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">

        <div class="container">
          <div class="carousel-caption">
            <h1>ความสนใจและความสำเร็จ</h1>
            <p class="neon-green">Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>ประสบการณ์และทักษะของฉัน</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Git Hub</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Figma</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>ผลงาน</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">เกี่ยวกับฉัน <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">เกี่ยวกับเว็ปไซต์ <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">ผลงานต่างๆ <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div>



  <footer class="text-secondary px-4 py-5 text-center">
    <div class="py-5">
        <h1 class="display-5 fw-bold text-white">ติดต่อฉัน</h1>
        <div class="col-lg-6 mx-auto contact-form">
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" placeholder="ชื่อของคุณ">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" placeholder="อีเมลของคุณ">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="message" rows="3" placeholder="ข้อความของคุณ"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
            </form>
        </div>
        <div class="social-media mt-4">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</footer>


<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/9bf0ae86c0.js" crossorigin="anonymous"></script>

</body>
</html>
