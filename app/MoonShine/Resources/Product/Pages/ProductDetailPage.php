<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Product\Pages;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use App\MoonShine\Resources\Product\ProductResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Slug;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;
use Throwable;


/**
 * @extends DetailPage<ProductResource>
 */
class ProductDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            
            Image::make('Изображение', 'image'),

            Text::make('Название', 'name')
                ->sortable(),

            Slug::make('Slug', 'slug')
                ->from('name')
                ->unique()
                ->required()
                ->sortable(),

            BelongsTo::make('Категория', 'category', 'name')
                ->sortable()
                ->searchable(),

            Number::make('Цена', 'price')
                ->sortable(),

            Number::make('Количество', 'stock')
                ->sortable(),

            Text::make('Страна', 'country')
                ->sortable(),

            Number::make('Год выпуска', 'year')
                ->sortable(),

            Text::make('Модель', 'model')
                ->sortable(),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyDetailComponent(ComponentContract $component): ComponentContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
