<?php require APPROOT . '/views/inc/logged-in-header.php'; ?>
<?php
$sessionUser = $_SESSION['user'];
$user =$data['user'];
?>
<link rel="stylesheet" href="css/profile.css">
<body>

<nav class="navbar navbar-expand-lg navbar-dark py-3" id="blackNav">
    <a class="navbar-brand" href="post">
        <h1 class="display-4 ml-md-5 ml-2 font-weight-bold" id="brandName">
            Mecvise
            <span>
                    <img src="imgs/MecVise-logo.svg" alt="Mecvise logo" id="logo">
                </span>
        </h1>
    </a>

    <button type="button" class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mt-3" id="navbarText">
        <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item" id="navButton">
                <a href="post" class="btn text-white btn-lg"><h3 class="font-weight-bold">Discussions</h3></a>
            </li>
            <li class="nav-item active">
                <a href="post/meetPeople" class="btn text-white btn-lg">
                    <h3 class="font-weight-bold">Meet The People</h3>
                </a>
            </li>
        </ul>
    </div>
</nav>    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-search">
    <form action="" class="ml-1">
        <div class="flex-column-start">
            <div class="input-group">
                <input type="text" id="search" class="pr-5 pl-2 my-2"
                       placeholder="&#xF002;  Search" style="font-family:Arial, FontAwesome"/>
            </div>
        </div>
    </form>

    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <div class="dropdown mr-lg-2 mr-0 mt-2">
                    <button type="button" class="btn" type="button" id="compose-button">
                        <span><img src="imgs/edit.png" id="compose-icon" alt="compose thread"></span>
                    </button>
                </div>
            </li>

            <li class="nav-item">
                <div class="dropdown mr-lg-2 mr-0 mt-2">
                    <button type="button" class="btn" type="button" id="notification"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><img src="imgs/bell.png" id="bell" alt="notification bell"></span>
                    </button>
                    <div class="dropdown-menu text-center" aria-labelledby="notification">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <div class="dropdown">
                    <button type="button" class="btn pr-lg-5 px-0 py-1" type="button" id="profile"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><img src="imgs/woman.png" class="rounded-circle" id="profile-pic" alt="account"></span>
                        <span class="text-muted d-none d-lg-inline"><?= $sessionUser->First_Name.' '.$sessionUser->Last_Name ?></span>
                    </button>
                    <div class="dropdown-menu text-center" aria-labelledby="notification">
                        <a class="dropdown-item" href="user/profile">Profile</a>
                        <a class="dropdown-item" href="user/logout">Log Out</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-item" id="chat">
                    <button type="button" class="btn px-lg-5 px-0 mx-2 py-0 py-lg-2 my-1 my-lg-0" type="button">
                        <span><img src="imgs/chat.svg" id="chat-icon" alt="chat icon"></span>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container pt-5">
    <div class="jumbotron bg-white p-0">
        <form action="<?= $data['canEdit']?'user/saveProfile':'#' ?>" method="POST">
            <div class="row">
            <div class="col-12 rounded" id="picture-col">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <img src="imgs/woman.png" alt="profile picture"
                             class="m-2 bg-white" id="picture">
                    </div>
                    <div class="col-12 col-lg-4 text-white">
                        <div class="lead font-weight-bold desc"><span class="h4">
                            </span><?= $user->First_Name.' '.$user->Last_Name ?></span>
                            <?php if($user->user_Type != 'prospective'){ ?>
                            <span class="font-italic h5">
                                (<?= $user->user_Type == 'unistudent'?CommonValues::STANDINGS[$user->standing]:'Teacher' ?>)
                            </span>
                            <?php } ?>
                        </div>
                        <div class="h5">
                            <span><img src="imgs/medal.png" alt="points logo" id="medal"></span> 2280 pts
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 offset-0 offset-lg-2">
                        <a href="javascript:;" class="btn btn-lg btn-outline-light desc mb-3">
                            Chat With <?= $user->First_Name.' '.$user->Last_Name ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mx-3 mt-5 pb-3  parent-container">
                    <label for="about"><h4 class="font-weight-bold">About Me
                            <button type="button" class="btn p-0 ml-2 mb-2">
                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                            </button>
                        </h4></label>
                    <p class="display-element"><?= $user->Bio?></p>
                    <textarea class="form-control editable-element d-none" id="about" name="Bio" rows="3" placeholder="Tell us about yourself" ><?= $user->Bio?></textarea>
                </div>
                <hr>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="font-weight-bold ml-3">
                                    <span><img src="imgs/graduation-hat.png" alt="graduation hat" class="ico"></span>
                                    Academic Life
                                </h4>
                                <div  class="mx-4">

                                    <?php
                                    if($user->user_Type == 'prospective'){ ?>
                                        <div class="form-group parent-container">
                                            <label for="currently" class="lead">
                                                I'm currently in
                                                <button type="button" type="button" class="btn p-0 ml-2 mb-2">
                                                    <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                                </button>
                                            </label>
                                            <p class="display-element"><?= $user->school_name ?> </p>
                                            <input type="text" name="school_name" class="d-none form-control editable-element" id="currently" placeholder="" value="<?= $user->school_name ?>">
                                        </div>
                                        <div class="form-group parent-container">
                                            <label for="currently" class="lead">
                                                Grade
                                                <button type="button" type="button" class="btn p-0 ml-2 mb-2">
                                                    <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                                </button>
                                            </label>
                                            <p class="display-element">Grade <?= $user->grade ?></p>
                                            <select class="d-none form-control editable-element" name="grade" id="grade" >
                                                <option value="12" <?= $user->grade == 12?'selected':'' ?>>Grade 12</option>
                                                <option value="11" <?= $user->grade == 11?'selected':'' ?>>Grade 11</option>
                                                <option value="10" <?= $user->grade == 10?'selected':'' ?>>Grade 10</option>
                                            </select>
                                            <!--<input type="text" name="school_name" class="d-none form-control editable-element" disabled id="currently" placeholder="">-->
                                        </div>
                                    <?php }elseif($user->user_Type == 'teacher'){ ?>
                                        <div class="form-group parent-container">
                                            <label for="currently" class="lead">
                                                Universities
                                                <button type="button" type="button" class="btn p-0 ml-2 mb-2">
                                                    <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                                </button>
                                            </label>
                                            <p class="display-element">
                                                <?= $user->universities_names
/*                                                $universitiesStr = '';
                                                foreach ($user->universities_names as $key=>$value){
                                                    $universitiesStr .=$value.',';
                                                 }
                                                echo rtrim($universitiesStr,',');*/
                                                ?>
                                            </p>
                                            <select class="d-none form-control editable-element" id="university_id" name="university_id[]" multiple>
                                                <option>-Select a University-</option>
                                                <?php
                                                $universitiesIds = explode(',',$user->universities_ids);
                                                foreach($data['universities'] as $university){?>
                                                    <option value="<?= $university->Uni_ID ?>" <?= in_array($university->Uni_ID,$universitiesIds)?'selected':'' ?>><?= $university->University_Name ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    <?php }else if($user->user_Type == 'unistudent'){ ?>
                                        <div class="form-group parent-container">
                                            <label for="currently" class="lead">
                                                Universities
                                                <button type="button" class="btn p-0 ml-2 mb-2">
                                                    <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                                </button>
                                            </label>
                                            <p class="display-element">
                                                <?= $user->university_name
/*                                                foreach ($data['universities'] as $university){
                                                    if($university->Uni_ID == $user->university_id){
                                                        echo $university->University_Name;
                                                        break;
                                                    }
                                                }*/
                                                ?>
                                            </p>
                                            <select class="d-none form-control editable-element" id="university" name="university_id" onchange="retrieveMajors()">
                                                <option>-Select a University-</option>
                                                <?php foreach($data['universities'] as $university){?>
                                                    <option value="<?= $university->Uni_ID ?>" <?= $university->Uni_ID == $user->university_id?'selected':'' ?>><?= $university->University_Name ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group parent-container">
                                            <label for="currently" class="lead">
                                                Major
                                                <button type="button" class="btn p-0 ml-2 mb-2">
                                                    <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                                </button>
                                            </label>
                                            <p class="display-element">
                                                <?php
                                                foreach ($data['majors'] as $major){
                                                    if($major->Major_id == $user->major_id){
                                                        echo $major->Major_Name;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <select class="d-none form-control editable-element" id="major" name="major_id" >
                                                <option value="0" >-Select a Major-</option>
                                                <?php foreach($data['majors'] as $major){?>
                                                    <option value="<?= $major->Major_id ?>" <?= $major->Major_id == $user->major_id?'selected':'' ?>><?= $major->Major_Name ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group parent-container">
                                            <label for="currently" class="lead">
                                                Standing
                                                <button type="button" class="btn p-0 ml-2 mb-2">
                                                    <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                                </button>
                                            </label>
                                            <p class="display-element">
                                                <?php
                                                foreach (CommonValues::STANDINGS as $key=>$value){
                                                    if($key == $user->standing){
                                                        echo $value;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <select class="d-none form-control editable-element" id="standing" name="standing" >
                                                <?php foreach (CommonValues::STANDINGS as $key=>$value){?>
                                                    <option value="<?= $key ?>" <?= $key == $user->standing?'selected':'' ?>><?= $value ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    <?php } ?>
                                    <!--<div class="form-group">
                                        <label for="currently" class="lead">
                                            I'm currently in
                                            <button type="button" class="btn p-0 ml-2 mb-2">
                                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                            </button>
                                        </label>
                                        <input type="text" class="form-control" id="currently" placeholder="Univeristy you are attending">
                                    </div>

                                    <div class="form-group">
                                        <label for="studying" class="lead">
                                            Studying
                                            <button class="btn p-0 ml-2 mb-2">
                                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                            </button>
                                        </label>
                                        <input type="text" class="form-control" id="studying" placeholder="Current Major">
                                    </div>

                                    <div class="form-group">
                                        <label for="studying" class="lead">
                                            Favorite Courses
                                            <button class="btn p-0 ml-2 mb-2">
                                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                            </button>
                                        </label>
                                        <input type="text" class="form-control" id="studying" placeholder="">
                                    </div>-->
                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="font-weight-bold ml-3 mt-5">
                                    <span><img src="imgs/healthy.png" alt="graduation hat" class="ico"></span>
                                    Social Life
                                </h4>
                                <div  class="mx-4">
                                    <div class="form-group parent-container">
                                        <label for="hobbies" class="lead">
                                            Hobbies & Interests
                                            <button type="button" class="btn p-0 ml-2 mb-2">
                                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                            </button>
                                        </label>
                                        <p class="display-element"><?= $user->hobbies ?> </p>
                                        <input type="text" name="hobbies" class="d-none form-control editable-element"  id="hobbies" placeholder="" value="<?= $user->hobbies ?>">
                                    </div>

                                    <div class="form-group  parent-container">
                                        <label for="clubs" class="lead">
                                            Clubs & Societies
                                            <button type="button" class="btn p-0 ml-2 mb-2">
                                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                            </button>
                                        </label>
                                        <p class="display-element"><?= $user->clubs ?> </p>
                                        <input type="text" name="clubs" class="d-none form-control editable-element"  id="clubs" placeholder="" value="<?= $user->clubs ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="font-weight-bold ml-3 mt-5">
                                    <span><img src="imgs/confidence.png" alt="graduation hat" class="ico"></span>
                                    Ask Me About
                                </h4>
                                <div class="mx-4">
                                    <div class="form-group mb-4  parent-container">
                                        <label for="ask" class="lead">
                                            I Can Help You With
                                            <button type="button" class="btn p-0 ml-2 mb-2">
                                                <img src="imgs/pencil.png" alt="edit-logo" class="edit-logo p-0">
                                            </button>
                                        </label>
                                        <p class="display-element"><?= $user->ask_me ?> </p>
                                        <input type="text" name="ask_me" class="d-none form-control editable-element"  id="clubs" placeholder="" value="<?= $user->ask_me ?>">
                                    </div>
                                </div>
                            </div>
                            <?php if($data['canEdit']){ ?>
                            <div class="col-12">
                                <div class="form-group mx-3 pb-3 float-right">
                                    <button type="submit" class="btn btn-md btn-danger text-white " style="margin-left: ">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 p-5">
                        <div id="galleryCarousel" class="carousel slide my-5" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="imgs/upload.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="imgs/upload.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="imgs/upload.png" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#galleryCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#galleryCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php if($_SESSION['user_id'] != $user->User_ID){?>
    <script>

        $('.edit-logo').parent('button').remove();
    </script>

    <?php } ?>
?>

