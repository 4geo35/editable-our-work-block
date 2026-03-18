@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @php
        $perCol = config("editable-our-work-block.perCol");
        $gridClass = $perCol === 3 ? "md:w-1/3" : "md:w-1/2";
    @endphp
    @if ($block->render_title)
        <x-tt::h2 class="mb-indent-half">{{ $block->render_title }}</x-tt::h2>
    @endif
    <div class="row" id="swiperBlockOurWork-{{ $block->id }}">
        @foreach($block->items as $index => $item)
            <div class="col w-full lg:w-1/2 mb-indent">
                <x-eowb::types.our-work.item :$item />
            </div>
        @endforeach
    </div>
    @include("eowb::web.types.our-work.includes.swiper-script")
@endif
