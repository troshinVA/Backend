<?php


namespace App\Repositories;


use App\Models\Entry;

class EntryRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function getPageById($id)
    {
        return Entry::where('id', strip_tags($id))->first();
    }
}
