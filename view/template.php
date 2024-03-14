<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>

<body>

    <section class="top-nav">
        <a href="index.php?action=acceuil">  
            <div class="logo">
                <!-- code SVG ici -->
                <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_15_23" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="23">
                        <path d="M24 0H0V23H24V0Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask0_15_23)">
                        <path d="M2.34926 10.0859C2.25179 9.73736 2.25177 9.37038 2.34922 9.02184C2.44667 8.6733 2.63815 8.35548 2.9044 8.10034L8.45257 2.78335C8.7188 2.52819 9.05044 2.34469 9.41413 2.2513C9.77783 2.15791 10.1608 2.15792 10.5245 2.25134L15.7162 3.58449C15.7702 2.90288 16.0178 2.24842 16.4322 1.692L10.1792 0.0864884C9.73036 -0.0287505 9.2578 -0.0287482 8.80898 0.086496C8.36016 0.201741 7.9509 0.428167 7.62233 0.743019L0.775488 7.30457C0.446946 7.61946 0.210676 8.01166 0.0904219 8.44178C-0.0298328 8.8719 -0.0298354 9.32478 0.090414 9.75489L1.83018 15.9772C2.39892 15.561 3.07604 15.3025 3.78763 15.23L2.34926 10.0859Z" fill="#18CDCA"/>
                        <path d="M20.1649 7.59813L21.6513 12.9141C21.7488 13.2627 21.7487 13.6297 21.6513 13.9782C21.5538 14.3268 21.3623 14.6445 21.096 14.8997L15.5479 20.2168C15.2816 20.472 14.95 20.6554 14.5863 20.7488C14.2227 20.8421 13.8396 20.8421 13.476 20.7488L8.10828 19.3704C8.03265 20.0524 7.76293 20.7013 7.32855 21.2463L13.8214 22.9135C14.2702 23.0288 14.7428 23.0288 15.1915 22.9135C15.6404 22.7983 16.0496 22.5719 16.3783 22.257L23.2251 15.6955C23.5537 15.3805 23.7899 14.9884 23.9102 14.5582C24.0305 14.1281 24.0305 13.6752 23.9102 13.2451L22.1048 6.78989C21.5481 7.22534 20.8768 7.50503 20.1649 7.59813Z" fill="#18CDCA"/>
                        <path d="M1.98622 16.8353C1.54649 17.2567 1.24703 17.7937 1.12571 18.3781C1.00439 18.9626 1.06665 19.5685 1.30463 20.1191C1.5426 20.6696 1.9456 21.1402 2.46264 21.4713C2.9797 21.8024 3.58759 21.9792 4.20945 21.9792C4.83131 21.9792 5.4392 21.8024 5.95625 21.4713C6.47331 21.1402 6.87631 20.6696 7.11428 20.1191C7.35226 19.5685 7.41451 18.9626 7.29319 18.3781C7.17187 17.7937 6.87242 17.2567 6.43269 16.8353C5.84259 16.2711 5.04304 15.9542 4.20945 15.9542C3.37587 15.9542 2.57631 16.2711 1.98622 16.8353Z" fill="#4F80E1"/>
                        <path d="M17.4048 1.74803C16.9652 2.16942 16.6656 2.70631 16.5444 3.29082C16.423 3.8753 16.4853 4.48115 16.7233 5.03174C16.9612 5.58232 17.3642 6.05292 17.8812 6.384C18.3983 6.7151 19.0062 6.89182 19.628 6.89182C20.2499 6.89182 20.8578 6.7151 21.3749 6.384C21.8919 6.05292 22.2949 5.58232 22.5328 5.03174C22.7708 4.48115 22.8331 3.8753 22.7117 3.29082C22.5905 2.70631 22.291 2.16942 21.8513 1.74803C21.2613 1.18379 20.4616 0.866913 19.628 0.866913C18.7945 0.866913 17.9948 1.18379 17.4048 1.74803Z" fill="#4F80E1"/>
                        <path d="M13.8457 19.4872C13.7195 19.4872 13.5938 19.4713 13.4718 19.44L8.55835 18.1782C8.39452 17.3398 7.97006 16.5683 7.34067 15.9652C6.71127 15.3621 5.90632 14.9552 5.03143 14.7983L3.71492 10.0899C3.64965 9.85504 3.64984 9.60788 3.71548 9.37313C3.78112 9.13837 3.90991 8.92424 4.08896 8.75212L9.13211 3.91898C9.3115 3.74705 9.53495 3.62342 9.78001 3.56049C10.0251 3.49757 10.2831 3.49758 10.5282 3.56052L15.3039 4.78687C15.4933 5.62012 15.9409 6.37911 16.5881 6.96443C17.2353 7.54975 18.0519 7.93411 18.9308 8.06715L20.2848 12.9109C20.35 13.1458 20.3499 13.393 20.2842 13.6277C20.2185 13.8625 20.0898 14.0766 19.9106 14.2488L14.8675 19.0818C14.7337 19.2107 14.5743 19.313 14.3989 19.3825C14.2236 19.4521 14.0356 19.4877 13.8457 19.4872Z" fill="#4F80E1"/>
                    </g>
                </svg>
            </div>
        </a>    
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
        <ul class="menu">
            <li><a href="index.php?action=listFilms">Films</a></li>
            <li><a href="index.php?action=listActeurs">Acteurs</a></li>
            <li><a href="index.php?action=new">Nouveau</a></li>
            <li><a href="index.php?action=listRealisateur">Realisateur</a></li>
            <li><a href="index.php?action=listGenre">Genre</a></li>
            <li><a href="index.php?action=listeRole">Rôles</a></li>
            <li><a href="index.php?action=ajoutPersonneForm">Ajouter acteur/réalisateur</a></li>

        </ul>
    </section>

    

    
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">
                <?= $contenu ?>
            </div>
        </main>
    </div>


    


