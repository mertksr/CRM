<?php 
    require_once '../../netting/connect.php';
if (empty($_SESSION['kullanici']) && $_SESSION['kyetki'] != 2) {
    header("Location:../../../index.php?erisim=izinsiz");
}
?>
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="./index.html">
                        <img src=".././public/src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="./index.html" class="nav-link"> CORK </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">



            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'index') {  echo "active"; } ?>">
                <a href="index.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Randevular</span>
                    </div>
                       
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
            </li>
            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'islemler' || basename($_SERVER['PHP_SELF'], '.php') == 'islemekle') {  echo "active"; } ?>">
                <a href="islemler.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Bugün Yaptığım İşlemler</span>
                    </div>
                       
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
            </li>
            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'kasa') {  echo "active"; } ?>">
                <a href="kasa.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Kasa</span>
                    </div>
                       
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
            </li>
        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->