<x-tt::modal.dialog wire:model="displayData">
    <x-slot name="title">{{ $itemId ? 'Редактировать' : 'Добавить' }} элемент</x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="{{ $itemId ? 'update' : 'store' }}" class="space-y-indent-half"
              id="ourWorkBlockDataForm-{{ $block->id }}">

            <div>
                <label for="ourWorkBlockTitle-{{ $block->id }}" class="inline-block mb-2">
                    Заголовок<span class="text-danger">*</span>
                </label>
                <input type="text" id="ourWorkBlockTitle-{{ $block->id }}"
                       class="form-control {{ $errors->has("title") ? "border-danger" : "" }}"
                       required
                       wire:loading.attr="disabled"
                       wire:model="title">
                <x-tt::form.error name="title"/>
            </div>

            <div>
                <label for="ourWorkBlockShort-{{ $block->id }}" class="inline-block mb-2">
                    Краткое описание
                </label>
                <input type="text" id="ourWorkBlockShort-{{ $block->id }}"
                       class="form-control {{ $errors->has("short") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="short">
                <x-tt::form.error name="short"/>
            </div>

            <div>
                <label for="ourWorkBlockDateFrom-{{ $block->id }}" class="inline-block mb-2">
                    Дата от
                </label>
                <input type="date" id="ourWorkBlockDateFrom-{{ $block->id }}"
                       class="form-control {{ $errors->has("dateFrom") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="dateFrom">
                <x-tt::form.error name="dateFrom"/>
            </div>

            <div>
                <label for="ourWorkBlockDateTo-{{ $block->id }}" class="inline-block mb-2">
                    Дата до
                </label>
                <input type="date" id="ourWorkBlockDateTo-{{ $block->id }}"
                       class="form-control {{ $errors->has("dateTo") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="dateTo">
                <x-tt::form.error name="dateTo"/>
            </div>

            <div>
                <label for="ourWorkBlockAuthorName-{{ $block->id }}" class="inline-block mb-2">
                    Имя автора
                </label>
                <input type="text" id="ourWorkBlockAuthorName-{{ $block->id }}"
                       class="form-control {{ $errors->has("authorName") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="authorName">
                <x-tt::form.error name="authorName"/>
            </div>

            <div>
                <label for="ourWorkBlockDescription-{{ $block->id }}" class="flex justify-start items-center mb-2">
                    Описание
                    @include("tt::admin.description-button", ["id" => "ourWorkBlockDescriptionInfoHidden-" . $block->id])
                </label>
                @include("tt::admin.description-info", ["id" => "ourWorkBlockDescriptionInfoHidden-" . $block->id])
                <textarea id="ourWorkBlockDescription-{{ $block->id }}" class="form-control !min-h-52 {{ $errors->has('description') ? 'border-danger' : '' }}"
                          rows="10"
                          wire:model.live="description">
                        {{ $description }}
                    </textarea>
                <x-tt::form.error name="description" />

                <div class="prose prose-sm mt-indent-half">
                    {!! \Illuminate\Support\Str::markdown($description) !!}
                </div>
            </div>

            <div class="flex items-center space-x-indent-half">
                <button type="button" class="btn btn-outline-dark" wire:click="closeData">
                    Отмена
                </button>
                <button type="submit" form="ourWorkBlockDataForm-{{ $block->id }}" class="btn btn-primary"
                        wire:loading.attr="disabled">
                    {{ $itemId ? "Обновить" : "Добавить" }}
                </button>
            </div>
        </form>
    </x-slot>
</x-tt::modal.dialog>
