<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository.
 */
class PostRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox(){

        $columns = implode(', ', ['id', 'CONCAT(id, ". ",title) AS id_title']);

        $result[] = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        //dd($result);
        return $result;
    }


    public function getAllWithPaginate($perPage = null){
        $columns = ['id', 'title', 'slug', 'category_id', 'location_id', 'excerpt'];
        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with('category', 'user', 'location')
            ->paginate($perPage);

        return $result;
    }

    public function getFromSlug($slug){

        return $this->startConditions()
            ->where('slug', $slug)
            ->with('location')->first();

    }


}
