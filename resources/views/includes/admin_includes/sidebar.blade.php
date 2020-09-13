  <!--sidebar start-->
  <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ route('admin_dashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>

          <li>
            <a class="" href="{{ route('admin.profile') }}">
                          <i class="icon_profile"></i>
                          <span>Profile</span>
                      </a>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_profile"></i>
                          <span>Admin/Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('users.index') }}">All Admins/Users</a></li>
              <li><a class="" href="{{ route('users.create') }}">Add Admin/Users</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Dishes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('dishes.index') }}">All Dishes</a></li>
              <li><a class="" href="{{ route('dishes.create') }}">Add Dishes</a></li>
              <li><a class="" href="{{ url('dishes/deleted') }}">Trashed Dishes</a></li>

            </ul>
          </li>


          <li>
            <a class="" href="{{ route('categories.index')}}"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           route('category.index') }}">
                          <i class="icon_genius"></i>
                          <span>Category</span>
                      </a>
          </li>

          <li>
            <a class="" href="{{ route('medias.index')}}"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           route('category.index') }}">
                          <i class="icon_desktop"></i>
                          <span>Media</span>
                      </a>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Reservations</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="">All Reservations</a></li>
              <li><a class="" href="">Cancelled</a></li>
            </ul>
          </li>

          
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Orders</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ Route('admin_orders.index') }}">All Orders</a></li>
              <li><a class="" href="{{ Route('admin_deleted_orders.index') }}">Trashed</a></li>

            </ul>
          </li>

          <li>
            <a class="" href="{{ route('admin_contact.index') }}">
                          <i class="icon_genius"></i>
                          <span>Contacts</span>
                      </a>
          </li>


          <li>
            <a class="" href="{{ Route('admin_testimonies.index') }}">
                          <i class="icon_genius"></i>
                          <span>Testimonies</span>
                      </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->