@if ($item->recordable->orderedImages->count())
    <div class="w-[278px] cover-slider-our-work-block-item">
        <div class="swiper main-slider-our-work-block-item w-full min-h-[300px] overflow-hidden mb-indent-xs">
            <div class="swiper-wrapper">
                @foreach($item->recordable->orderedImages as $image)
                    <div class="swiper-slide">
                        <a data-fslightbox="lightbox-our-work-block-item-{{ $item->id }}"
                           href="{{ route('thumb-img', ['template' => 'original', 'filename' => $image->file_name]) }}">
                            <picture>
                                <img
                                    class="rounded-base"
                                    src="{{ route('thumb-img', ['template' => 'our-work-record', 'filename' => $image->file_name]) }}"
                                    alt="">
                            </picture>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex">
            <div class="swiper thumb-slider-our-work-block-item flex-1 h-[50px] overflow-hidden" thumbsSlider>
                <div class="swiper-wrapper">
                    @foreach($item->recordable->orderedImages as $image)
                        <div class="swiper-slide flex items-center justify-center !w-[55px] !h-[50px] cursor-pointer">
                            <img
                                class="rounded-base"
                                src="{{ route('thumb-img', ['template' => 'our-work-record-thumb', 'filename' => $image->file_name]) }}"
                                alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-[18px] grow-0 shrink-0 basis-[18px] flex flex-col items-center justify-center space-y-indent-xs ml-indent-xs">
                <button type="button" class="next-slider-our-work-block-item cursor-pointer text-primary hover:text-primary-hover">
                    <x-eowb::ico.arrow />
                </button>
                <button type="button" class="prev-slider-our-work-block-item cursor-pointer text-primary hover:text-primary-hover">
                    <x-eowb::ico.arrow class="rotate-180" />
                </button>
            </div>
        </div>
    </div>
@endif
