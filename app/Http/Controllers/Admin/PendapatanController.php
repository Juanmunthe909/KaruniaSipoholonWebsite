<?php

namespace App\Http\Controllers\Admin;

// use App\Models\Hotel;
use App\Models\Kas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PDF;


class PendapatanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kas = Kas::where('in_out', 'in')
                ->latest()
                ->paginate(10);
            return view('pages.admin.pendapatan.list', compact('kas'));
        }
        return view('pages.admin.pendapatan.main');
    }

    public function destroy(Kas $pendapatan)
    {
        $pendapatan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }
    public function pdf(Request $request)
    {
        if ($request->start_date == null || $request->end_date == null) {
            return redirect()->back()->with('error', 'Tanggal tidak boleh kosong');
        }

        // Konversi tanggal string menjadi objek Carbon
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $kas = Kas::where('in_out', 'in')
            ->whereBetween('inout_date', [$startDate, $endDate])
            ->get();

        $pdf = PDF::loadView('pages.admin.pendapatan.pdf', compact('kas', 'startDate', 'endDate'));
        $fileName = 'kas_' . $startDate->translatedFormat('d_F_Y') . '_to_' . $endDate->translatedFormat('d_F_Y') . '.pdf';

        return $pdf->download($fileName);
    }

    public function show(Kas $pendapatan)
    {
        return view('pages.admin.pendapatan.show', compact('pendapatan'));
    }
}
