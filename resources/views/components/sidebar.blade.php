<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="{{ route('dash.index') }}" class="brand-link">
      <img
        src="{{ asset('image/Germany.png') }}"
        alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow"
      />
      <span class="brand-text fw-light">SUON Phanun</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false"
      >
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Menu
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('dash.index') }}" class="nav-link">
                <i class="nav-icon bi bi-bag-dash"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pos.index') }}" class="nav-link">
                <i class="nav-icon bi bi-receipt"></i>
                <p>POS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pro.index') }}" class="nav-link">
                <i class="nav-icon bi bi-cart-check"></i>
                <p>Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cate.index') }}" class="nav-link">
                <i class="nav-icon bi bi-tags"></i>
                <p>Category</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
