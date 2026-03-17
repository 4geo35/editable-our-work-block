@props(["item"])
<div class="h-full flex flex-nowrap space-x-indent p-indent-xs bg-white rounded-base border border-stroke">
    @include("eowb::web.types.our-work.includes.slider")
    <div class="flex-1 h-full flex flex-col justify-between space-y-indent py-indent-half pr-indent-half">
        <div class="flex-1">
            @if ($item->recordable->author_name)
                <div class="text-sm mb-indent-xs">{{ $item->recordable->author_name }}</div>
            @endif
            <div class="text-h4-mobile sm:text-h4 font-semibold">{{ $item->title }}</div>
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
                <div class="flex flex-wrap xs:flex-nowrap mt-indent-sm xs:space-x-indent-xs">
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
        </div>
        @include("eowb::web.types.our-work.includes.teaser-btn")
    </div>
</div>
