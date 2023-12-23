<?php

namespace App\Http\Controllers\Admin;

use App\Models\Toilet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ToiletController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $toilet = Toilet::where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%')
                ->orWhere('price', 'like', '%' . $request->keyword . '%')
                ->orWhere('stock', 'like', '%' . $request->keyword . '%')
                // ->orWhere('category', 'like', '%' . $request->keyword . '%')
                ->paginate(10);
            return view('pages.admin.toilet.list', compact('toilet'));
        }
        return view('pages.admin.toilet.main');
    }

    public function create()
    {
        return view('pages.admin.toilet.create');
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            // 'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('title'),
                ]);
                // } elseif ($errors->has('category')) {
                //     return response()->json([
                //         'status' => 'error',
                //         'message' => $errors->first('category'),
                //     ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/panen', $filename);

        Toilet::create([
            'title' => $request->title,
            // 'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover' => $filename,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan produk baru',
            'redirect' => route('admin.toilet.index')
        ]);
    }

    public function show(Toilet $toilet)
    {
        return view('pages.admin.toilet.show', compact('toilet'));
    }

    public function edit(Toilet $toilet)
    {
        return view('pages.admin.toilet.edit', compact('toilet'));
    }

    public function update(Request $request, Toilet $toilet)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255|',
            // 'category' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }
        if ($request->hasFile('cover')) {
            $old_file = public_path('images/toilet/' . $toilet->cover);
            if (file_exists($old_file)) {
                unlink($old_file);
            }
            $file = $request->file('cover');
            $filename = $file->getClientOriginalName();
            $file->move('images/panen', $filename);
        }
        $toilet->update([
            'title' => $request->title,
            // 'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover' => $filename,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil merubah produk',
            'redirect' => route('admin.toilet.index')
        ]);
    }

    public function destroy(Toilet $toilet)
    {
        $file = public_path('images/panen/' . $toilet->cover);
        if (file_exists($file)) {
            unlink($file);
        }

        $toilet->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus produk',
        ]);
    }
}
