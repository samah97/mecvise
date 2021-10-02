<?php require APPROOT . '/views/inc/logged-in-header.php'; ?>
<link rel="stylesheet" href="css/discussions.css">
<body>
<?php
$user =$_SESSION['user'];
?>
<nav class="navbar navbar-expand-lg navbar-dark py-3" id="blackNav">
    <a class="navbar-brand" href="discussions.html">
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
                    <a href="post/create"  class="btn" type="button" id="compose-button">
                        <span><img src="imgs/edit.png" id="compose-icon" alt="compose thread"></span>
                    </a>
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
                        <span class="text-muted d-none d-lg-inline"><?= $user->First_Name . ' ' . $user->Last_Name ?></span>
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
<div class="top-universities-div">
    <div class="tud-title">
        <label >Top Ranked Universities</label>
    </div>
    <div class="tud-data">
        <?php for($i=0;$i<count($data['topUniversities']);$i++){
            $university = $data['topUniversities'][$i];
            ?>
            <div class="tud-element <?= (($i%2) == 0)?"bg-grey":"bg-white" ?>"
            onclick="window.open('<?= $university->website ?>','_blank')">
                    <label><?= $university->Acronym ?> </label>
            </div>
        <?php } ?>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
<!--        <div class="col-12 col-md-4 mb-2">
            <select class="form-control" id="major">
                <option class="font-italic">-Topics-</option>
                <option>Management Information Systems</option>
                <option>Civil Engineering</option>
                <option>Architecture</option>
                <option>Advertising & Marketing</option>
                <option>Behavioural Psychology</option>
            </select>
        </div>-->

        <div class="col-12 col-md-4 mb-2">
            <select class="form-control" id="latest-topic" onchange="changeLatestTopic()">
                <option class="font-italic">-Latest Topics-</option>
                <?php for($i = 0;$i<5 && $i<count($data['posts']);$i++){
                    $post = $data['posts'][$i];
                    ?>
                <option value="<?= $post->Post_ID ?>"><?= $post->title ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-12 col-md-4 mb-2">
            <select class="form-control" id="filter-tag" onchange="filterTag()">
                <option class="font-italic" disabled>-Tags-</option>
                <option class="font-italic" value="">All Tags</option>
                <?php foreach(CommonValues::TAGS as $key=>$value){
                    $filteredTag = isset($_GET['tag'])?$_GET['tag']:'';
                    ?>
                <option value="<?= $key ?>"
                <?= $filteredTag == $key?'selected':'' ?>><?= $value ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="forum-title">
                <div class="pull-right forum-desc">
                    <samll>Total posts: <?= number_format(count($data['posts'])) ?></samll>
                </div>
                <h3>Topics</h3>
            </div>
        </div>
        <div class="jumbotron col-12 py-0 pb-3 pinned">
            <div class="row">
                <div class="col-6 mt-5">
                    <div class="lead font-weight-bold h2">
                            <span><img src="imgs/paper-push-pin.png" alt="pinned message" id="pin">
                            </span>
                        Welcome New Users! Please Read Before Posting!
                    </div>

                    <div class="lead mt-3">
                        <p>Congratulations on becoming part of our Mecvise community! <br>
                            Before you make a new post or topic, please read the comunity guidelines.</p>
                    </div>
                </div>
                <div class="col-3 offset-3">
                    <div class="forum-item active">
                        <div class="row mt-5 pt-4">
                            <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        125K
                                    </span>
                                <div class="text-center">
                                    <small class="font-weight-bold">Likes</small>
                                </div>
                            </div>
                            <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        200
                                    </span>
                                <div class="text-center">
                                    <small class="font-weight-bolder">Replies</small>
                                </div>
                            </div>
                            <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        140
                                    </span>
                                <div>
                                    <small class="font-weight-bolder text-center">Views</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php foreach($data['posts'] as $post){?>
            <div class="jumbotron col-12 py-0 pb-3 bg-white" style="cursor:pointer;" onclick="javascript:window.location.href='<?= URLROOT?>post/create/<?= $post->Post_ID ?>'">
                <div class="row">
                    <div class="col-6 mt-5">
                        <div class="lead font-weight-bold h2">
                            <?= $post->title?>
                        </div>

                        <div class="lead mt-3">
                            <?php
                                $tags = explode(',',$post->tags);
                                $i=0;
                                foreach ($tags as $tag){
                                    if($i++ == count(CommonValues::TAGS)){
                                        $i = 0;
                                    }
                            ?>
                            <span class="badge badge-pill badge-<?= CommonValues::TAGS_COLORS[$i]?>"><?= CommonValues::TAGS[$tag] ?></span>
                            <!--<span class="badge badge-pill badge-primary">IT</span>-->
                             <?php } ?>
                        </div>
                    </div>
                    <div class="col-3 offset-3">
                        <div class="forum-item active">
                            <div class="row mt-4 pt-4">
                                <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        125K
                                    </span>
                                    <div class="text-center">
                                        <small class="font-weight-bold">Likes</small>
                                    </div>
                                </div>
                                <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        200
                                    </span>
                                    <div class="text-center">
                                        <small class="font-weight-bolder">Replies</small>
                                    </div>
                                </div>
                                <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        140
                                    </span>
                                    <div>
                                        <small class="font-weight-bolder text-center">Views</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php }?>


        <!--<div class="jumbotron col-12 py-0 pb-3 bg-white">
            <div class="row">
                <div class="col-6 mt-5">
                    <div class="lead font-weight-bold h2">
                        I am in my third year of medicine but I don't like it, should I change majors?
                    </div>

                    <div class="lead mt-3">
                        <span class="badge badge-pill badge-secondary">Med</span>
                        <span class="badge badge-pill badge-warning">Change</span>
                        <span class="badge badge-pill badge-danger">Doctor</span>
                    </div>
                </div>
                <div class="col-3 offset-3">
                    <div class="forum-item active">
                        <div class="row mt-5 pt-4">
                            <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        125K
                                    </span>
                                <div class="text-center">
                                    <small class="font-weight-bold">Likes</small>
                                </div>
                            </div>
                            <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        200
                                    </span>
                                <div class="text-center">
                                    <small class="font-weight-bolder">Replies</small>
                                </div>
                            </div>
                            <div class="col forum-info text-center">
                                    <span class="font-weight-bolder points">
                                        140
                                    </span>
                                <div>
                                    <small class="font-weight-bolder text-center">Views</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>-->

    </div>
</div>
</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>