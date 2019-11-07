<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xp;
use App\Formation;
use App\Pdf;
use App\Base;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function CV() {
        return view('bases/CV/CV');
    }

    public function backOffice() {
        $this->authorize('admin', Base::class);
        $xps = Xp::all()->sortBy('date');
        $formations = Formation::all()->sortBy('date');
        $pdfs = PDF::all()->sortByDesc('date');
        return view('bases/CV/backoffice',['xps'=>$xps,'formations'=>$formations, 'PDFs'=>$pdfs]);
    }

//----------------------------------------------------------------------------------------------------------------------Xp
    public function createXp() {
        $this->authorize('admin', Base::class);

        return view("bases/CV/createXp");
    }

    public function storeXp() {
        $this->authorize('admin', Base::class);
    }

    public function editXp($xp) {
        $this->authorize('admin', Base::class);
    }

    public function updateXp($xp) {
        $this->authorize('admin', Base::class);
    }

    public function deleteXp($xp) {
        $this->authorize('admin', Base::class);
    }

//----------------------------------------------------------------------------------------------------------------------Formations
    public function createFormation() {
        $this->authorize('admin', Base::class);

        return view("bases/CV/createFormation");
    }

    public function storeFormation() {
        $this->authorize('admin', Base::class);
    }

    public function editFormation($formation) {
        $this->authorize('admin', Base::class);
    }

    public function updateFormation($formation) {
        $this->authorize('admin', Base::class);
    }

    public function deleteFormation($formation) {
        $this->authorize('admin', Base::class);
    }


//----------------------------------------------------------------------------------------------------------------------PDF
    public function createPdf() {
        $this->authorize('admin', Base::class);

        return view("bases/CV/PDF/create");
    }

    public function storePdf(Request $request) {
        $this->authorize('admin', Base::class);

        $file = $request->file('file');
        $link = 'CV-Clement_Muller-'.$request->date.'-'.$request->lang.'.pdf';
        $file->move(base_path('/storage/app/public/CV/'), $link);
        $request->merge(['link'=>$link]);

        $pdf=Pdf::create($request->all());

        return redirect(route('CV.backoffice'))->with('status', 'Nouveau PDF ajouté');
    }

    public function showPdf() {
        $pdf = Pdf::all()->sortByDesc('date')->first();

        return redirect('storage/CV/'.$pdf->link);
    }

    public function editPdf(Pdf $pdf) {
        $this->authorize('admin', Base::class);

        return view('bases/CV/pdf/edit', ['pdf'=>$pdf]);
    }

    public function updatePdf(Pdf $pdf, Request $request) {

        $this->authorize('admin', Base::class);

        $oldLink = $pdf->link;
        $pdf->lang = $request->get('lang');
        $pdf->date = $request->get('date');
        $link = 'CV-Clement_Muller-'.$pdf->date.'-'.$pdf->lang.'.pdf';
        $pdf->link = $link;
        if($oldLink != $link) {
            Storage::move('/CV/' . $oldLink, '/CV/' . $link);
        }
        $pdf->save();

        return redirect()-> route('CV.backoffice')->with('status', 'Le PDF a bien été mis à jour');
    }

    public function deletePdf(Pdf $pdf) {
        $this->authorize('admin', Base::class);
        Storage::delete('/CV/'.$pdf->link);
        $pdf->delete();
    }
}
