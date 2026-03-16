<?php

return [
    "availableTypes" => [
        "ourWork" => [
            "title" => env("EDITABLE_OUR_WORK_BLOCK_TITLE", "Наши работы"),
            "admin" => "eowb-our-work",
            "render" => "eowb::types.our-work",
        ],
    ],

    // Models
    "customOurWorkRecordModel" => null,
    "customOurWorkRecordModelObserver" => null,

    // Manager
    "customBlockRecordActionsManager" => null,

    // Components
    "customOurWorkComponent" => null,

    // Templates
    "templates" => [],
];
