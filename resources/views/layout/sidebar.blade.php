<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
          <a href="#">PPDB</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
          <a href="#">PPDB</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">DASHBOARD</li>
        <li>
          <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="fas fa-tachometer-alt"></i>
            <span>DASHBOARD</span></a>
        </li>
          <li class="menu-header">MASTER</li>
          <li>
            <a class="nav-link" href="{{route('jurusan.index')}}">
              <i class="fas fa-graduation-cap"></i> 
              <span>JURUSAN</span></a>
          </li>
          <li>
            <a class="nav-link" href="{{route('siswa.index')}}">
              <i class="fas fa-user-tie"></i> 
              <span>SISWA</span></a>
          </li>

          <li class="menu-header">SETTING</li>
          <li>
            <a class="nav-link" href="/setting">
              <i class="fas fa-cog"></i> 
              <span>SETTING</span></a>
          </li>

          <li>
            <a class="nav-link" href="/user">
              <i class="fas fa-user"></i> 
              <span>USER</span></a>
          </li>
      </ul>
  </aside>
</div>