@if ($item->recordable->orderedImages->count())
    @php
        $sliderWidth = $perCol === 2 ? "2xl:w-[278px]" : "";
        $sliderHeight = $perCol === 2 ? "xl:h-[258px]" : "xl:h-[240px]";
        $basisWidth = $perCol === 2 ? "2xl:basis-[18px]" : "2xl:basis-[42px]";
    @endphp
    <div class="w-full {{ $sliderWidth }} cover-slider-our-work-block-item">
        <div class="swiper main-slider-our-work-block-item w-full xs:h-[200px] sm:h-[240px] md:h-[314px] lg:h-[202px] {{ $sliderHeight }} 2xl:h-[300px] overflow-hidden mb-indent-xs">
            <div class="swiper-wrapper">
                @foreach($item->recordable->orderedImages as $image)
                    <div class="swiper-slide">
                        <a data-fslightbox="lightbox-our-work-block-item-{{ $item->id }}"
                           href="{{ route('thumb-img', ['template' => 'original', 'filename' => $image->file_name]) }}">
                            <picture>
                                @if ($perCol === 2)
                                    <source media="(min-width: 1536px)"
                                            srcset="{{ route('thumb-img', ['template' => "our-work-record", 'filename' => $image->file_name]) }}">
                                @else
                                    <source media="(min-width: 1280px)"
                                            srcset="{{ route('thumb-img', ['template' => "our-work-record-third", 'filename' => $image->file_name]) }}">
                                @endif
                                <source media="(min-width: 768px)"
                                        srcset="{{ route('thumb-img', ['template' => "our-work-record-vertical", 'filename' => $image->file_name]) }}">
                                <source media="(min-width: 480px)"
                                        srcset="{{ route('thumb-img', ['template' => "tablet-our-work-record-vertical", 'filename' => $image->file_name]) }}">
                                <img
                                    class="rounded-base h-full object-cover object-center"
                                    src="{{ route('thumb-img', ['template' => 'mobile-our-work-record-vertical', 'filename' => $image->file_name]) }}"
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
            <div class="grow-0 shrink-0 basis-[34px] sm:basis-[54px] md:basis-[18px] lg:basis-[34px] xl:basis-[24px] {{ $basisWidth }} hidden sm:flex flex-col items-center justify-center space-y-indent-xs ml-indent-xs">
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
