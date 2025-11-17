<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Product\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Product\ProductResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use Throwable;


/**
 * @extends FormPage<ProductResource>
 */
class ProductFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    public function fields(): array
    {
        return [
            Grid::make([
                Column::make([
                    ID::make(),
                    
                    Text::make('Название', 'name')
                        ->required(),

                    BelongsTo::make('Категория', 'category', 'name')
                        ->required()
                        ->searchable(),

                    Textarea::make('Описание', 'description'),

                    Number::make('Цена', 'price')
                        ->step(0.01)
                        ->required(),

                    Number::make('Количество', 'stock')
                        ->required(),
                ])->columnSpan(6),

                Column::make([
                    Text::make('Страна', 'country')
                        ->required(),

                    Number::make('Год выпуска', 'year')
                        ->required()
                        ->min(1900)
                        ->max(2030),

                    Text::make('Модель', 'model')
                        ->required(),

                    Image::make('Изображение', 'image')
                        ->dir('products')
                        ->disk('public')
                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif']),
                ])->columnSpan(6),
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'country' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'model' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
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
