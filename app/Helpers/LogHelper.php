<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class LogHelper
{
    public static function log($action, $description = null, $modelType = null, $modelId = null, $old = null, $new = null)
    {
        return ActivityLog::create([
            'user_id'     => auth()->id(),
            'action'      => $action,
            'model_type'  => $modelType,
            'model_id'    => $modelId,
            'description' => $description,
            'old_values'  => $old ? json_encode($old) : null,
            'new_values'  => $new ? json_encode($new) : null,
        ]);
    }
}
