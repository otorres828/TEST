<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('post.index')}}">Post</a>
          </li>

          @can('toposts')
            <li class="nav-item float-right">
              <a class="nav-link text-primary" href="{{route('admin.post.index')}}">
                Panel de Blog
              </a>
            </li>           
          @endcan
  
        </ul>
      </div>
      
    </div>
  
  </nav>
  
  