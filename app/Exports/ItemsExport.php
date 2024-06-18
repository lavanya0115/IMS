<?php

namespace App\Exports;

use App\Models\ItemMaster;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ItemMaster::all();
    }

    public function map($item): array
    {
        return [
            $item->id ?? '--',
            $item->name ?? '--',
            $item->Description ?? '--',
            $item->Price ?? '--',
            $item->Quantity ?? '--',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Price',
            'Quantity',
        ];
    }
}
