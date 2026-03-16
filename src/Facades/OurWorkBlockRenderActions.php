<?php

namespace GIS\EditableOurWorkBlock\Facades;

use GIS\EditableOurWorkBlock\Helpers\OurWorkBlockRenderActionsManager;
use GIS\EditableOurWorkBlock\Interfaces\OurWorkRecordInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void expandOurWorkRecord(OurWorkRecordInterface $record)
 *
 * @see OurWorkBlockRenderActionsManager
 */
class OurWorkBlockRenderActions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'our-work-block-render-actions';
    }
}
