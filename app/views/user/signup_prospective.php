
<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="css/signupChoice.css">
<body>

<nav class="navbar navbar-expand-md navbar-dark py-3 d-block text-center text-lg-left" id="navBlack">
        <a class="navbar-brand" href="#">
            <h1 class="display-4 ml-0 ml-md-5 pl-0 pl-md-3 font-weight-bold" id="brandName">
                Mecvise
                <span>
                    <img src="imgs/MecVise-logo.svg" alt="Mecvise logo" id="logo">
                </span>
            </h1> 
        </a>
    </nav>
    <div class="p-4 my-4 mx-4">
        <div class="container-fluid rounded p-2 p-sm-4 bg-white">
            <h4 class="text-muted text-center text-lg-left font-weight-bold mt-4">
            Sign up as a Prospective Student</h4>
            <form action="user/save" method="POST">
                <input type="hidden" name="user_type" value="prospective">
                <div class="form-row px-0 px-sm-5 flex-column flex-lg-row">
                    <div class="col">
                        <div class="my-3 col-12 col-lg-9">
                            <label for="firstName">First Name</label>                       
                            <input type="text" name="First_Name" id="firstName" class="form-control <?= !empty($data['First_Name_err'])?'is-invalid':'' ?>" placeholder="John"

                            >
                            <span class="invalid-feedback"><?= $data['First_Name_err']?></span>
                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="Last_Name" id="lastName" class="form-control <?= !empty($data['Last_Name_err'])?'is-invalid':'' ?>" placeholder="Doe"
                            >
                            <span class="invalid-feedback"><?= $data['Last_Name_err']?></span>
                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="email">Email Address: </label>
                            <input type="email" name="Email" id="email" class="form-control <?= !empty($data['Email_err'])?'is-invalid':'' ?>" placeholder="example@email.com"
                               value="<?= array_key_exists('Email',$data) && $data['Email']?$data['Email']:'' ?>" >
                            <span class="invalid-feedback"><?= $data['Email_err']?></span>

                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="password">Password: </label>
                            <input type="password" name="Password" id="password" class="form-control <?= !empty($data['Password_err'])?'is-invalid':'' ?>" placeholder="Enter your password"
                                >
                            <small class="text-muted">Password must be at least 8 characters</small>
                            <span class="invalid-feedback"><?= $data['Password_err']?></span>

                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="password2">Retype Password: </label>
                            <input type="password" id="password2" class="form-control <?= array_key_exists('Confirm_Password_err',$data) && !empty($data['Confirm_Password_err'])?'is-invalid':'' ?>"
                            placeholder="Enter your password again" name="Confirm_Password"
                            >
                            <span class="invalid-feedback"><?= array_key_exists('Confirm_Password_err',$data)?$data['Confirm_Password_err']:''?></span>

                            <small class="text-muted">This should match the first password</small>
                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="phonenbr">Phone Number: </label>
                            <input type="number" name="Phonenbr" id="phone" class="form-control <?= !empty($data['Phone_err'])?'is-invalid':'' ?>" placeholder="Enter a Valid Phone Number"
                               value="<?= array_key_exists('Email',$data) && $data['Phonenbr']?$data['Phonenbr']:'' ?>" >
                            <span class="invalid-feedback"><?= $data['Email_err']?></span>

                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="date">Date Of Birth: </label>
                            <input type="date" id="date" name="DOB" class="form-control" value="1998-01-01" placeholder="01-01-1997">
                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="linked_in_account">LinkedIn Account: </label>
                            <input type="url" name="linked_in_account" id="linked_in_account" class="form-control <?= !empty($data['linked_in_account_err'])?'is-invalid':'' ?>" placeholder=""
                                   value="<?= array_key_exists('linked_in_account',$data) && $data['linked_in_account']?$data['linked_in_account']:'' ?>">
                            <span class="invalid-feedback"><?= $data['linked_in_account_err']?></span>
                        </div>
                        <div class="my-3 col-12 col-lg-9">
                            <label for="gender" class="">Gender:</label>
                            <select class="form-control" id="Gender" name="Gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <!-- Add a feature that when you select "other" a textbox appears so that the user enters his gender -->
                                <option value="O">Other</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="my-0 my-lg-3 col-12 col-lg-9 offset-0 offset-lg-3">
                            <label for="school" class="">Current School:</label>
                            <input name="school_name" type="text" class="form-control" placeholder="Enter your current school's name"/>
                        </div>
                        <div class="col-12 col-lg-9 offset-0 offset-lg-3">
                            <label for="grade" class="">Grade Level: </label>
                            <select class="form-control" name="grade" id="grade">
                                <option value="12">Grade 12</option>
                                <option value="11">Grade 11</option>
                                <option value="10">Grade 10</option>
                            </select>
                        </div>
                        
                        <!-- let the country be a dropdown menu which the user selects his country from-->
                        <!-- When the user selects the country let there be suggestions for the province and then suggestions for the cities
                        according to the city selected -->
                        <div class="my-0 my-lg-3 col-12 col-lg-9 offset-0 offset-lg-3">
                            <label for="country">Country:</label>
                            <!--                            <input type="text" name="Country" id="country" class="form-control <?/*= !empty($data['country_err'])?'is-invalid':'' */?>" placeholder="Enter your Country:"
                            onchange="retrieveProvinces()"
                            >-->
                            <select class="form-control" name="country_id" id="country" onchange="retrieveProvinces()">
                                <option value="">-Select Country-</option>
                                <?php foreach($data['countries'] as $country){?>
                                    <option value="<?= $country->country_id ?>"><?= $country->name ?></option>
                                <?php }?>
                            </select>
                            <span class="invalid-feedback"><?= $data['country_err']?></span>
                        </div>

                        <div class="my-0 my-lg-3 col-12 col-lg-9 offset-0 offset-lg-3">
                            <label for="province">Province:</label>
                            <!--                            <input type="text" name="Province" id="province" class="form-control <?/*= !empty($data['province_err'])?'is-invalid':'' */?>" placeholder="Enter your Province"
                            >-->
                            <select class="form-control" name="province_id" id="province" onchange="retrieveCities()">
                                <option>-Select a Province-</option>
                            </select>
                            <span class="invalid-feedback"><?= $data['province_err']?></span>
                        </div>
                        <div class="my-0 my-lg-3 col-12 col-lg-9 offset-0 offset-lg-3">
                            <label for="city">City:</label>
                            <!--                            <input type="text" name="City" id="city" class="form-control <?/*= !empty($data['city_err'])?'is-invalid':'' */?>" placeholder="Enter your City"
                            >-->
                            <select class="form-control" name="city_id" id="city">
                                <option>-Select a City-</option>
                            </select>
                            <span class="invalid-feedback"><?= $data['city_err']?></span>
                        </div>
                        <div class="col-9 offset-3 d-none d-lg-block text-center">
                            <img class="image" src="imgs/classmates.png" alt="classmates">
                        </div>
                    </div>
                </div>

                <div class="custom-control custom-checkbox d-flex mt-4">
                    <input type="checkbox" class="custom-control-input" id="sameShipping">
                    <label for="sameShipping" class="custom-control-label">
                        <span class="ml-2">I am not a Robot</span></label>
                </div>
                
                <div class="custom-control custom-checkbox d-flex">
                    <input type="checkbox" class="custom-control-input" id="saveInfo">
                    <label for="saveInfo" class="custom-control-label">
                        <span class="ml-2">I have read and agreed to all the Terms and Conditions</span>
                    </label>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary btn-lg my-5 px-4 font-weight-bold">
                            Sign Up
                        </button>
                    </div>
                </div>
            </form>

            <a href="user/signupChoice" class="p-0">
                <span class="display-4 text-body">
                    <i class="far fa-arrow-alt-circle-left"></i>
                </span>
            </a>

        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>