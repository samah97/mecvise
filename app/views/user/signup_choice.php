<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="css/signupChoice.css">
<body>
    <div id="content">
    <nav class="navbar navbar-expand-md navbar-dark py-3">
        <a class="navbar-brand m-auto" href="#">
            <h1 class="display-4 ml-0 ml-md-5 pl-0 pl-md-3 font-weight-bold" id="brandName">
                Mecvise
                <span>
                    <img src="imgs/MecVise-logo.svg" alt="Mecvise logo" id="logo">
                </span>
            </h1> 
        </a>
        
        
         <div class="collapse navbar-collapse d-lg-flex d-none justify-content-end" id="navigation">
        <a href="user/login" class="btn btn-info btn-lg px-5 py-0 mr-5 pt-1 font-weight-bolder">
            <h3>Login</h3></a>
        </div>
    </nav>
    </div>

    <div class="container">
            <h1 class="text-center text-white display-5 my-5 font-weight-bold mx-5 d-none d-xl-block">
                Connect with students, teachers & alumni all over Lebanon</h1>
    </div>
            <h2 class="text-center mb-0 mb-lg-5 font-weight-bold text-white my-sm-4 my-0" id="signup">
                SIGN UP AS</h2>
    <div class="container mt-5">
            <div class="row" id="signup-buttons">
                <div class="col-12 col-lg-4">
                    <!--<div class="col col-lg-3 offset-0 offset-lg-2">-->
                        <a href="user/signupProspective" class="btn btn-info text-body rounded-pill  p-0 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <img src="imgs/student.svg" alt="">
                                </div>
                                <div class="col-12 pb-0 pb-sm-3 stuType">
                                    Prospective Student
                                </div>
                            </div>
<!--                            <span class="d-block">
                                <img class="" src="imgs/student.svg" alt="prospective">
                            </span> <h3 class="font-weight-bold mt-0 mt-lg-4 pt-1 mb-2">
                                Prospective Student</h3>-->
                        </a>
                    <!--</div>-->
                </div>
                    <div class="col-12 col-lg-4">
                        <a href="user/signupUniStudent" class="btn btn-info text-body rounded-pill p-0 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <img src="imgs/graduation.png" alt="">
                                </div>
                                <div class="col-12 pb-0 pb-sm-2 stuType">
                                    Current Student
                                </div>
                            </div>
<!--                            <span class="d-block">
                                <img class="" src="imgs/graduation.png" alt="prospective">
                            </span> <h3 class="font-weight-bold">
                                University Student/ Alumni</h3>-->
                        </a>
                    </div>
                    <div class="col-12 col-lg-4">
                        <a href="user/signupTeacher" class="btn btn-info text-body rounded-pill  p-0 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <img src="imgs/teacher.png" alt="">
                                </div>
                                <div class="col-12 pb-0 pb-sm-3 stuType">
                                    Alumni
                                </div>
                            </div>
<!--                            <span class="d-block">
                                <img class="" src="imgs/teacher.png" alt="prospective">
                            </span> <h3 class="font-weight-bold mt-0 mt-lg-5 mb-0 mb-lg-4">
                                Teacher</h3>-->
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center mt-5 d-block d-md-none" id="login2">
            <a href="user/login" class="btn btn-info btn-lg px-5 py-0 mt-5 pt-1 font-weight-bolder">
                <h3>Login</h3></a></div>
</div>
</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>