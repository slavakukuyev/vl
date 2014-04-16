        

<div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">                    
                    <li class="nav-header">Sidebar</li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>                    
                    <li class="nav-header">Categories</li>
                    <li><a href="<?=base_url()?>main?popular=1"><b>Popular</b></a></li>
                    
                    <li <?php if (!$this->session->userdata('isLoggedIn')) { ?>class="hidden"<?php } ?>><a href="<?=base_url()?>main?recommended=1"><b>Recommended</b></a></li>
                    
                    <li><a href="<?=base_url()?>main?new=9"><b>New added movies</b></a></li>
                    <li><div class="btn-group">
  <a class="btn dropddown-toggle" data-toggle="dropdown" href="#" style="max-height:100px;">
   Category
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >
    <!-- dropdown menu links -->
     <?php
                     foreach ($categories as $c) {
                         echo '<li><a href="'.  base_url().'main?category='.$c->name .'">' . $c->name . '</a></li>';
                     }
                    ?>        
  </ul>
</div></li>         
                    <li class="nav-header">Sidebar</li>
                    
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->


