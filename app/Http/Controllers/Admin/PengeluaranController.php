<?php

namespace App\Http\Controllers\Admin;

// use App\Models\Hotel;
use App\Models\Kas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PDF;


class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kas = Kas::where('in_out', 'out')
                ->latest()
                ->paginate(10);
            return view('pages.admin.pengeluaran.list', compact('kas'));
        }
        return view('pages.admin.pengeluaran.main');
    }

    public function create()
    {
        return view('pages.admin.pengeluaran.create',);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'inout_date' => 'required|date',
            'in_out' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        Kas::create([
            'inout_date' => $request->inout_date,
            'in_out' => $request->in_out,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
        ]);
    }

    public function destroy(Kas $pengeluaran)
    {
        $pengeluaran->delete();

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

        $kas = Kas::where('in_out', 'out')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'DESC')
            ->get();

        $pdf = PDF::loadView('pages.admin.pengeluaran.pdf', compact('kas', 'startDate', 'endDate'));
        $fileName = 'kas_' . $startDate->translatedFormat('d_F_Y') . '_to_' . $endDate->translatedFormat('d_F_Y') . '.pdf';

        return $pdf->download($fileName);
    }
}
