<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make ('Total Products',Product::count ()),
            Stat::make ('Inactive Products',Product::where ("active",false)->count ()),
            Stat::make ('Today Orders',Order::whereDate('created_at', Carbon::now()->toDateString())->get()->count ()),
            Stat::make ('Total Orders',Order::count ()),
        ];
    }
}
