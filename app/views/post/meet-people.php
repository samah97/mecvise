<?php require APPROOT . '/views/inc/logged-in-header.php'; ?>
<link rel="stylesheet" href="css/meetThePeople.css">
<body>
<?php
$user =$_SESSION['user'];
?>
<nav class="navbar navbar-expand-lg navbar-dark py-3" id="blackNav">
    <a class="navbar-brand" href="post">
        <h1 class="display-4 ml-md-5 ml-2 font-weight-bold" id="brandName">
            Mecvise
            <span>
                    <img src="imgs/MecVise-logo.svg" alt="Mecvise logo" id="logo">
                </span>
        </h1>
    </a>

    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mt-3" id="navbarText">
        <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item" id="navButton">
                <a href="post" class="btn text-white btn-lg"><h3 class="font-weight-bold">Discussions</h3></a>
            </li>
            <li class="nav-item active">
                <a href="post/meetThePeople" class="btn text-white btn-lg">
                    <h3 class="font-weight-bold">Meet The People</h3>
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-search">
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
                    <button class="btn" type="button" id="compose-button">
                        <span><img src="imgs/edit.png" id="compose-icon" alt="compose thread"></span>
                    </button>
                </div>
            </li>

            <li class="nav-item">
                <div class="dropdown mr-lg-2 mr-0 mt-2">
                    <button class="btn" type="button" id="notification"
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
                    <button class="btn pr-lg-5 px-0 py-1" type="button" id="profile"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><img src="imgs/woman.png" class="rounded-circle" id="profile-pic" alt="account"></span>
                        <span class="text-muted d-none d-lg-inline"><?= $user->First_Name.' '.$user->Last_Name ?></span>
                    </button>
                    <div class="dropdown-menu text-center" aria-labelledby="notification">
                        <a class="dropdown-item" href="user/profile">Profile</a>
                        <a class="dropdown-item" href="user/logout">Log Out</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-item" id="chat">
                    <button class="btn px-lg-5 px-0 mx-2 py-0 py-lg-2 my-1 my-lg-0" type="button">
                        <span><img src="imgs/chat.svg" id="chat-icon" alt="chat icon"></span>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</nav>
<form method="POST" action="post/meetPeople">
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-4 mb-2">
            <select name="majorId" class="form-control" id="major">
                <option value="0">-Select a Major-</option>
                <?php foreach($data['majors'] as $major){ ?>
                    <option value="<?= $major->Major_id ?>"
                        <?= $data['majorId'] == $major->Major_id?'selected':''  ?>
                    ><?= $major->Major_Name ?></option>
                <?php } ?>
                <!--                <option>Civil Engineering</option>

                                <option>Architecture</option>
                                <option>Advertising & Marketing</option>
                                <option>Behavioural Psychology</option>-->
            </select>
        </div>

        <div class="col-12 col-md-4 mb-2">
            <select name="universityId" class="form-control" id="university">
                <option value="0">-Select a University-</option>
                <?php foreach($data['universities'] as $university){  ?>
                    <option value="<?= $university->Uni_ID ?>"
                    <?= $data['universityId'] == $university->Uni_ID?'selected':''  ?>
                    ><?= $university->University_Name ?></option>
                <?php } ?>

