<?php

namespace App\Http\Controllers\API\Builders\Lessons;

use App\Http\Requests\API\Builders\Lessons\StoreModuleRequest;
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

}
