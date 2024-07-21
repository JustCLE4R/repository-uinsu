<?php

use App\Models\ChangeLog;

if (!function_exists('createLog')) {
  function createLog($archive, $action, $oldValues = null, $newValues = null)
  {
    if ($oldValues !== null) {
      unset($oldValues['id'], $oldValues['created_at'], $oldValues['updated_at']);
    }

    if ($newValues !== null) {
      unset($newValues['id'], $newValues['created_at'], $newValues['updated_at']);
    }
  
    ChangeLog::create([
      'archive_id' => $archive->id,
      'user_id' => auth()->id(),
      'action' => $action,
      'old_values' => $oldValues,
      'new_values' => $newValues,
    ]);
  }
}