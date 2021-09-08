<?php

namespace App\Exports;

use App\Models\TicketBuyed;
use App\Models\OtherTicketBuyed;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class TicketBuyedExport implements FromCollection, WithHeadings, WithStyles
{
    use Exportable;

    public function __construct(int $lotteryId)
    {
        $this->lotteryId = $lotteryId;
    }

    public function headings(): array
    {
        return [
            'Rifa',
            'Boleto',
            'Nombre',
            'Apellido',
            'Pagado'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
            'B'  => ['font' => ['bold' => true]],
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $otherTicketBuyed = OtherTicketBuyed::select('lotteries.name', 'other_ticket_buyeds.ticket', 'ticket_buyeds.name_client', 'ticket_buyeds.lastname_client', 'ticket_buyeds.paid')
                    ->join('lotteries', 'other_ticket_buyeds.lottery_id', '=', 'lotteries.id')
                    ->join('ticket_buyeds', 'other_ticket_buyeds.ticket_buyed_id', '=', 'ticket_buyeds.id')
                    ->where('other_ticket_buyeds.lottery_id', $this->lotteryId)
                    ->get();

        $ticketBuyed = TicketBuyed::select('lotteries.name', 'ticket_buyeds.ticket', 'ticket_buyeds.name_client', 'ticket_buyeds.lastname_client', 'ticket_buyeds.paid')
                    ->join('lotteries', 'ticket_buyeds.lottery_id', '=', 'lotteries.id')
                    ->where('lottery_id', $this->lotteryId)
                    ->get();

        $merged = $otherTicketBuyed->mergeRecursive($ticketBuyed);
        
        return $merged;
    }
}
