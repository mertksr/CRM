<?php 
    require_once '../netting/connect.php';
if (empty($_SESSION['kullanici'])) {
    header("Location:../index.php?erisim=izinsiz");
}
?>
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="./index.html">
                        <img src="../public/src/assets/img/logo.svg" class="navbar-logo" alt="logo">
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
            <li class="menu <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'index') {  echo "active"; } ?>">
                <a href="index.php" class="dropdown-toggle">
                    <div class="">
                        <span>Ana Sayfa</span>
                    </div>

                </a>
            </li>

            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'musteriler' || basename($_SERVER['PHP_SELF'], '.php') == 'musteriekle'|| basename($_SERVER['PHP_SELF'], '.php') == 'musteriduzenle') {  echo "active"; } ?>">
                <a href="musteriler.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span> Müşteriler</span>
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

            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'randevular' || basename($_SERVER['PHP_SELF'], '.php') == 'randevuekle'|| basename($_SERVER['PHP_SELF'], '.php') == 'mrandevular' || basename($_SERVER['PHP_SELF'], '.php') == 'randevuduzenle') {  echo "active"; } ?>">
                <a href="randevular.php" class="dropdown-toggle">                    
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

            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'satislar' || basename($_SERVER['PHP_SELF'], '.php') == 'satisekle') {  echo "active"; } ?>">
                <a href="satislar.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Satışlar</span>
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
                        <span>Servis</span>
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


            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'muhasebe') {  echo "active"; } ?>">
                <a href="muhasebe.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Muhasebe</span>
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
            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'veresiye') {  echo "active"; } ?>">
                <a href="veresiye.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Veresiye</span>
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

            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'urunler' || basename($_SERVER['PHP_SELF'], '.php') == 'urunekle') {  echo "active"; } ?>">
                <a href="urunler.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>Ürünler</span>
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