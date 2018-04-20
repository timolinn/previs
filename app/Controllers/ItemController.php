<?php

namespace App\Controllers;

use App\Repositories\ItemRepository as ItRep;
use Illuminate\Routing\Controller;
use PDC\Request;
use App\Validators\Validator;

class ItemController extends Controller
{
    /**
     * ItemRepository Instance
     *
     * @var App\Repositories\itemRepository
     */
    protected $it;

    public function __construct(ItRep $it)
    {
        $this->it = $it;
    }

    public function getAllItems()
    {
        return $this->it->getAll();
    }

    public function getItem($id)
    {
        $item = $this->it->get($id);

        if (!empty($item->toArray())) {
            return $item;
        }

        return "Item not found!";
    }

    public function getCreate()
    {
        return renderView('items.create');
    }

    public function getEdit()
    {
        return renderView('items.edit');
    }

    public function createNewItem(Request $pdcRequest)
    {



        $item = $this->it->create($pdcRequest->request->all());
    }

    public function updateItem(Request $pdcRequest)
    {

    }

    public function deleteItem($id)
    {

    }
}