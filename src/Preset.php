<?php

namespace DigitalCreative\NovaDashboard;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Nova\Makeable;

class Preset
{
    use Makeable;

    public int $x = 0;
    public int $y = 0;
    public int $width = 0;
    public int $height = 0;
    public Widget $widget;
    public string $id;

    /**
     * Preset constructor.
     *
     * @param string|Widget $widget
     */
    public function __construct(Widget $widget)
    {
        $this->id = Str::random();
        $this->widget = $widget;
    }

    public function coordinates(int $x, int $y, int $width, int $height): self
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    public function resolveOptions(): Collection
    {
        return $this->widget->resolveDefaultOptions();
    }

    public function resolveCoordinates(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }

}
