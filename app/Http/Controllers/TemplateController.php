<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::paginate(10);
        return view('admin.template', compact('templates'));
    }

    public function create()
    {
        return view('admin.createTemplate');
    }

    public function store(Request $request)
    {
         // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'nama_template' => 'required|max:255',
            'keterangan_template' => 'required|max:255',
            'foto_template' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'design_html_css' => 'required',

        ]);

        // Mengunggah gambar (foto template) jika ada
        if ($request->hasFile('foto_template')) {
            $imagePath = $request->file('foto_template')->store('template_images', 'public');
            $validatedData['foto_template'] = $imagePath;
        }

        // $validatedData['foto_template'] = '';
        $validatedData['elemen_resume'] = '';
        // $validatedData['design_html_css'] = '';
        // Membuat record template baru dalam database
        $template = Template::create($validatedData);

        // Mendapatkan ID template yang baru dibuat
        $templateId = 5 + $template->id; 

       // Simpan konten HTML & CSS sebagai file Blade
        $templateContent = $request->input('design_html_css');
        $templatePath = resource_path("views/templates/result_resumeform{$templateId}.blade.php");
        File::put($templatePath, $templateContent);

        // Redirect ke halaman yang sesuai, atau tampilkan pesan sukses
        return redirect()->route('templates.index')->with('success', 'Template berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);
        // dd($template);
        return view('admin.updateTemplate', [
            'template' => $template,
        ]);
    }

    public function update(Request $request, Template $template)
    {
         // Validasi data yang dikirimkan oleh formulir
         $validatedData = $request->validate([
            'nama_template' => 'required|max:255',
            'keterangan_template' => 'required|max:255',
            'foto_template' => 'image|mimes:jpeg,png,jpg|max:2048',
            'design_html_css' => 'required',

        ]);

        // Mengunggah gambar (foto template) jika ada
        if ($request->hasFile('foto_template')) {
            // Hapus foto lama jika ada
            if ($template->foto_template) {
                Storage::delete('public/' . $template->foto_template);
            }

            $imagePath = $request->file('foto_template')->store('template_images', 'public');
            $validatedData['foto_template'] = $imagePath;
        } 

        // $validatedData['foto_template'] = '';
        $validatedData['elemen_resume'] = '';
        // $validatedData['design_html_css'] = '';
       
        // Update record template dalam database
        $template->update($validatedData);

        // Mendapatkan ID template yang baru dibuat
        $templateId = 5 + $template->id; 

       // Simpan konten HTML & CSS sebagai file Blade
        $templateContent = $request->input('design_html_css');
        $templatePath = resource_path("views/templates/result_resumeform{$templateId}.blade.php");
        File::put($templatePath, $templateContent);

        // Redirect ke halaman yang sesuai, atau tampilkan pesan sukses
        return redirect()->route('templates.index')->with('success', 'Template berhasil diperbarui.');
    }

    public function destroy(Template $template)
    {
         // Hapus file Blade terkait
         $templateid = 5 + $template->id;
        $templateFileName = "result_resumeform{$templateid}.blade.php";
        // dd($templateFileName);
        $templatePath = resource_path("views/templates/{$templateFileName}");

        if (File::exists($templatePath)) {
            File::delete($templatePath);
        }

        // Hapus foto template jika ada
        if ($template->foto_template) {
            Storage::delete('public/' . $template->foto_template);
        }

        $template->delete();

        return redirect('/templates')->with('success', 'Template berhasil dihapus');
    }

}
