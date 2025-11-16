<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Order\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\Order\OrderResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use Throwable;


/**
 * @extends IndexPage<OrderResource>
 */
class OrderIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            
            BelongsTo::make('Пользователь', 'user', function($user) {
                return $user->full_name . ' (' . $user->email . ')';
            })
            ->sortable()
            ->searchable(),

            Text::make('Общая сумма', 'total')
                ->sortable(),

            Select::make('Статус', 'status')
                ->options([
                    'new' => 'Новый',
                    'confirmed' => 'Подтвержден',
                    'cancelled' => 'Отменен',
                ])
                ->sortable(),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    /**
     * @return list<FieldContract>
     */
    protected function filters(): iterable
    {
        return [
             Select::make('Статус', 'status')
                ->options([
                    'new' => 'Новые',
                    'confirmed' => 'Подтвержденные',
                    'cancelled' => 'Отмененные',
                ]),

            BelongsTo::make('Пользователь', 'user', function($user) {
                return $user->full_name . ' (' . $user->email . ')';
            })
            ->searchable()
            ->placeholder('Поиск по пользователю'),
        ];
    }

    /**
     * @return list<QueryTag>
     */
    protected function queryTags(): array
    {
        return [];
    }

    /**
     * @return list<Metric>
     */
    protected function metrics(): array
    {
        return [];
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyListComponent(ComponentContract $component): ComponentContract
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
