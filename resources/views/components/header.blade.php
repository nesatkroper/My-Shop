<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li>
        <p id="date" class="m-0 p-0 fw-bold" style="font-size: 13px"></p>
        <p id="time" class="m-0 p-0 fw-bold" style="font-size: 13px"></p>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i
            data-lte-icon="minimize"
            class="bi bi-fullscreen-exit"
            style="display: none"
          ></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img
            src="{{ asset('image/profile.jpg') }}"
            class="user-image rounded-circle shadow"
            alt="User Image"
          />
          <span class="d-none d-md-inline">SUON Phanun</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
<script>
  const date = document.getElementById("date");
  const time = document.getElementById("time");
  setInterval(() => {
    let now = new Date();
    date.innerHTML = now.toLocaleDateString();
    time.innerHTML = now.toLocaleTimeString();
  });
</script>
