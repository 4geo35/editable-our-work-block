<?php

namespace GIS\EditableOurWorkBlock\Observers;

use GIS\EditableOurWorkBlock\Interfaces\OurWorkRecordInterface;

class OurWorkRecordObserver
{
    public function updated(OurWorkRecordInterface $record): void
    {
        $item = $record->item;
        if (! $item) { return; }
        $item->touch();
    }
}
