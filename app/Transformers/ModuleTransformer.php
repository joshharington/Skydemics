<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/01/14
 * Time: 10:28 PM
 */

namespace App\Transformers;


use App\Models\Module;
use League\Fractal\TransformerAbstract;

class ModuleTransformer extends TransformerAbstract {

    public function transform(Module $module) {
        return [
            'id' => $module->id,
            'name' => $module->name,
            'description' => $module->description,
            'slug' => $module->slug,
            'course_id' => $module->course_id,
            'published' => $module->published,
        ];
    }

}