<?php require APPROOT . '/views/inc/logged-in-header.php'; ?>
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
                <a href="meetThePeople.html" class="btn text-white btn-lg">
                    <h3 class="font-weight-bold">Meet The People</h3>
                </a>
            </li>
        </ul>
    </div>
</nav>    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-search">
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
                        <span class="text-muted d-none d-lg-inline">mecviseuser123</span>
                    </button>
                    <div class="dropdown-menu text-center" aria-labelledby="notification">
                        <a class="dropdown-item" href="profile.html">Profile</a>
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
</nav>-->
<div class="container pt-5">
    <div class="jumbotron bg-white p-0">
        <form method="POST" action="post/save">
            <div class="row">

                <div class="col-12">
                    <div class="" id="back-button">
                        <a href="post" class="p-3">
                            <span class="display-4 text-body">
                             <i class="far fa-arrow-alt-circle-left" style="font-size: 35px;"></i>
                            </span></a>
                    </div>
                    <div class="form-group mx-3 mt-4">
                        <label><h3>
                                <?= $data['isView']?'Details of ':($data['isEdit']?'Edit':'Create')?> Post </h3></label>
                        <?php if($data['isEdit']){?>
                            <input type="hidden" name="postId" value="<?= $data['post']->Post_ID ?>" />
                        <?php } ?>
                    </div>
                </div>
                    <div class="col-12">
                        <div class="form-group mx-3 mt-3 pb-3">
                            <label for="about"><h4 class="font-weight-bold">Post Title
                                </h4></label>
                            <?php if ($data['isView']){ ?>
                                <p><?= $data['post']->title ?></p>
                            <?php }else{ ?>
                                <input type="text" name="title" class="form-control" id="about" rows="3" placeholder="Post Title"
                                value="<?= $data['isEdit']?$data['post']->title:'' ?>"  />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mx-3 mt-3 ">
                            <label for="about"><h4 class="font-weight-bold">Body
                                </h4></label>
                            <?php if ($data['isView']){ ?>
                                <p><?= $data['post']->body?></p>
                            <?php }else{ ?>
                            <textarea name="body" class="form-control" id="about" rows="3" placeholder="Post Body"><?= $data['isEdit']?$data['post']->body:'' ?></textarea>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mx-3 mt-3 ">
                            <label for="about"><h4 class="font-weight-bold">Tags
                                </h4></label>
                            <?php if ($data['isView']){
                                $tags = explode(',',$data['post']->tags);
                                $tagsStr = '';
                                $i=0;
                                foreach($tags as $tag){
                                    $i++;
                                    $tagsStr .= CommonValues::TAGS[$tag];
                                    if($i != count($tags)){
                                        $tagsStr .=', ';
                                    }

                                }
                                ?>

                                <p><?= $tagsStr?></p>
                            <?php }else{
                                $tagsArr = $data['isEdit']?explode(',',$data['post']->tags):array();
                                ?>
                            <select class="form-control" id="tags" name="tags[]" multiple>
                                <option disabled>-Select Tags-</option>

                                <?php foreach(CommonValues::TAGS as $key=>$value){?>
                                    <option value="<?= $key ?>"
                                    <?= $data['isEdit'] && in_array($key,$tagsArr)?'selected':'' ?>
                                    ><?= $value ?></option>
                                <?php }?>
                            </select>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if (!$data['isView']){?>
                    <div class="col-12">
                        <div class="form-group mx-3 pb-3 float-right">
                            <button type="submit" class="btn btn-md btn-danger text-white " style="margin-left: ">
                                Submit
                            </button>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </form>
    </div>
</div>
</body>