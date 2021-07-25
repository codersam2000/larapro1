<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('admin/dashboard') ? 'active':'' }}" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="vab-item"><a href="{{ route('admin.category.create') }}" class="nav-link {{ request()->is('admin/category/create') ? 'active':'' }}">Add Category</a></li>
                        <li class="vab-item"><a href="{{ route('admin.post.create') }}" class="nav-link {{ request()->is('admin/post/create') ? 'active':'' }}">Add Post</a></li>
                        <li class="nav-item"><a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->is('admin/category') ? 'active':'' }}">Manage Category</a></li>
                        <li class="nav-item"><a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->is('admin/post') ? 'active':'' }}">Manage Post</a></li>
                        <!-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="" class="dropdown-item">Add category</a>
                                <a href="" class="dropdown-item">Author Action</a>
                            </div>
                        </li> -->

                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>