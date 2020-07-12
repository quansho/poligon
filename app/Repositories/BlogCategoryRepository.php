<?php

namespace App\Repositories;

use App\Models\BlogPostCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
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

        $result[] = $this->startConditions()->selectRaw($columns)->toBase()->get();

        //dd($result);
        return $result;
    }


    public function getAllWithPaginate($perPage = null){
        $columns = ['id', 'title', 'parent_id', 'slug', 'updated_at','description'];
        $result = $this->startConditions()
            ->select($columns)
            ->with('parentCategory:id,title')
            ->paginate($perPage);

        return $result;
    }
}
