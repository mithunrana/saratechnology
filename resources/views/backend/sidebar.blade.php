  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('') }}backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMC BMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div style="margin-bottom: 0rem!important;" class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="#" class="nav-link">
              &nbsp <i class="fa fa-edit"></i>
              <p>&nbsp Blog <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.blog')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.blog.category')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.blog.tag')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Tags</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="{{route('dashboard.review')}}" class="nav-link">
            &nbsp <i class="far fa-comment-dots"></i> &nbsp
              <p>
                Testimonials
              </p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="{{route('dashboard.slider')}}" class="nav-link">
            &nbsp <i class="far fa-image"></i> &nbsp
              <p>
                Simple Slider
              </p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="#" class="nav-link nav-link">
            &nbsp <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <p>
                &nbsp Ecommerce
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-chart-bar nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-bolt nav-icon"></i>
                  <p>Flash sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-shopping-bag nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p>Incomplete orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product')}}" class="nav-link">
                  <i class="fa fa-camera nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.category')}}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Product categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.tags')}}" class="nav-link">
                  <i class="fa fa-tag nav-icon"></i>
                  <p>Product tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.attribute')}}" class="nav-link">
                  <i class="fas fa-glass-martini nav-icon"></i>
                  <p>Product attributes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.brand')}}" class="nav-link">
                  <i class="fa fa-registered nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.collection')}}" class="nav-link">
                  <i class="fa fa-file-excel nav-icon"></i>
                  <p>Product collections</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.label')}}" class="nav-link">
                  <i class="fas fa-tags nav-icon"></i>
                  <p>Product labels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-comments nav-icon"></i>
                  <p>Reviews</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.shipping.method')}}" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon"></i>
                  <p>Shipping</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-gift nav-icon"></i>
                  <p>Discounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.customer')}}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.product.taxes')}}" class="nav-link">
                  &nbsp<i class='fas fa-money-check-alt'></i>
                  <p>Taxes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.currency')}}" class="nav-link">
                  &nbsp <i class='fas fa-money-bill'></i>
                  <p>Currency</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.country')}}" class="nav-link">
                 &nbsp <i class='fas fa-city'></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                &nbsp <i class="fas fa-cogs nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
            </ul>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="{{route('dashboard.contact')}}" class="nav-link">
            &nbsp <i class="far fa-envelope"></i> &nbsp
              <p>Contact</p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="{{route('dashboard.service')}}" class="nav-link">
            &nbsp <i class="fa fa-tasks"></i> &nbsp
              <p>Service</p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="{{route('dashboard.newsletter')}}" class="nav-link">
            &nbsp <i class="far fa-newspaper"></i> &nbsp
              <p>Newsletters</p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="#" class="nav-link">
            &nbsp <i class="fa fa-paint-brush"></i> &nbsp
              <p>
                Appearance <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.menubar')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Menubar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.widget')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Widget</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.setting.option')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Theme Options</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.setting.customcss')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Custom CSS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.setting.customjs')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Custom JS</p>
                </a>
              </li>
            </ul>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="" class="nav-link">
            &nbsp <i class="fa fa-plug"></i> &nbsp
              <p>Plugins</p>
            </a>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cogs"></i>
              <p>Settings <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.menubar')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.widget')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Email</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.widget')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.widget')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Permalink</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.widget')}}" style="font-weight:100" class="nav-link">
                  <p>&nbsp Social Login</p>
                </a>
              </li>
            </ul>
          </li>

          <li style="border-bottom:1px solid #484848;" class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-user-shield"></i>
              <p>Platform Administration <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" style="font-weight:100" class="nav-link">
                  <p>&nbsp Roles and Permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" style="font-weight:100" class="nav-link">
                  <p>&nbsp Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" style="font-weight:100" class="nav-link">
                  <p>&nbsp System information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" style="font-weight:100" class="nav-link">
                  <p>&nbsp Cache management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" style="font-weight:100" class="nav-link">
                  <p>&nbsp Activities Logs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" style="font-weight:100" class="nav-link">
                  <p>&nbsp Backups</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>