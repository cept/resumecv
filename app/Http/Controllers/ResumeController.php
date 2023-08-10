<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResumeController extends Controller
{
    public function index()
    {
        return view('dashboard.template');
    }

    public function create()
    {
        return view('templates.resumeform1');
    }

    public function store(Request $request)
    {
        // dd($request);
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
        ]);
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

        Resume::create($validated);


        // $akun = new User;
        // $resume = new Resume;
        // $resume->user_id = '2';
        // $resume->nama_lengkap = $request->nama;
        // $resume->email = $request->email;
        // $resume->noHP = $request->nohp;
        // $resume->headline = $request->headline;
        // $resume->alamat = $request->alamat;
        // $resume->summary = $request->summary;
        // $resume->experience = [$request->namaPerusahaan, $request->posisi, $request->durasiBekerja, $request->workDesc];
        // $resume->education = [$request->institusi, $request->gelar, $request->tahun];
        // $resume->skills = $request->skill;
        // $resume->certification = '';
        // $resume->save();
        // Resume::create('2','','','','','','','','','','');

        return redirect('/dashboard')->with('success', 'Resume berhasil dibuat');
    }

    public function show($url)
    {
        $resume = Resume::where('url', $url)->firstOrFail();
        // dd($resume);
        
        return view('templates.resume1', [
            'resume' => $resume,
        ]);
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        // dd($resume);
        return view('templates.resumeform1_update', [
            'resume' => $resume,
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
            'skill' => 'required',
            'institusi' => 'required',
            'gelar' => 'required',
            'tahun' => 'required',
            'namaPerusahaan' => 'required',
            'posisi' => 'required',
            'durasiBekerja' => 'required',
            // 'workDesc',
        ]);

        $resume = Resume::findOrFail($id);

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
        $validated['url'] = $resume->url;

        // Resume::edit($validated);
        Resume::where('id', $resume->id)->update($validated);

        return redirect('/dashboard')->with('success', 'Resume berhasil diperbarui');
    }

    public function destroy($id)
    {
        $resume = Resume::FindOrFail($id);
        $resume->delete();
        // $resume->user->delete();

        return redirect('/dashboard')->with('success', 'Resume berhasil dihapus');
    }
}
