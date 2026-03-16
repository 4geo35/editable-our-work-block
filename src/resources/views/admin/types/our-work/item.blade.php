<div>
    <div>{{ $item->title }}</div>
    <div>{{ $item->recordable->short }}</div>
    <div>{!! $item->recordable->markdown !!}</div>
    <div>{{ $item->recordable->human_from }}</div>
    <div>{{ $item->recordable->human_to }}</div>
    <div>{{ $item->recordable->author_name }}</div>
</div>
