<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/home"><i class="icon-speedometer"></i>{{  __('menus.backend.sidebar.dashboard') }} </a>
      </li>

      <li class="nav-title">
        General
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Components</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="/sample/buttons"><i class="icon-puzzle"></i> Buttons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/social"><i class="icon-puzzle"></i> Social Buttons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/cards"><i class="icon-puzzle"></i> Cards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/forms"><i class="icon-puzzle"></i> Forms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/modals"><i class="icon-puzzle"></i> Modals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/switches"><i class="icon-puzzle"></i> Switches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/tables"><i class="icon-puzzle"></i> Tables</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/tabs"><i class="icon-puzzle"></i> Tabs</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="/sample/icons-font-awesome"><i class="icon-star"></i> Font Awesome<span class="badge badge-secondary">4.7</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/icons-simple-line"><i class="icon-star"></i> Simple Line</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sample/widgets"><i class="icon-calculator"></i> Widgets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sample/charts"><i class="icon-pie-chart"></i> Charts</a>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="/page/login" target="_top"><i class="icon-star"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/page/register" target="_top"><i class="icon-star"></i> Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/error404" target="_top"><i class="icon-star"></i> Error 404</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sample/error500" target="_top"><i class="icon-star"></i> Error 500</a>
          </li>
        </ul>
      </li>

      @hasanyrole('superadmin|administrator')
      <li class="divider"></li>
      <li class="nav-title">
        System
      </li>


      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-link"></i> Access</a>
        <ul class="nav-dropdown-items">

          @hasanyrole('superadmin|administrator')
          <li class="nav-item">
            <a class="nav-link" href="/access/user"><i class="icon-people"></i> User Management</a>
          </li>
          @endhasanyrole

          @role('superadmin|administrator')
          <li class="nav-item">
            <a class="nav-link" href="/access/role"><i class="icon-user-follow"></i> Role Management</a>
          </li>
          @endrole

          @role('superadmin')
          <li class="nav-item">
            <a class="nav-link" href="/access/permission"><i class="icon-lock"></i> Permission</a>
          </li>
          @endrole

        </ul>
      </li>
      @endhasanyrole

      @role('superadmin')
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-list"></i> Log Viewer</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('log-viewer::dashboard') }}"><i class="icon-pie-chart"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('log-viewer::logs.list') }}"><i class="icon-pie-chart"></i> Logs</a>
          </li>
      </ul>
    </li>
    @endrole


      {{-- <li class="nav-item mt-auto">
        <a class="nav-link nav-link-success" href="http://coreui.io/" target="_top"><i class="icon-cloud-download"></i> Download CoreUI</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-danger" href="http://coreui.io/pro/" target="_top"><i class="icon-layers"></i> Try CoreUI <strong>PRO</strong></a>
      </li> --}}

    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
