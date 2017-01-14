<?php

namespace App\Http\Controllers\API\Builders\Lessons;

use App\Http\Requests\API\Builders\Lessons\StoreModuleRequest;
use App\Http\Requests\API\Builders\Lessons\UpdateModuleRequest;
use App\Models\Module;
use App\Transformers\ModuleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller {

    public function store(StoreModuleRequest $request) {

        $module = new Module;

        $module->course_id = $request->course_id;
        $module->name = '';
        $module->description = '';
        $module->slug = '';
        $module->published = 1;
        $module->temp_guid = $request->guid;

        $module->save();

        return fractal()->item($module)->transformWith(ModuleTransformer::class)->toArray();

    }

    public function update(UpdateModuleRequest $request, Module $module) {

        $module = Module::where('id', $request->module_id)->first();
        if(!$module) {
            return response()->json(['error' => 'Could not find module.']);
        }

        $module->course_id = $request->course_id;
        $module->name = $request->title;
        $module->description = $request->module_content;
        $module->slug = str_slug($request->title);

        $module->save();

        return fractal()->item($module)->transformWith(ModuleTransformer::class)->toArray();

    }

}
