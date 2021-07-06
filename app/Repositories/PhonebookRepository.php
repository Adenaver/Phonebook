<?php
namespace App\Repositories;

use App\Models\Phonebook as Model;

/**
 * Class PhonebookRepository
 * @package App\Repositories
 */
class PhonebookRepository extends CoreRepository
{

    protected function getModelClass(){
        return Model::class;
    }
    /*
     * Получить модель для редактирования записи
     * @param int $id
     * @return Model;
     */
    public function getEdit($id){
        return $this->startCondition()->find($id);
    }
}
