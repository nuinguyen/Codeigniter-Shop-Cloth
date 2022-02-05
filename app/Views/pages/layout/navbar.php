<nav>
    <div class="container">
        <div class="nav-inner">
            <!-- mobile-menu -->
            <div class="hidden-desktop" id="mobile-menu">
                <ul class="navmenu">
                    <li>
                        <div class="menutop">
                            <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                            <h2>Menu</h2>
                        </div>
                        <ul style="display:none;" class="submenu">
                            <li>
                                <ul class="topnav">
                                    <li class="level0 nav-6 level-top first parent"> <a class="level-top" href="/"> <span>Home</span> </a>
                                    </li>
                                    <li class="level0 nav-6 level-top first parent"> <a class="level-top" href="#"> <span>Pages</span> </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--navmenu-->
            </div>
            <!--End mobile-menu -->
            <ul id="nav" class="hidden-xs">
                <li id="nav-home" class="level0 parent drop-menu active">
                    <a href="/"><span>Home</span> </a>
                </li>
                <?php foreach ($category as $cate) : ?>
                <li class="level0 parent drop-menu"><a href="category/<?=$cate['category_id']?>"><span> <?= $cate['category_name'] ?></span> </a>
                </li>
                <?php endforeach; ?>

            </ul>
            <div id="form-search" class="search-bar">
                <form id="search_mini_form" action="#" method="get">
                    <input class="search-bar-input" placeholder="Search entire store here..." type="text" value="" name="search" id="search">
                    <input class="search-bar-submit" type="submit" value="">
                    <span class="search-icon"><img src="images/search-icon.png" alt="search-icon"></span>
                </form>
            </div>
        </div>
    </div>
</nav>