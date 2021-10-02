<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="css/login.css">
<body>
<nav class="navbar navbar-expand-md navbar-dark py-3 d-block text-center text-lg-left" id="navBlack">
        <a class="navbar-brand" href="user/login">
            <h1 class="display-4 ml-0 ml-md-5 pl-0 pl-md-3 font-weight-bold" id="brandName">
    Mecvise
                <span>
                    <img src="imgs/MecVise-logo.svg" alt="Mecvise logo" id="logo">
                </span>
            </h1>
        </a>
    </nav>    <div class="p-4 my-4 mx-4">
        <div class="container-fluid rounded p-4 bg-white">
            <form action="user/resetPassword?val1=<?php echo $data['val1']?>&val2=<?php echo $data['val2'] ?> " method="POST" id="loginForm">
                <div class="form-row p-5 flex-column flex-lg-row">
                    <div class="col d-flex justify-content-center my-5 py-4" id="image-container">
                        <img class="image my-5" src="imgs/group.png" alt="Students">
                    </div>
                    <div class="col text-center my-4 py-3">
                        <div class="display-4 font-weight-bold my-5 col-12 col-lg-9 offset-lg-1">
                            Reset Password
                        </div>
                        <?php if(array_key_exists('message',$data) && $data['message'] != ''){?>
                            <div class="col-md-12">
                                <p class="text-danger"><?php echo $data['message'] ?> </p>
                            </div>
                        <?php }?>
                        <?php if(array_key_exists('passwordReset',$data) && $data['passwordReset']){?>
                            <div class="col-md-12">
                                <p class="text-danger">Your password has been successfully changed. You can now login normally  </p>
                            </div>
                            <a href="user/login" class="btn btn-lg btn-danger text-white">
                                Login
                            </a>
                        <?php }else{?>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="password">New Password: </label>
                            <input type="password" name="Password" id="password" class="form-control" placeholder="Enter your password">
                            <small class="text-muted">Password must be at least 8 characters</small>
                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="password2">Retype New Password: </label>
                            <input type="password" id="password2" class="form-control"
                                   placeholder="Enter your password again">
                            <small class="text-muted">This should match the first password</small>
                        </div>
                        <div class="my-3 col-12 col-lg-9 offset-lg-1 text-center">
                            <button type="submit" class="btn btn-lg btn-danger text-white">
                                Reset Password
                            </button>
                        </div>
                        <?php } ?>
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