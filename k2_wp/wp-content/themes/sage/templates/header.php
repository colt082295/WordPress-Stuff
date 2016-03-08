<!--
<?php /*
            wp_nav_menu( array(
                'menu'              => 'primary_navigation',
                'theme_location'    => 'primary_navigation',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse navbar',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav pull-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        
      */  ?>
        -->
        
        
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <div class="pull-left search"><?php get_product_search_form(); ?></div>
            <?php wp_nav_menu( array(
                'menu'              => 'primary_navigation',
                'theme_location' => 'primary_navigation',
                'depth'          => 2,
                'container'      => false,
                'menu_class'     => 'nav navbar-nav pull-right',
                'walker'         => new wp_bootstrap_navwalker(),
                'fallback_cb'    => 'wp_bootstrap_navwalker::fallback'
                )
            ); ?>
        </div>


<!--
<nav class="navbar navbar-default" role="navigation"> 
  <div class="container-fluid"> 
    <div class="navbar-header"> 
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
    <span class="sr-only">Toggle navigation</span> 
    <span class="icon-bar"></span> 
    <span class="icon-bar"></span> 
    <span class="icon-bar"></span> 
    </button> 
    <a class="navbar-brand" href="tel:1-832-382-3434" rel="nofollow">(832) 382-3434</a> 
    </div> <div id="navbar" class="collapse navbar-collapse"> 
    ul class="nav navbar-nav navbar-right"> 
    <li>
      <a href="http://www.k2svc.com/">Home</a>
    </li> 
    <li class="dropdown"> 
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pumps 
      <span class="caret"></span>
    </a> 
    <ul class="dropdown-menu" role="menu"> 
    <li>
      <a href="http://www.k2svc.com/pumps/wilo-pumps">Wilo Pumps</a>
    </li>  
    </ul> 
    </li> 
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mechanical Seals <span class="caret"></span></a> <ul class="dropdown-menu" role="menu"> <li><a href="http://www.k2svc.com/mechanical-seals/aesseal">AES</a></li> <li><a href="http://www.k2svc.com/mechanical-seals/usseal">US Seal</a></li> <li><a href="http://www.k2svc.com/services/mechanical-seal-repair-rebuild-service">Mechanical Seal Repair</a></li> </ul> </li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Controls<span class="caret"></span></a> <ul class="dropdown-menu" role="menu"> <li><a href="http://www.k2svc.com/controls/primex">Primex Controls</a></li> <li><a href="#">Square D</a></li> <li><a href="http://www.k2svc.com/controls/best">BEST</a></li> <li><a href="http://www.k2svc.com/controls/vt-scada-hmi-telemetry-software-monitoring-control">VT Scada</a></li> <li><a href="http://www.k2svc.com/controls/arc-armour">Arc Armor</a></li> </ul> </li> <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a> <ul class="dropdown-menu" role="menu"> <li><a href="http://www.k2svc.com/services">Services</a></li> <li><a href="http://www.k2svc.com/services/equipment-pump-repair-service">Equipment Repair</a></li> <li><a href="http://www.k2svc.com/services/machining-service-shop">Machining</a></li> <li><a href="http://www.k2svc.com/services/mechanical-seal-repair-rebuild-service">Mechanical Seal Repair</a></li> <li><a href="http://www.k2svc.com/services/maintenance-contract-pump-seal-mechanical">Maintenance Contracts</a></li> </ul> </li> </ul> </div> <!--/.nav-collapse  </div> </nav>
    
    -->