  <!--sidebar start-->
  <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ route('user_dashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>

          <li>
            <a class="" href="{{ route('user_profile.index') }}">
                          <i class="icon_profile"></i>
                          <span>Profile</span>
                      </a>
          </li>
                    
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Reservations</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('user_reserve.index') }}">All Reservations</a></li>
              <li><a class="" href="{{ route('user_reserve.create') }}">Make Reservations</a></li>
              <li><a class="" href="{{ route('deleted_reserve.index') }}">Cancelled</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Order</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="">All Order</a></li>
              <li><a class="" href="">Make an Order</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_genuis"></i>
                          <span>Contacts</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('user_contact.index') }}">All Contacts</a></li>
              <li><a class="" href="{{ route('user_contact.create') }}">Make Contacts</a></li>
            </ul>
          </li>


          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_genuis"></i>
                          <span>Testimony</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="">All Testimony</a></li>
              <li><a class="" href="">Make Testimony</a></li>
            </ul>
          </li>  


        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->