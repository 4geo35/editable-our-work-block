<?php

namespace GIS\EditableOurWorkBlock;
use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\EditableOurWorkBlock\Helpers\OurWorkBlockRenderActionsManager;
use GIS\EditableOurWorkBlock\Models\OurWorkRecord;
use GIS\EditableOurWorkBlock\Observers\OurWorkRecordObserver;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use GIS\EditableOurWorkBlock\Livewire\Admin\Types\OurWorkWire;

class EditableOurWorkBlockServiceProvider extends ServiceProvider
{
    use ExpandTemplatesTrait, ExpandBlocksTrait;

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");
        $this->mergeConfigFrom(__DIR__ . "/config/editable-our-work-block.php", "editable-our-work-block");
        $this->initFacades();
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/resources/views", "eowb");
        $this->addLivewireComponents();
        $this->expandConfiguration();
        $this->observeModels();
    }

    protected function addLivewireComponents(): void
    {
        $component = config("editable-our-work-block.customOurWorkComponent");
        Livewire::component(
            "eowb-our-work",
            $component ?? OurWorkWire::class,
        );
    }

    protected function expandConfiguration(): void
    {
        $eowb = app()->config["editable-our-work-block"];
        $this->expandTemplates($eowb);
        $this->expandBlocks($eowb);
        $this->expandBlockRender($eowb);
    }

    protected function initFacades(): void
    {
        $this->app->singleton("our-work-block-render-actions", function () {
            $managerClass = config("editable-our-work-block.customBlockRecordActionsManager") ?? OurWorkBlockRenderActionsManager::class;
            return new $managerClass();
        });
    }

    protected function observeModels(): void
    {
        $modelClass = config("editable-our-work-block.customOurWorkRecordModel") ?? OurWorkRecord::class;
        $observerClass = config("editable-our-work-block.customOurWorkRecordModelObserver") ?? OurWorkRecordObserver::class;
        $modelClass::observe($observerClass);
    }
}
