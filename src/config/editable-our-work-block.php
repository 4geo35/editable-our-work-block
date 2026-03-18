<?php

return [
    "availableTypes" => [
        "ourWork" => [
            "title" => env("EDITABLE_OUR_WORK_BLOCK_TITLE", "Наши работы"),
            "admin" => "eowb-our-work",
            "render" => "eowb::types.our-work",
        ],
    ],
    "perCol" => 2, // 2 или 3

    // Form
    "btnFormKey" => "call-request", // если указать форму, то нужно, что бы на странице была эта форма в виде модалки
    "btnText" => "Хочу также",

    // Models
    "customOurWorkRecordModel" => null,
    "customOurWorkRecordModelObserver" => null,

    // Manager
    "customBlockRecordActionsManager" => null,

    // Components
    "customOurWorkComponent" => null,

    // Templates
    "templates" => [
        "our-work-record" => \GIS\EditableOurWorkBlock\Templates\OurWorkRecord::class,

        "our-work-record-third" => \GIS\EditableOurWorkBlock\Templates\OurWorkRecordThird::class,

        "our-work-record-vertical" => \GIS\EditableOurWorkBlock\Templates\OurWorkRecordVertical::class,
        "tablet-our-work-record-vertical" => \GIS\EditableOurWorkBlock\Templates\TabletOurWorkRecordVertical::class,
        "mobile-our-work-record-vertical" => \GIS\EditableOurWorkBlock\Templates\MobileOurWorkRecordVertical::class,

        "our-work-record-thumb" => \GIS\EditableOurWorkBlock\Templates\OurWorkRecordThumb::class,
    ],
];
