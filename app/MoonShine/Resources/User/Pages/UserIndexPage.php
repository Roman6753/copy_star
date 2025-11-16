<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\User\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\User\UserResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Text;
use Throwable;


/**
 * @extends IndexPage<UserResource>
 */
class UserIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            
            Text::make('Имя', 'name')
                ->sortable(),

            Text::make('Фамилия', 'surname')
                ->sortable(),

            Text::make('Отчество', 'patronymic')
                ->sortable(),

            Text::make('Логин', 'login')
                ->sortable(),

            Email::make('Email', 'email')
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
             Text::make('Имя', 'name')
                ->placeholder('Поиск по имени'),

            Text::make('Фамилия', 'surname')
                ->placeholder('Поиск по фамилии'),

            Text::make('Логин', 'login')
                ->placeholder('Поиск по логину'),

            Email::make('Email', 'email')
                ->placeholder('Поиск по email'),
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
