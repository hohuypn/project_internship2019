<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
  </style>
  <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <!-- Custom Theme files -->
  <link href="public/asset/admin/css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <!--js-->
  <script src="public/asset/admin/js/jquery-2.1.1.min.js"></script> 
  <!--icons-css-->
  <link href="public/asset/admin/css/font-awesome.css" rel="stylesheet"> 
  <!--Google Fonts-->
  <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
  <!--static chart-->
  <script src="public/asset/admin/js/Chart.min.js"></script>
  <!--//charts-->
  <!-- geo chart -->
  <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <!-- <script>window.modernizr || document.write('<script src="public/asset/admin/js/lib/modernizr/modernizr-custom.js"><\/script>')</script> -->
  <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
  <!-- Chartinator  -->
  <script src="public/asset/admin/js/chartinator.js" ></script>

  <!--skycons-icons-->
  <script src="public/asset/admin/js/skycons.js"></script>
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>SHOPPY Việt Nam | Trang quản lý của người bán hàng</title>
  <link rel="icon" type="image/png" href="public/asset/customer/imagevd/logo.png">
  <link rel="stylesheet" type="text/css" href="public/asset/seller/css/profile.css">
  <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
  <meta charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="public/asset/seller/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css" media="screen">
  th{
    background-color: #e6f2ff;
  }
</style>
</head>
<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header"><a class="app-header__logo" href="index.html">Orange Seller</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <li class="app-search">
        <form method="post" action="index.php?controller=product&action=search&page=seller"  role="form">
        <input class="app-search__input"  type="search" name="prod_name" placeholder="Search">
        <button class="app-search__button"  type="submit" name="timkiem" ><i class="fa fa-search"></i></button>
        </form>
      </li>
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="index.php?controller=report&action=profile&page=seller"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="index.php?controller=user&action=getlogout&page=seller"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <a href="index.php?controller=report&action=profile&page=seller"><div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="public/asset/seller/images/cam.jpg" width="50px" alt="User Image">
      <div></a>
        <p class="app-sidebar__user-name">Hồ Thị Cam</p>
        <p class="app-sidebar__user-designation">Frontend Developer</p>
      </div>
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item active" href="index.php?controller=report&action=index&page=seller"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
      <li><a class="app-menu__item" href="index.php?controller=order&action=index&page=seller"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>

      <li><a class="app-menu__item" href="index.php?controller=product&action=index&page=seller"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Sản Phẩm Đã Đăng</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="index.php?controller=report&action=login&page=seller"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
          <li><a class="treeview-item" href="index.php?controller=report&action=calendar&page=seller"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
          <li><a class="treeview-item" href="index.php?controller=report&action=mail&page=seller"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
          <li><a class="treeview-item" href="index.php?controller=report&action=error&page=seller"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
        </ul>
      </li>
    </ul>
  </aside>
  <main class="app-content">
    <?php echo $content ?>
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="public/asset/seller/js/jquery-3.2.1.min.js"></script>
  <script src="public/asset/seller/js/popper.min.js"></script>
  <script src="public/asset/seller/js/bootstrap.min.js"></script>
  <script src="public/asset/seller/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="public/asset/seller/js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <script type="text/javascript" src="public/asset/seller/js/plugins/chart.js"></script>
  <!-- <script type="text/javascript" src="public/asset/seller/js/plugins/fullcalendar.min.js"></script> -->
  <script type="text/javascript">
    var data = {
     labels: ["January", "February", "March", "April", "May"],
     datasets: [
     {
       label: "My First dataset",
       fillColor: "rgba(220,220,220,0.2)",
       strokeColor: "rgba(220,220,220,1)",
       pointColor: "rgba(220,220,220,1)",
       pointStrokeColor: "#fff",
       pointHighlightFill: "#fff",
       pointHighlightStroke: "rgba(220,220,220,1)",
       data: [65, 59, 80, 81, 56]
     },
     {
       label: "My Second dataset",
       fillColor: "rgba(151,187,205,0.2)",
       strokeColor: "rgba(151,187,205,1)",
       pointColor: "rgba(151,187,205,1)",
       pointStrokeColor: "#fff",
       pointHighlightFill: "#fff",
       pointHighlightStroke: "rgba(151,187,205,1)",
       data: [28, 48, 40, 19, 86]
     }
     ]
   };
   var pdata = [
   {
    value: 300,
    color: "#46BFBD",
    highlight: "#5AD3D1",
    label: "Complete"
  },
  {
    value: 50,
    color:"#F7464A",
    highlight: "#FF5A5E",
    label: "In-Progress"
  }
  ]

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<!-- Google analytics script-->
<script type="text/javascript">
  if(document.location.hostname == 'pratikborsadiya.in') {
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
   ga('create', 'UA-72504830-1', 'auto');
   ga('send', 'pageview');
 }
</script>

</body>
<script src="public/asset/admin/js/profile.js"></script>
</html>