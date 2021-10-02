<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="css/login.css">
<body>
<nav class="navbar navbar-expand-md navbar-dark py-3 d-block text-center text-lg-left" id="navBlack">
        <a class="navbar-brand" href="user/signupChoice">
            <h1 class="display-4 ml-0 ml-md-5 pl-0 pl-md-3 font-weight-bold" id="brandName">
    Mecvise
                <span>
                    <img src="imgs/MecVise-logo.svg" alt="Mecvise logo" id="logo">
                </span>
            </h1>
        </a>
    </nav>    <div class="p-2 p-sm-4 my-4 mx-4">
        <div class="container-fluid rounded p-0 p-sm-4 bg-white">
            <form action="user/login" method="POST" id="loginForm">
                <div class="form-row p-3 p-sm-5 flex-column flex-lg-row">
                    <div class="col d-flex justify-content-center my-5 py-4" id="image-container">
                        <img class="image my-5" src="imgs/group.png" alt="Students">
                    </div>
                    <div class="col text-center my-0 my-lg-4 py-0 py-lg-3">
                        <div class="display-4 font-weight-bold my-0 my-lg-5 col-12 col-lg-9 offset-lg-1">
                            User Login
                        </div>
                        <?php if($data['message'] != ''){?>
                            <div class="col-md-12">
                                <p class="text-danger"><?php echo $data['message'] ?> </p>
                            </div>
                        <?php }?>
                        <div class="col-12 col-lg-9 offset-0 offset-lg-1">
                            <label for="email"></label>
                            <input type="email" id="email" name="Email" class="form-control" placeholder="Email" value="<?php if(array_key_exists('email',$data)) echo $data['email'] ?>" >
                        </div>
                        <div class="col-12 col-lg-9 offset-0 offset-lg-1">
                            <label for="password"></label>
                            <input type="password" id="password" name="Password" class="form-control" placeholder="Password">
                        </div>
                        <div class="my-3 col-12 col-lg-9 offset-lg-1 text-center">
                            <button type="submit" class="btn btn-lg btn-danger text-white">
<!--                            <a href="javascript:;" onclick="document.getElementById('loginForm').submit()" class="btn btn-lg btn-danger text-white">
                                Login
                            </a>-->
                                Login
                            </button>
                            <a href="user/forgetPassword" class="d-block mt-3 text-body">
                                Forgot username/password?
                        </div>

                        </a>
                    </div>

                </div>
            </form>
            <div class="" id="back-button">
                <a href="user/signupChoice" class="p-0">
                    <span class="display-4 text-body">
                        <i class="far fa-arrow-alt-circle-left"></i>
                    </span></a>
            </div>
        </div>
    </div>
 <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>