<!--                <option>American University of Beirut</option>
                <option>Lebanese American University</option>
                <option>University of Balamand</option>
                <option>Universite Saint-Joseph</option>-->
            </select>
        </div>

        <div class="col-12 col-md-4 mb-2">
            <select name="standing" class="form-control" id="level">
                <option value="">-Select an Academic Level-</option>
                <?php foreach (CommonValues::STANDINGS as $key=>$value){ ?>
                    <option value="<?= $key ?>"
                        <?= $data['standing'] == $key?'selected':''  ?>

                    ><?= $value ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-light btn-lg text-white" id="btn-search">
                Search
            </button>
        </div>
    </div>
</div>
</form>
<div class="container mt-5">
    <div class="lead text-muted font-weight-bold mb-2">
        Meet The Students, Alumni & Instructors
    </div>
    <div class="row">
        <?php foreach($data['users'] as $user){ ?>
            <div class="jumbotron bg-white p-3 col-12">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="col-12 text-center">
                            <img src="imgs/laura-chouette-R_9-LLP0OTE-unsplash.jpg" alt="profile picture" class="profile-pic">
                        </div>
                        <div class="col-12 text-center">
                            2280 pts
                        </div>
                    </div>
                    <div class="col-md-5 col-12 justify-content-start">
                        <div class="h2">
                            <?= $user->First_Name.' '.$user->Last_Name  ?>
                                <?php if($user->user_Type != 'prospective'){ ?>
                                    <span class="font-italic h5 text-muted ">
                                (<?= $user->user_Type == 'unistudent'?CommonValues::STANDINGS[$user->standing]:'Teacher' ?>)
                                    </span>
                                <?php } ?>
                        </div>
                        <div class="text-muted font-weight-bold mt-5 h5">
                            <?php if($user->user_Type == 'unistudent'){ ?>
                            <span><img src="imgs/graduation-hat.png" alt="level icon" class="level-icon"></span>
                            <?= $user->major_name ?>
                            <?php } ?>
                        </div>
                        <div class="text-muted font-italic mt-3 h5">
                            <?php if($user->user_Type == 'teacher') {
                                    echo $user->universities_names;
                                 }else if($user->user_Type == 'unistudent'){
                                    echo $user->university_name;
                                 }
                                ?>
                        </div>
                    </div>
                    <div class="col offset-md-1 offset-0 text-center">
                        <a href="user/profile/<?= $user->User_ID ?>" class="btn btn-outline-info col-12 w-75 mt-5">
                            View Profile
                        </a>
                        <a href="#" class="btn btn-info col-12 w-75 mt-3">
                            Chat
                        </a>
                    </div>

                </div>
            </div>
        <?php } ?>


<!--        <div class="jumbotron bg-white p-3 col-12">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="col-12 text-center">
                        <img src="imgs/irene-strong-v2aKnjMbP_k-unsplash.jpg" alt="profile picture" class="profile-pic">
                    </div>
                    <div class="col-12 text-center">
                        1560 pts
                    </div>
                </div>
                <div class="col-md-5 col-12 justify-content-start">
                    <div class="h2">
                        Joseph Sfeir <span class="text-muted h5 font-italic">(Sophomore)</span>
                    </div>
                    <div class="text-muted font-weight-bold mt-5 h5">
                        <span><img src="imgs/graduation-hat.png" alt="level icon" class="level-icon"></span>
                        Advertising & Marketing
                    </div>
                    <div class="text-muted font-italic mt-3 h5">
                        LAU
                    </div>
                </div>
                <div class="col offset-md-1 offset-0 text-center">
                    <a href="#" class="btn btn-outline-info col-12 w-75 mt-5">
                        View Profile
                    </a>
                    <a href="#" class="btn btn-info col-12 w-75 mt-3">
                        Chat
                    </a>
                </div>

            </div>
        </div>

        <div class="jumbotron bg-white p-3 col-12">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="col-12 text-center">
                        <img src="imgs/christina-wocintechchat-com-CtL3eP9ENyA-unsplash.jpg" alt="profile picture" class="profile-pic">
                    </div>
                    <div class="col-12 text-center">
                        780 pts
                    </div>
                </div>
                <div class="col-md-5 col-12 justify-content-start">
                    <div class="h2">
                        Dr. Theresa Khalil <span class="text-muted h5 font-italic">(Instructor)</span>
                    </div>
                    <div class="text-muted font-weight-bold mt-5 h5">
                        <span><img src="imgs/class.png" alt="level icon" class="level-icon"></span>
                        Behavioural Psychology
                    </div>
                    <div class="text-muted font-italic mt-3 h5">
                        AUB
                    </div>
                </div>
                <div class="col offset-md-1 offset-0 text-center">
                    <a href="#" class="btn btn-outline-info col-12 w-75 mt-5">
                        View Profile
                    </a>
                    <a href="#" class="btn btn-info col-12 w-75 mt-3">
                        Chat
                    </a>
                </div>

            </div>
        </div>-->
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
