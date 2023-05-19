<?php

namespace App\Http\Controllers;

use App\Jobs\ImportFileJob;
use App\Jobs\ProcessImportQueueJob;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('import.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $file = $request->file('file');
        $path = Storage::putFile('data', $file);

        ImportFileJob::dispatch($path);

        return redirect()->back()->with('success', 'File imported and added to the queue for processing.');
    }

    public function processQueue(): RedirectResponse
    {
        dispatch(new ProcessImportQueueJob());

        return redirect()->back()->with('success', 'Import queue processed successfully.');
    }
}
