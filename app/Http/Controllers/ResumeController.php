<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GeneratePdf;

class ResumeController extends Controller
{
    public function index()
    {
        return view('dashboard.template');
    }

    public function create($template)
    {
        // dd($template);
        session(['selected_template' => $template]);
        $nameTemplate = "templates.". $template;
        // return view('templates.resumeform1');
        return view($nameTemplate);
    }

    public function store(Request $request)
    {
        // dd($request);
        $template = session('selected_template');
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'headline' => 'required|max:255',
            'summary' => 'required',
            'email' => 'required',
            'noHP' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat' => 'required|max:255',
            'skill' => 'required',
            'institusi' => 'required',
            'gelar' => 'required',
            'tahun' => 'required',
            'namaPerusahaan' => 'required',
            'posisi' => 'required',
            'durasiBekerja' => 'required',
            // 'workDesc',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['foto'] = '';
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('foto_resumes', 'public');
            $validated['foto'] = $imagePath;
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['skills'] = json_encode($request->skill);
        $education = array();
        $experience = array();

        foreach($request->institusi as $key=>$value){
            $education[$key]['institusi']=$value;
            $education[$key]['gelar']=$request->gelar[$key];
            $education[$key]['tahun']=$request->tahun[$key];
        }

        foreach($request->namaPerusahaan as $key=>$value){
            $experience[$key]['namaPerusahaan']=$value;
            $experience[$key]['posisi']=$request->posisi[$key];
            $experience[$key]['durasiBekerja']=$request->durasiBekerja[$key];
            $experience[$key]['workDesc']=$request->workDesc[$key];
        }

        $validated['education'] = json_encode($education);
        $validated['experience'] = json_encode($experience);
        $validated['certification'] = '';
        $validated['url'] = 'cv'.time();
        $validated['template_type'] = $template;

        Resume::create($validated);

        session()->forget('selected_template');

        return redirect('/dashboard')->with('success', 'Resume berhasil dibuat');
    }

    public function show($url)
    {
        $resume = Resume::where('url', $url)->firstOrFail();
        // dd($resume);
        $templateView = 'templates.result_'.$resume->template_type;
        $imageUrl = Storage::url($resume->foto);

        return view($templateView, [
            'resume' => $resume,
            'imageUrl' => $imageUrl,
        ]);
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        $viewName = 'templates.'.$resume->template_type.'_update';
        // dd($template);
        return view($viewName, [
            'resume' => $resume,
            'skills' => json_decode($resume->skills),
            'educations' => json_decode($resume->education),
            'experiences' => json_decode($resume->experience),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'headline' => 'required|max:255',
            'summary' => 'required',
            'email' => 'required',
            'noHP' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat' => 'required|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            // 'skill' => 'required',
            // 'institusi' => 'required',
            // 'gelar' => 'required',
            // 'tahun' => 'required',
            // 'namaPerusahaan' => 'required',
            // 'posisi' => 'required',
            // 'durasiBekerja' => 'required',
            // 'workDesc',
        ]);

        $resume = Resume::findOrFail($id);

        $validated['user_id'] = auth()->user()->id;
        $validated['skills'] = json_encode($request->skill);
        $education = array();
        $experience = array();

        if ($request->institusi) {
            foreach($request->institusi as $key=>$value){
                $education[$key]['institusi']=$value;
                $education[$key]['gelar']=$request->gelar[$key];
                $education[$key]['tahun']=$request->tahun[$key];
            }
        }

        if ($request->namaPerusahaan) {
            # code...
            foreach($request->namaPerusahaan as $key=>$value){
                $experience[$key]['namaPerusahaan']=$value;
                $experience[$key]['posisi']=$request->posisi[$key];
                $experience[$key]['durasiBekerja']=$request->durasiBekerja[$key];
                $experience[$key]['workDesc']=$request->workDesc[$key];
            }
        }


        $validated['education'] = json_encode($education);
        $validated['experience'] = json_encode($experience);
        $validated['certification'] = '';
        $validated['url'] = $resume->url;

        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($resume->foto) {
                Storage::delete('public/' . $resume->foto);
            }

            $imagePath = $request->file('foto')->store('foto_resumes', 'public');
            $validated['foto'] = $imagePath;
        }

        // Resume::edit($validated);
        Resume::where('id', $resume->id)->update($validated);

        return redirect('/dashboard')->with('success', 'Resume berhasil diperbarui');
    }

    public function downloadResume($id)
    {
        $resume = Resume::findOrFail($id);
    
        $templateView = 'templates.result_' . $resume->template_type;
    
        // Generate HTML view for resume
        $imageUrl = public_path('storage/' . $resume->foto);
        $html = view($templateView, compact('resume', 'imageUrl'));
    
        // Generate PDF
        $pdf = PDF::loadHTML($html);
    
        // Get PDF content
        $pdfContent = $pdf->output();
    
        // Set the response content type to PDF
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $resume->url . '.pdf"',
        ];
    
        // Send the PDF as response
        return response($pdfContent, 200, $headers);
    }
    

    public function destroy($id)
    {
        $resume = Resume::FindOrFail($id);
        if ($resume->foto) {
            Storage::delete('public/' . $resume->foto);
        }
        $resume->delete();
        // $resume->user->delete();

        return redirect('/dashboard')->with('success', 'Resume berhasil dihapus');
    }
}
