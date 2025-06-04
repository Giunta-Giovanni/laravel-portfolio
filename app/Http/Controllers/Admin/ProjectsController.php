<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ricaviamoci tutti i progetti dal modulo Project
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        // dump($types);
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $image = $data['image'];



        // dd($image);

        // dd($data['technologies']);

        $newProject = new Project();

        $newProject->title = $data['title'];
        $newProject->client = $data['client'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        $newProject->state = $data['state'];
        $newProject->description = $data['description'];
        $newProject->type_id = $data['type'];

        // controlliamo se il'immagine e stata caricata
        if (array_key_exists('image', $data)) {
            $img_path = Storage::putFile('uploads', $image);

            // salviamo il file immagine
            $newProject->image = $img_path;
        }

        // dd($newProject);
        $newProject->save();

        // dobbiamo controllare se la nostra richiesta ha la chiave technologies
        if ($request->has('technologies')) {
            // aggiungiamo le technologies della tabella pivot
            $newProject->technologies()->attach($data['technologies']);
        } else {
            // se non riceviamo i tags eliminiamoli 
            $newProject->technologies()->detach();
        }
        //dopo aver salvato i post 




        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //prendiamo il progetto con quello specifico id dal Db
        // $project = Project::find($id);
        // dump($project->technologies);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // dd($project);
        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // dump($project);
        // return 'sei nella update';
        $data = $request->all();

        // dd(array_key_exists('image', $data));
        // dd($data);
        $project->title = $data['title'];
        $project->client = $data['client'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->state = $data['state'];
        $project->description = $data['description'];
        $project->type_id = $data['type'];

        if (array_key_exists('image', $data)) {

            if ($project->image) {
                //eliminare l'immagine precedente
                Storage::delete($project->image);
            }

            //caricare una nuova immagine
            $img_path = Storage::putFile('uploads', $data['image']);

            //aggiornare il db
            $project->image = $img_path;
        }

        // dump($project);

        $project->update();

        // dobbiamo controllare se la nostra richiesta ha la chiave technologies
        if ($request->has('technologies')) {
            // sincronizziamo le technologies della tabella pivot
            $project->technologies()->sync($data['technologies']);
        } else {
            // se non riceviamo i tags eliminiamoli 
            $project->technologies()->detach();
        }



        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->technologies()->detach();
        // dump($project);
        //se la tabella ha l'immagine collegata, la eliminiamo

        if ($project->image) {
            //dd("L'immagine è presente")
            Storage::delete($project->image);
        }
        //dd("L'immagine non è presente")

        $project->delete();

        // facciamo il redirect
        return redirect()->route('projects.index');
    }
}
