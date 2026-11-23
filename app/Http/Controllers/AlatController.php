<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Http\Requests\StoreAlatRequest;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'cari' => ['nullable', 'string', 'max:100'],
            ]);
            $query = Alat::query();
            if (!empty($validated['cari'])) {
                $query->where(
                    'nama',
                    'like',
                    '%' . $validated['cari'] . '%'
                    );
                    }
        
            $alat = $query->orderBy('kode')
            ->paginate(10)
            ->withQueryString();
            return view('alat.index', compact('alat'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlatRequest $request)
    {
        Alat::create($request->validated());
        return redirect()->route('alat.index')
        ->with('sukses', 'Alat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAlatRequest $request, Alat $alat)
    {
        $alat->update($request->validated());
        
        return redirect()->route('alat.index')
        ->with('sukses', 'Alat berhasil diperbarui.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alat $alat)
    {
        $alat->delete();
        
        return redirect()->route('alat.index')
        ->with('sukses', 'Alat berhasil dihapus.');
    }

    public function show(Alat $alat)
    {
        return view('alat.show', compact('alat'));
    }
}
