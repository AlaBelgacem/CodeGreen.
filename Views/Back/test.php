<HTML>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Products
  </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Project</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">



      <li class="nav-item">
          <a class="nav-link text-white active " href="AfficherCategorieAd.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Category Management</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary " href="AfficherProduitsAd.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Product Managment</span>
          </a>
        </li>


      
     </ul>
    </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Project</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Product managment</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Product managment</h6>
        </nav>
        
           
           
           
          
          
    </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product table</h6>
              </div>
              
            </div>
            <div>
              <h5 style="padding-top : 10px"><a href="AjouterProduitsAd.php" id="AjouterProduits" 
              style="background-color : pink; border-radius : 0.45rem;">Add product</a></h5>
            </div>
            <div class="container my-2">
         
         <span><a href="SortProduitsAd.php" style="margin-right : 10px; background-color: white;color: black;" id="Sort"><i class="bi bi-search fa-lg"></i></a></span>
              <input class="col-10" type="text" name="AfficherClasse" onkeyup="myFunction2()" placeholder="Search for a product name" id="myInput2">
                      <a onclick="window.print();" class="btn btn-primary" style=" margin-left : 30px; margin-top : 10px;" id="print-btn">Print</a>
                    
        </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <form id="contact" action="" method="post" name='registration'>
              <table class="table align-items-center mb-0" id="mytable2" name="TableauProduits">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Quantity</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <?php
                    include "../../Model/articles.php";

                    include_once "../../config.php";
                    include_once "../../Controller/articleC.php";

                    if (isset($_GET['IdArticle'])){
	                    $ArtC=new articleC();
                        $result=$ArtC->getArticleById($_GET["IdArticle"]);
	                    foreach($result as $row){       
                      
                    ?>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                        <input value="<?= $row['IdArticle']?>" type="text" tabindex="1" name="IdArticle" id="IdArticle" readonly>
                          <div class="d-flex flex-column justify-content-center">
                          </div>
                        </div>
                      </td>
                      <td>
                      <input value="<?= $row['IdCategorie']?>" type="text" tabindex="2" name="IdCategorie" id="IdCategorie" readonly >
                      </td>
                      <td class="align-middle text-center text-sm">
                      <input value="<?= $row['NomArticle']?>" type="text"  tabindex="3" name="NomArticle" id="NomArticle" >

                      </td>
                      <td class="align-middle text-center">
                      <input value="<?= $row['ImageArticle']?>" type="text" tabindex="4" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" >
                      </td>
                      <td class="align-middle text-center">
                      <input value="<?= $row['DescriptionArticle']?>" tabindex="5" name="Description" id="Description" >
                      </td>
                      <td class="align-middle text-center">
                      <input value="<?= $row['PrixArticle']?>" type="number" tabindex="6" name="PrixArticle" id="PrixArticle"  min="5" max="100" oninput="validity.valid||(value='')" >
                      </td>
                      <td class="align-middle text-center">
                      <input value="<?= $row['QuantiteArticle']?>" type="number" tabindex="7" name="QuantiteArticle" id="QuantiteArticle"  min="15" max="100" oninput="validity.valid||(value='')" >
                      </td>
                      <td class="align-middle">
                      <button name="modifier" type="submit" id="contact-submit" class="btn btn-warning" style=" border-color :#ff0059 ;background: #ff0059;" >Submit</button>
                      </td>
                      <td class="align-middle">
                      <button href="AfficherProduitsAd.php" class="btn btn-warning" style=" border-color :#ff0059; background: #ff0059;">Cancel</button>
                      </td>
                    </tr>
                    
                  </tbody>
                  <?php }
                }
                if (isset($_POST['modifier'])){
                    $Art=new articles($_POST['IdCategorie'],$_POST['NomArticle'],$_POST['ImageArticle'],$_POST['Description'],$_POST['PrixArticle'],$_POST['QuantiteArticle']);
                    $ArtC-> UpdateArticle($Art,$_POST['IdArticle']);
                    
                    header('refresh:1 ;url=AfficherProduitsAd.php');
                }
                ?>
                </table>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="piechart" style="width: 900px; height: 500px;"  ></div>

    </div>

  </main>
  <div class="fixed-plugin">
    
    <div class="card shadow-lg">
    
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>

<!-- print-->
<link rel="stylesheet" type="text/css" href="print.css" media="print"/>

  <script>
id="mytable2"
function myFunction2() {
var input, filter, table, tr, td, i,j, txtValue;
input = document.getElementById("myInput2");
filter = input.value.toUpperCase();
table = document.getElementById("mytable2");
tr = table.getElementsByTagName("tr");
//   alert(td.length);
    for (i = 0; i < tr.length; i++) {
        td= tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

}
}
</script>


  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</HTML>