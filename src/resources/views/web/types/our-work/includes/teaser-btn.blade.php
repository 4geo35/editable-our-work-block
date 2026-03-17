@if (config("editable-our-work-block.btnFormKey"))
    @php
        $key = config("editable-our-work-block.btnFormKey");
        $title = $item->block->render_title ?: $item->block->title;
        $place = " Блок {$title}, {$item->title}";
    @endphp
    <button type="button" class="btn btn-primary" x-data
            @click.stop="$dispatch('show-request-form', { key: '{{ $key }}', place: '{{ $place }}' })">
        {{ config("editable-our-work-block.btnText") }}
    </button>
@endif
