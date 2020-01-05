<?php


namespace App\Filter;


class PostFilter
{
    public function search($query, $search, $searchKey)
    {
        $searchKey = str_replace('_', '', ucwords($searchKey, '_'));
        $function = 'searchBy' . $searchKey;

        if (method_exists($this, $function)) {
            $query = $this->$function($query, $search);

            return $query;
        }

        return $query;
    }

    public function searchByPostTitle($query, $search)
    {
        return $query->where('title', 'like', "%$search%");
    }

    public function searchByDescription($query, $search)
    {
        return $query->where('description', 'like', "%$search%");
    }
}
