<div class="side-menu">
  <aside class="menu m-t-30 m-l-20">
    <div>
      <p class="menu-label">
        General
      </p>
      <ul class="menu-list">
        <li><a href="{{route('manage.dashboard')}}">Dashboard</a></li>
      </ul>
      <p class="menu-label">
        Administration
      </p>
      <ul class="menu-list">
        <li><a href="{{route('users.index')}}">Manage Users</a></li>
        <li>
          <a href="#">Roles &amp; Permiossions</a>
          <ul>
            <li><a href="{{route('permissions.index')}}">Permissions</a></li>
            <li><a href="{{route('roles.index')}}">Roles</a></li>
          </ul>
        </li>
      </ul>
      <p class="menu-label">
        Content
      </p>
      <ul class="menu-list">
          <li><a href="{{route('posts.index')}}">Manage Posts</a></li>
      </ul>
    </div>
  </aside>
</div>
