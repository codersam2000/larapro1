 <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{route('search')}}" method="post">
            @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search_text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
        </div> 
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                @if($categories)
                @foreach($categories as $category)
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{route('category.post',$category->id)}}">{{$category->name}}</a></li>
                        </ul>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Latest post</div>
        @if($latest_posts)
        @foreach($latest_posts as $lpost)
        <a href="{{route('single.post',$lpost->id)}}"><p class="p-2">{{$lpost->title}}</p></a>
        @endforeach
        @endif
    </div>