<?php

namespace GIS\EditableOurWorkBlock\Livewire\Admin\Types;
use GIS\EditableBlocks\Traits\CheckBlockAuthTrait;
use GIS\EditableBlocks\Traits\EditBlockTrait;
use GIS\EditableBlocks\Traits\PlaceholderBlockTrait;
use GIS\EditableOurWorkBlock\Interfaces\OurWorkRecordInterface;
use GIS\EditableOurWorkBlock\Models\OurWorkRecord;
use Illuminate\View\View;
use Livewire\Component;

class OurWorkWire extends Component
{
    use EditBlockTrait, CheckBlockAuthTrait, PlaceholderBlockTrait;

    public bool $displayData = false;
    public bool $displayDelete = false;

    public int|null $itemId = null;

    public string $title = "";
    public string $short = "";
    public string $description = "";

    public string $dateFrom = "";
    public string $dateTo = "";
    public string $authorName = "";

    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:150"],
            "short" => ["required", "string", "max:250"],
            "dateFrom" => ["nullable", "date"],
            "dateTo" => ["nullable", "date"],
            "authorName" => ["nullable", "string", "max:250"],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            "title" => "Заголовок",
            "short" => "Краткое описание",
            "dateFrom" => "Дата от",
            "dateTo" => "Дата до",
            "authorName" => "Имя автора",
        ];
    }

    public function render(): View
    {
        $items = $this->block->items()->with("recordable")->orderBy("priority")->get();
        return view("eowb::livewire.admin.types.our-work-wire", compact("items"));
    }

    public function closeData(): void
    {
        $this->resetFields();
        $this->displayData = false;
    }

    public function showCreate(): void
    {
        $this->resetFields();
        if (! $this->checkAuth("create")) { return; }
        $this->displayData = true;
    }

    public function store(): void
    {
        if (! $this->checkAuth("create")) { return; }
        $this->validate();

        $modelClass = config("editable-our-work-block.customOurWorkRecordModel") ?? OurWorkRecord::class;
        $record = $modelClass::create([
            "short" => $this->short,
            "description" => $this->description,
            "date_from" => empty($this->dateFrom) ? null : $this->dateFrom,
            "date_to" => empty($this->dateTo) ? null : $this->dateTo,
            "author_name" => $this->authorName,
        ]);
        /**
         * @var OurWorkRecordInterface $record
         */
        $record->item()->create([
            "title" => $this->title,
            "block_id" => $this->block->id,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно добавлен");
    }

    public function showEdit(int $id): void
    {
        $this->resetFields();
        $this->itemId = $id;
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;

        $this->title = $item->title;
        $this->short = $record->short;
        $this->description = $record->description;
        $this->dateFrom = (string) $record->date_from;
        $this->dateTo = (string) $record->date_to;
        $this->authorName = $record->author_name;

        $this->displayData = true;
    }

    public function update(): void
    {
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;
        /**
         * @var OurWorkRecordInterface $record
         */
        $record->update([
            "short" => $this->short,
            "description" => $this->description,
            "date_from" => empty($this->dateFrom) ? null : $this->dateFrom,
            "date_to" => empty($this->dateTo) ? null : $this->dateTo,
            "author_name" => $this->authorName,
        ]);
        $item->update([
            "title" => $this->title,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно обновлен");
    }

    protected function resetFields(): void
    {
        $this->reset("title", "short", "dateFrom", "dateTo", "authorName", "description", "itemId");
    }
}
