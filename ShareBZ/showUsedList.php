<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  
<?php 
// login session 유지 
include ("./db_connect.php");
$connect = db_conn();
$member = member();

if(strcmp($member[airbnbID], "")){
$query= "select * from airbnbguest where user_id='$member[airbnbID]'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$airGInfo = mysqli_fetch_array($result);

$query="select * from airbnbhost where user_id='$airGInfo[used_hostID]'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$airHInfo = mysqli_fetch_array($result);
}

if(strcmp($member[uberID], "")){
$query= "select * from uberguest where user_id='$member[uberID]'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$uberGInfo = mysqli_fetch_array($result);

$query="select * from uberhost where user_id='$uberGInfo[used_hostid]'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$uberHInfo = mysqli_fetch_array($result);
}

if(strcmp($member[weworkID], "")){
$query= "select * from weworkguest where user_id='$member[weworkID]'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$wwGInfo = mysqli_fetch_array($result);

$query="select * from weworkhost where user_id='$wwGInfo[used_hostid]'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$wwHInfo = mysqli_fetch_array($result);
}

if(!$member[user_id]){?>
<script>location.href='./login.php'</script>
<?}?>
  
  <title>ShareBZ</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>Share<span>Bz</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <?php 
      // if login, display logout button
       if($member[user_id]){?>
       <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
      <?} // display login button 
      else {?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.php">Login</a></li>
        </ul>
      </div>
      <?}?>
    </header>
    <!--header end-->
     <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li>
            <a href="index.php">
              <i class="fa fa-desktop"></i>
              <span>Home</span>
              </a>
          </li>
          <li>	
            <a class="active" href="showUsedList.php">  <!--  class="active"가 현재 클릭한 menu임을 알려줌 -->
              <i class="fa fa-desktop"></i>
              <span>Using Platform Details</span>
              </a>
          </li>
          <li>
            <a href="serviced_platform.php">
              <i class="fa fa-desktop"></i>
              <span>Serviced Platform</span>
              </a>
          </li>
          <li>
            <a href="profile.php">
              <i class="fa fa-desktop"></i>
              <span>My Page</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!--Start main contents -->
    <!-- guest면 이용한 platform과 해당 host를 등록  /// host일 경우 제공하고 있는 platform과 아이디 등을 등록 하는 page 만들 것  다시 만들어야겠다; -->
    <?
      // guest일 경우 보여지는 page
     if($member[level] == 1){
    ?>
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Show 'Host List' that you used below platforms</h3>
        <br>
           <!-- 여기에 platform별 내용을 뿌려 줘야 함  -->
      
          <div class="form-panel">
          
          <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div > <!-- spotify 이미지를 airbnb로 바꿔야 함 -->
                    <img src="img/airbnb_logo.jpg" class="col-lg-10 col-md-10 col-sm-10">
                    <div class="col-xs-4 col-xs-offset-9">
                      <button class="btn btn-sm btn-clear-g" onclick="window.open('https://www.airbnb.co.kr/')">Details</button>
                    </div>
                    <div class="sp-title">
                      <h3>Airbnb</h3>
                    </div>
                  </div>
                  <p class="followers"><i class="fa fa-user"></i> 576,000 FOLLOWERS</p>
                </div>
          </div>
          
          <h4 class="mb"><i class="fa fa-angle-right"></i> Host Information List</h4>
              <div class="form-horizontal style-form">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Host Info
                  </label> 
                  <div class="col-sm-7"> <!-- 이 div에 id를 놓고 jQuery로 db에서 긁어와서 for문돌려서 밑에 html코드를 db에 맞는 수 만큼뿌려줘야함 -->
                    <div class="alert alert-success"><b>Host Name:</b> <?=$airHInfo[name]?>
                    <button id="airHost1" type="button" class="btn btn-primary btn-xs">Evaluation</button>
                    </div>
                    <div class="alert alert-info"><b>Lodging Address:</b><?=$airHInfo[lodging_addr]?></div>
                  </div>
                </div>
              </div>
          </div>
          
          <div class="form-panel">
          
          <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div> <!-- spotify 이미지를 airbnb로 바꿔야 함 -->
                  <br><br>
                  <img src="img/Uber_logo.png" class="col-lg-11 col-md-12 col-sm-12">
                    <div class="col-xs-8 col-xs-offset-9">
                    <!-- onclick="location.href='./aasdf.php'" << 사용 -->
                      <button class="btn btn-sm btn-clear-g" onclick="window.open('https://www.uber.com/kr/ko/')">Details</button>
                    </div>
                    <div class="sp-title">
                      <h3>Uber</h3>
                    </div>
                  </div>
                  <p class="followers"><i class="fa fa-user"></i> 576,000 FOLLOWERS</p>
                </div>
          </div>
          
          <h4 class="mb"><i class="fa fa-angle-right"></i> Host Information List</h4>
              <div class="form-horizontal style-form">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Host Info
                  </label> 
                  <div class="col-sm-7">
                    <div class="alert alert-success"><b>Host Name:</b> <?=$uberHInfo[name]?>
                    <button id="uberHost1" type="button" class="btn btn-primary btn-xs">Evaluation</button>
                    </div>
                    <div class="alert alert-info"><b>Country: </b> <?=$uberHInfo[country]?></div>
                    <div class="alert alert-info"><b>City   : </b> <?=$uberHInfo[city]?></div>
                  </div>
                </div>
              </div>
          </div>
          
           <div class="form-panel">
          
          <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div> <!-- spotify 이미지를 airbnb로 바꿔야 함 -->
                  <br><br><br>
                  <img src="img/wework_logo.png" class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xs-4 col-xs-offset-9">
                      <button class="btn btn-sm btn-clear-g" onclick="window.open('https://www.wework.com/ko-KR/')">Details</button>
                    </div>
                    <div class="sp-title">
                      <h3>WeWork</h3>
                    </div>
                  </div>
                  <p class="followers"><i class="fa fa-user"></i> 576,000 FOLLOWERS</p>
                </div>
          </div>
          
          <h4 class="mb"><i class="fa fa-angle-right"></i> Host Information List</h4>
              <div class="form-horizontal style-form">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Host Info
                  </label> 
                  <div class="col-sm-7">
                    <div class="alert alert-success"><b>Host Name:</b> <?=$wwHInfo[name]?>
                    <button id="workHost1" type="button" class="btn btn-primary btn-xs">Evaluation</button>
                    </div>
                    <div class="alert alert-info"><b>Building Name   :</b> <?=$wwHInfo[building_name]?></div>
                    <div class="alert alert-info"><b>Building Address:</b> <?=$wwHInfo[address]?></div>
                    <div class="alert alert-info"><b>Contract (phone):</b> <?=$wwHInfo[phone]?></div>
                  </div>
                </div>
              </div>
          </div>
         
      </section>
      <!-- /wrapper -->
    </section>
     <!--/showback -->
  </section>
    <?}?>
    
    <?
    // host일 경우 보여지는 page
     if($member[level] == 2){
    ?>
   
    <?}?>
</body>

<script>

$(document).ready(function(){

	// guest case임
	// 여기서 $mebmer[airbnbID]랑 airbnbGuest DB조회해서 사용한 airbnb의 hostid 를 찾고(array로), member DB를 조회해서 level이 2인것 중에
	// guest가 사용한 host id(array)를 가진놈이 있는지 확인해서 있으면 걔의 $memboer[no]-1로 이더리움 address를 가져올필요는없고 넘긴 php에서 이 hostid가지고 $member[no]
	// 가져와서 web3로 가져올 수 있음 
	// for문돌려서 host list들을 html코드로 뿌려주면 됨
	
	$("#airHost1").click(function(){
		location.href="./evaluateMember.php?platform=airbnb&hostid=<?=$airHInfo[user_id]?>";
	});
	
});

</script>

</html>