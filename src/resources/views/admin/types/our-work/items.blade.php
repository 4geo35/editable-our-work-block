<div class="mx-auto w-11/12 mt-indent-half space-y-indent-half" x-collapse x-show="expanded">
    @foreach($items as $item)
        <div class="card" wire:key="our-work-block-cover-{{ $item->id }}">
            <div class="card-header">
                <div class="flex items-center justify-between">
                    @include("eb::admin.types.includes.priority-buttons")
                    @include("eb::admin.types.includes.edit-delete-buttons")
                </div>
            </div>
            <div class="card-body">
                @include("eowb::admin.types.our-work.item")
                @include("eb::admin.types.includes.help-info")
            </div>
            <div class="border-b border-stroke"></div>
            <livewire:fa-images :model="$item->recordable"
                                postfix="OurWorkBlock{{ $item->id }}-{{ $item->recordable->id }}"
                                no-card-cover wire:key="{{ $item->id }}--{{ $item->recordable->id }}" />
        </div>
    @endforeach
</div>
