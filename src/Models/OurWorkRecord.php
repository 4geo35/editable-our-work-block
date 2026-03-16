<?php

namespace GIS\EditableOurWorkBlock\Models;

use GIS\EditableBlocks\Traits\ShouldBlockItem;
use GIS\EditableOurWorkBlock\Interfaces\OurWorkRecordInterface;
use GIS\Fileable\Traits\ShouldGallery;
use GIS\TraitsHelpers\Traits\ShouldMarkdown;
use Illuminate\Database\Eloquent\Model;

class OurWorkRecord extends Model implements OurWorkRecordInterface
{
    use ShouldBlockItem, ShouldMarkdown, ShouldGallery;

    protected $fillable = [
        "short",
        "description",
        "date_from",
        "date_to",
        "author_name"
    ];

    public function getHumanFromAttribute(): ?string
    {
        $value = $this->date_from;
        if (empty($value)) { return $value; }
        return date_helper()->format($value, "d.m.Y");
    }

    public function getHumanToAttribute(): ?string
    {
        $value = $this->date_to;
        if (empty($value)) { return $value; }
        return date_helper()->format($value, "d.m.Y");
    }
}
