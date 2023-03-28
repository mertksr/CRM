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

            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'musteriler' || basename($_SERVER['PHP_SELF'], '.php') == 'musteriekle') {  echo "active"; } ?>">
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



            <li class="menu  <?php if (basename($_SERVER['PHP_SELF'], '.php') == 'islemler' || basename($_SERVER['PHP_SELF'], '.php') == 'islemekle') {  echo "active"; } ?>">
                <a href="islemler.php" class="dropdown-toggle">                    
                    <div class="">                        
                        <span>İşlemler(Sil)</span>
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



            <li class="menu">
                <a href="#elements" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>Elements</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="elements" data-bs-parent="#accordionExample">
                    <li>
                        <a href="./element-alerts.html"> Alerts </a>
                    </li>
                    <li>
                        <a href="./element-avatar.html"> Avatar </a>
                    </li>
                    <li>
                        <a href="./element-badges.html"> Badges </a>
                    </li>
                    <li>
                        <a href="./element-breadcrumbs.html"> Breadcrumbs </a>
                    </li>
                    <li>
                        <a href="./element-buttons.html"> Buttons </a>
                    </li>
                    <li>
                        <a href="./element-buttons-group.html"> Button Groups </a>
                    </li>
                    <li>
                        <a href="./element-color-library.html"> Color Library </a>
                    </li>
                    <li>
                        <a href="./element-dropdown.html"> Dropdown </a>
                    </li>
                    <li>
                        <a href="./element-infobox.html"> Infobox </a>
                    </li>
                    <li>
                        <a href="./element-loader.html"> Loader </a>
                    </li>
                    <li>
                        <a href="./element-pagination.html"> Pagination </a>
                    </li>
                    <li>
                        <a href="./element-popovers.html"> Popovers </a>
                    </li>
                    <li>
                        <a href="./element-progressbar.html"> Progress Bar </a>
                    </li>
                    <li>
                        <a href="./element-search.html"> Search </a>
                    </li>
                    <li>
                        <a href="./element-tooltips.html"> Tooltips </a>
                    </li>
                    <li>
                        <a href="./element-treeview.html"> Treeview </a>
                    </li>
                    <li>
                        <a href="./element-typography.html"> Typography </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span>TABLES AND FORMS</span></div>
            </li>

            <li class="menu">
                <a href="#tables" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>Tables</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="tables" data-bs-parent="#accordionExample">

                    <li>
                        <a href="./table-basic.html"> Tables </a>
                    </li>

                    <li class="sub-submenu dropend">
                        <a href="#datatable" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Datatable <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="datatable" data-bs-parent="#tables">
                            <li>
                                <a href="./table-datatable-basic.html"> Basic </a>
                            </li>
                            <li>
                                <a href="./table-datatable-striped-table.html"> Striped </a>
                            </li>
                            <li>
                                <a href="./table-datatable-custom.html"> Custom </a>
                            </li>
                            <li>
                                <a href="./table-datatable-miscellaneous.html"> Miscellaneous </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a href="#forms" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>Forms</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="forms" data-bs-parent="#accordionExample">
                    <li>
                        <a href="./form-bootstrap-basic.html"> Basic </a>
                    </li>
                    <li>
                        <a href="./form-input-group-basic.html"> Input Group </a>
                    </li>
                    <li>
                        <a href="./form-layouts.html"> Layouts </a>
                    </li>
                    <li>
                        <a href="./form-validation.html"> Validation </a>
                    </li>
                    <li>
                        <a href="./form-input-mask.html"> Input Mask </a>
                    </li>
                    <li>
                        <a href="./form-tom-select.html"> Tom Select </a>
                    </li>
                    <li>
                        <a href="./form-tagify.html"> Tagify </a>
                    </li>
                    <li>
                        <a href="./form-bootstrap-touchspin.html"> TouchSpin </a>
                    </li>
                    <li>
                        <a href="./form-maxlength.html"> Maxlength </a>
                    </li>
                    <li>
                        <a href="./form-checkbox.html"> Checkbox </a>
                    </li>
                    <li>
                        <a href="./form-radio.html"> Radio </a>
                    </li>
                    <li>
                        <a href="./form-switches.html"> Switches </a>
                    </li>
                    <li>
                        <a href="./form-wizard.html"> Wizards </a>
                    </li>
                    <li>
                        <a href="./form-fileupload.html"> File Upload </a>
                    </li>
                    <li>
                        <a href="./form-quill.html"> Quill Editor </a>
                    </li>
                    <li>
                        <a href="./form-markdown.html"> Markdown Editor </a>
                    </li>
                    <li>
                        <a href="./form-date-time-picker.html"> Date Time Picker </a>
                    </li>
                    <li>
                        <a href="./form-slider.html"> Slider </a>
                    </li>
                    <li>
                        <a href="./form-clipboard.html"> Clipboard </a>
                    </li>
                    <li>
                        <a href="./form-autoComplete.html"> Auto Complete </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#pages" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span>Pages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="pages" data-bs-parent="#accordionExample">
                    <li>
                        <a href="./pages-knowledge-base.html"> Knowledge Base </a>
                    </li>
                    <li>
                        <a href="./pages-faq.html"> FAQ </a>
                    </li>
                    <li>
                        <a href="./pages-contact-us.html"> Contact Form </a>
                    </li>
                    <li>
                        <a href="./user-profile.html"> Users </a>
                    </li>
                    <li>
                        <a href="./user-account-settings.html"> Account Settings </a>
                    </li>
                    <li>
                        <a href="./pages-error404.html" target="_blank"> Error </a>
                    </li>
                    <li>
                        <a href="./pages-maintenence.html" target="_blank"> Maintanence </a>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="#login" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Sign In <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="login" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="./auth-boxed-signin.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="./auth-cover-signin.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="#signup" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Sign Up <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="signup" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="./auth-boxed-signup.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="./auth-cover-signup.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="#unlock" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Unlock <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="unlock" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="./auth-boxed-lockscreen.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="./auth-cover-lockscreen.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="#reset" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Reset <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="reset" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="./auth-boxed-password-reset.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="./auth-cover-password-reset.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="#twoStep" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Two Step <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="twoStep" data-bs-parent="#pages">
                            <li>
                                <a target="_blank" href="./auth-boxed-2-step-verification.html"> Boxed </a>
                            </li>
                            <li>
                                <a target="_blank" href="./auth-cover-2-step-verification.html"> Cover </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#more" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                        <span>More</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="more" data-bs-parent="#accordionExample">

                    <li>
                        <a href="./map-leaflet.html"> Maps </a>
                    </li>
                    <li>
                        <a href="./charts-apex.html"> Charts </a>
                    </li>
                    <li>
                        <a href="./widgets.html"> Widgets </a>
                    </li>
                    <li class="sub-submenu dropend">
                        <a href="#layouts" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Layouts <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="layouts" data-bs-parent="#more">
                            <li>
                                <a href="./layout-blank-page.html"> Blank Page </a>
                            </li>
                            <li>
                                <a href="./layout-empty.html"> Empty Page </a>
                            </li>
                            <li>
                                <a href="./layout-full-width.html"> Full Width </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a target="_blank" href="../../documentation/index.html"> Documentation </a>
                    </li>
                    <li>
                        <a target="_blank" href="../../documentation/changelog.html"> Changelog </a>
                    </li>

                </ul>
            </li>

        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->