<?php

namespace App\Filament\Resources\LoanResource\Pages;

use Filament\Tables;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\LoanResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListLoans extends ListRecords
{
    protected static string $resource = LoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    { 
        $user = Auth::user();

        if($user->role == 'admin')
        {
            return parent::getTableQuery()
                ->orderBy('created_at', 'desc');
        }
        else 
        {    
            return parent::getTableQuery()
                ->whereHas('customer', function (Builder $query) use ($user) {
                    $query->where('city_district', $user->city);
                })
                ->orderBy('created_at', 'desc');
        }
    }
}