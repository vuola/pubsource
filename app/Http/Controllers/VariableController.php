<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VariableController extends Controller
{
    public function index(): View
    {
        return view('variables.index', [
            'variables' => Variable::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'variable_name' => 'required|string|max:100',
            'variable_multiplier' => 'required|numeric|min:0',
            'variable_unit' => 'required|string|max:20',
        ]);
    
        Variable::create($validated);

        return redirect(route('variables.index'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variable $variable): View
    {
        $this->authorize('update', $variable);

        return view('variables.edit', [
            'variable' => $variable,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variable $variable): RedirectResponse
    {
        $this->authorize('update', $variable);

        $validated = $request->validate([
            'variable_name' => 'required|string|max:100',
            'variable_multiplier' => 'required|numeric|min:0',
            'variable_unit' => 'required|string|max:20',
        ]);

        $variable->update($validated);

        return redirect(route('variables.index'));
    }

}