<footer>
    <h1>SUIVEZ-NOUS</h1>
    <div class="icon-reseauSoc">
        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7109 0C16.3125 0 18 1.5 18 3.81251V12.1875C18 14.5 16.3125 16 13.7109 16H4.28907C1.6875 16 0 14.5 0 12.1875V3.81251C0 1.5 1.6875 0 4.28907 0H13.7109Z" fill="url(#paint0_linear_22_149)"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.41579 15.9208V9.72368H7.15086V7.49513H9.41579V5.86102C9.41579 5.86102 9.25286 2.46436 12.5598 2.46436H15.2348V4.73492H13.5679C13.5679 4.73492 12.3412 4.67574 12.3279 5.80113V7.49513H15.0245L14.6356 9.72368H12.3012V16H9.41579V15.9208Z" fill="white"/>
            <defs>
            <linearGradient id="paint0_linear_22_149" x1="0" y1="0" x2="0" y2="16" gradientUnits="userSpaceOnUse">
            <stop stop-color="#6387D3"/>
            <stop offset="1" stop-color="#2D4A86"/>
            </linearGradient>
            </defs>
        </svg>
        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7109 0C16.3125 0 18 1.5 18 3.81251V12.1875C18 14.5 16.3125 16 13.7109 16H4.28907C1.6875 16 0 14.5 0 12.1875V3.81251C0 1.5 1.6875 0 4.28907 0H13.7109Z" fill="#1DA1F2"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.00155 4.10953C4.00155 4.10953 6.0441 6.36633 9.1557 6.50207C9.1557 6.50207 8.5206 5.00527 10.4191 3.97927C10.4191 3.97927 11.9616 3.17393 13.4502 4.47793C13.4502 4.47793 14.1216 4.449 14.9309 3.92007C14.9309 3.92007 15.0499 4.40673 13.9947 5.18953C13.9947 5.18953 14.5818 5.14727 15.2482 4.75927C15.2482 4.75927 15.1213 5.42927 14.0343 5.91593C14.0343 5.91593 14.365 11.217 8.5452 12.3773C8.5452 12.3773 5.4675 12.9946 3.3 11.4831C3.3 11.4831 5.5992 11.6959 6.82065 10.557C6.82065 10.557 5.28795 10.6847 4.53345 9.0774C4.53345 9.0774 5.2998 9.19447 5.6112 8.971C5.6112 8.971 3.9945 8.98153 3.63525 6.8314C3.63525 6.8314 4.2939 7.1294 4.725 7.0762C4.725 7.0762 2.89485 6.0714 4.00155 4.10953Z" fill="white"/>
        </svg>
        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7109 0C16.3125 0 18 1.5 18 3.81251V12.1875C18 14.5 16.3125 16 13.7109 16H4.28907C1.6875 16 0 14.5 0 12.1875V3.81251C0 1.5 1.6875 0 4.28907 0H13.7109Z" fill="url(#paint0_linear_22_141)"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1566 8.71839L14.7419 4.55526L3.262 4.53333L7.85073 8.71713C8.48623 9.29655 9.51889 9.29738 10.1566 8.71839ZM14.9624 4.78326V11.1018L11.4756 7.94145L14.9624 4.78326ZM3 4.79999V11.1185L6.48675 7.95818L3 4.79999ZM10.2376 9.06946L11.1804 8.21829L14.5522 11.3307H8.98227H3.41236L6.78027 8.21829L7.72693 9.06946C7.72693 9.06946 8.20456 9.48821 8.98227 9.4967C9.75997 9.48821 10.2376 9.06946 10.2376 9.06946Z" fill="white"/>
            <defs>
            <linearGradient id="paint0_linear_22_141" x1="0" y1="0" x2="0" y2="16" gradientUnits="userSpaceOnUse">
            <stop stop-color="#1D62F0"/>
            <stop offset="1" stop-color="#19D5FD"/>
            </linearGradient>
            </defs>
        </svg>
        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9492 17C16.4062 17 18 15.5 18 13.1875V4.81251C18 2.5 16.4062 1 13.9492 1H5.05079C2.59375 1 1 2.5 1 4.81251V13.1875C1 15.5 2.59375 17 5.05079 17H13.9492Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9492 17C16.4062 17 18 15.5 18 13.1875V4.81251C18 2.5 16.4062 0.999999 13.9492 0.999999H5.05079C2.59375 0.999999 1 2.5 1 4.81251V13.1875C1 15.5 2.59375 17 5.05079 17H13.9492Z" stroke="#A4A4A4" stroke-width="0.5"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.22499 10.7333L11.7608 8.46107L12.1449 9.61354L8.22499 10.7333Z" fill="#E9E9E9"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.94387 13.1293C4.94387 13.1293 6.5199 13.2667 9.56085 13.2667C12.6018 13.2667 14.0449 13.1293 14.0449 13.1293C14.0449 13.1293 15.1509 13.0932 15.5833 12.3155C15.5833 12.3155 16.0155 11.7512 16.0155 9C16.0155 9 16.0416 7.29678 15.8368 6.39129C15.6319 5.48584 15.1796 5.22138 15.1796 5.22138C15.1796 5.22138 14.8893 4.95695 14.2492 4.88485C13.609 4.81272 11.5333 4.73333 9.56085 4.73333C9.56085 4.73333 5.94988 4.73526 4.73357 4.924C3.51726 5.11272 3.3464 6.17908 3.3464 6.17908C3.3464 6.17908 2.84825 8.8785 3.3464 11.8179C3.3464 11.8179 3.49059 12.992 4.94387 13.1293ZM11.7667 9.06666L8.225 7.4V10.7333L11.7667 9.06666Z" fill="url(#paint0_linear_22_123)"/>
            <defs>
            <linearGradient id="paint0_linear_22_123" x1="3.125" y1="13.2667" x2="3.125" y2="4.73333" gradientUnits="userSpaceOnUse">
            <stop stop-color="#E72B22"/>
            <stop offset="1" stop-color="#DD2A22"/>
            </linearGradient>
            </defs>
        </svg>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="public/js/script.js"></script>
</body>
</html>