<?php

namespace App\Http\Controllers;


use App\Xp;
use App\xpYear;
use App\Http\Requests\StoreXp;
use Illuminate\Http\Request;
use App\Pdf;
use App\Base;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function CV() {
        $xps = Xp::get()->where('publish', '==', '1')->sortByDesc("year");
        $pdf = Pdf::all()->sortByDesc('date')->first();

        return view('bases/CV/column', ['xps'=>$xps, 'pdf'=>$pdf, 'backoffice'=>0]);
    }

    public function backOffice() {
        $this->authorize('admin', Base::class);
        $xps = Xp::all()->sortByDesc('year');
        $pdfs = PDF::all()->sortByDesc('date');
        return view('bases/CV/column',['xps'=>$xps, 'pdf'=>$pdfs->first(),'pdfs'=>$pdfs, 'backoffice'=>1]);
    }

//----------------------------------------------------------------------------------------------------------------------Xp
    public function createXp() {
        $this->authorize('admin', Base::class);

        return view("bases/CV/xp/create");
    }

    public function storeXp(StoreXp $request) {
        $this->authorize('admin', Base::class);

        $validated = $request->validated();
        $xp=Xp::create($request->all());

        return redirect(route('CV.backoffice'))->with('status', 'Nouvelle '.$xp->type.' ajoutée');
    }

    public function editXp(Xp $xp) {
        $this->authorize('admin', Base::class);

        return view('bases/CV/xp/edit', ['xp'=>$xp]);
    }

    public function updateXp(Xp $xp, StoreXp $request) {
        $this->authorize('admin', Base::class);

        $validated = $request->validated();

        $xp->year = $request->get('year');
        if ($request->get('publish')) {
            $xp->publish = 1;
        } else {
            $xp->publish = 0;
        }
        $xp->exp_title = $request->get('exp_title');
        $xp->exp_details_1 = $request->get('exp_details_1');
        $xp->exp_details_2 = $request->get('exp_details_2');
        $xp->exp_content = $request->get('exp_content');
        $xp->exp_link = $request->get('exp_link');
        $xp->for_title = $request->get('for_title');
        $xp->for_details_1 = $request->get('for_details_1');
        $xp->for_details_2 = $request->get('for_details_2');
        $xp->for_content = $request->get('for_content');
        $xp->for_link = $request->get('for_link');
        $xp->save();

        $type = 'L\'expérience';
        if ($xp->type == 'formation') {
            $type = 'La formation';
        }
        return redirect()-> route('CV.backoffice')->with('status', $type.' a bien été mise à jour');
    }

    public function deleteXp(Xp $xp) {
        $this->authorize('admin', Base::class);

        $type = 'L\'expérience';
        if ($xp->type == 'formation') {
            $type = 'La formation';
        }
        $xp->delete();

        return redirect()-> route('CV.backoffice')->with('status', $type.' a bien été supprimée');
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

        return redirect()-> route('CV.backoffice')->with('status', 'Le PDF a bien été supprimé');
    }
}
