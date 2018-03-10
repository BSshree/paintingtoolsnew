<?php

use yii\widgets\Menu;

use yii\helpers\Html;

use yii\web\View;

?>

 <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/backend/web/themes/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ADMIN</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li> 
        <li class="active treeview">
          <ul class="treeview-menu">
            <li class="active"><a href="/webpanel/admin/receipt/create"><i class="fa fa-circle-o"></i> Create Receipt</a></li>
          </ul>
        </li>
      </ul><br>
       <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview">
          <ul class="treeview-menu">
            <li class="active"><a href="/webpanel/admin/faq/create"><i class="fa fa-circle-o"></i> FAQs</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
