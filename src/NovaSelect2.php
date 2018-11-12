<?php

namespace Enmaboya\NovaSelect2;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;

class NovaSelect2 extends Select
{
    public $component = 'nova-select2';
    public $showOnIndex = false;

    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
	{
        if (is_null($request[$requestAttribute])) {
            return $model->$attribute()->detach();
        }
        $class = get_class($model);
		$class::saved(function ($model) use ($requestAttribute, $request, $attribute) {
            $model->$attribute()->sync(explode(",", $request[$requestAttribute]));
        });
    }
}
