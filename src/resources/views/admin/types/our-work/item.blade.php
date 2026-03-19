@php
    $perCol = config("editable-our-work-block.perCol");
    $gridClasses = $perCol === 3 ? "" : "2xl:flex-row 2xl:flex-nowrap 2xl:space-y-0 2xl:space-x-indent";
    $dateFlex = $perCol === 3 ? "xl:flex-wrap 2xl:flex-nowrap xl:space-x-0 2xl:space-x-indent-xs" : "";
    $sliderWidth = $perCol === 2 ? "2xl:w-[278px]" : "";
@endphp
<div class="h-full flex flex-col space-y-indent p-indent-xs {{ $gridClasses }} bg-white rounded-base border border-stroke">
    <div class="w-full {{ $sliderWidth }} p-indent flex items-center justify-center bg-light rounded-base">
        Место для слайдера
    </div>
    <div class="flex-1 h-full flex flex-col justify-between space-y-indent px-indent-half 2xl:pl-0 2xl:py-indent-half 2xl:pr-indent-half">
        <div class="text-h4-mobile sm:text-h4 font-semibold">{{ $item->title }}</div>
        @if ($item->recordable->author_name)
            <div class="2xl:order-first mt-indent-xs 2xl:mt-0 2xl:mb-indent-xs text-sm">{{ $item->recordable->author_name }}</div>
        @endif
        @if ($item->recordable->description)
            <div class="prose max-w-none mt-indent-sm leading-tight">{!! $item->recordable->markdown !!}</div>
        @endif
        @if ($item->recordable->short)
            <div class="p-indent-xs leading-tight mt-indent-sm text-sm border border-transparent rounded-base"
                 style="
                        background:
                            linear-gradient(rgba(var(--color-body-bg), 1), rgba(var(--color-body-bg), 1)) padding-box,
                            linear-gradient(165deg, rgba(var(--color-primary), 1) 0%,rgba(var(--color-primary), 0) 30%) border-box,
                            linear-gradient(165deg, rgba(var(--color-primary), 0) 70%, rgba(var(--color-primary), 1) 100%) border-box
                        ">
                {{ $item->recordable->short }}
            </div>
        @endif
        @if ($item->recordable->date_from || $item->recordable->date_to)
            <div class="flex flex-wrap xs:flex-nowrap mt-indent-sm xs:space-x-indent-xs {{ $dateFlex }}">
                @if ($item->recordable->date_from)
                    <div class="w-full xs:flex-1 p-indent-xs xs:space-y-indent-xs mb-indent-xs border border-stroke rounded-base">
                        <div class="text-sm text-body/60 xs:text-nowrap">Дата начала работ:</div>
                        <div class="text-base xs:text-lg">
                            {{ $item->recordable->human_from }}
                        </div>
                    </div>
                @endif
                @if ($item->recordable->date_to)
                    <div class="w-full xs:flex-1 p-indent-xs xs:space-y-indent-xs mb-indent-xs border border-stroke rounded-base">
                        <div class="text-sm text-body/60 xs:text-nowrap">Дата окончания работ:</div>
                        <div class="text-base xs:text-lg">
                            {{ $item->recordable->human_to }}
                        </div>
                    </div>
                @endif
            </div>
        @endif
        @if (config("editable-our-work-block.btnFormKey"))
            <button type="button" class="btn btn-primary">
                {{ config("editable-our-work-block.btnText") }}
            </button>
        @endif
    </div>
</div>
