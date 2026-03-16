<?php

namespace GIS\EditableOurWorkBlock\Helpers;

use GIS\EditableOurWorkBlock\Interfaces\OurWorkRecordInterface;

class OurWorkBlockRenderActionsManager
{
    public function expandOurWorkRecord(OurWorkRecordInterface $record): void
    {
        $record->load("images");
    }
}
