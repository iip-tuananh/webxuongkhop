<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use App\Model\Common\File;
use Illuminate\Database\Eloquent\Model;

class TitlePage extends Model
{
    protected $table = 'title_pages';

    public static function getDataForEdit($page) {
        return self::where('page', $page)->firstOrFail();
    }
}
