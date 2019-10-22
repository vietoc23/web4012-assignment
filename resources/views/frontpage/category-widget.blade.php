<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <ul class="list-unstyled">
            @foreach ($category_list as $category)
                <li>
                    <a href="{{ route('front.category-posts.show', ['id' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>