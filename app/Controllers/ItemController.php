<?php

namespace App\Controllers;

use App\Repositories\ItemRepository as ItRep;
use Illuminate\Routing\Controller;
use PDC\Request;
use App\Validators\Validator;
use App\Services\Session;
use App\Models\Item;

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
            return renderView('items.show', compact('item'));
        }

        return "Item not found!";
    }

    public function getCreate()
    {
        return renderView('items.create');
    }

    public function getEdit($id)
    {
        $item = Item::find($id);
        return renderView('items.edit', compact('item'));
    }

    public function createNewItem(Request $pdcRequest)
    {
        $item = $this->it->create($pdcRequest->request->all());

        if (arraY_key_exists('error', $item->toArray())) {
            Session::error("Unable to create Item. Please Try again");
            dd($item->get('error'));
        }

        $itemId = $item->get('id');

        return redirectTo("items/$itemId");
    }

    public function updateItem(Request $pdcRequest)
    {
        $item = $this->it->update($pdcRequest->request->all());

        if (arraY_key_exists('error', $item->toArray())) {
            Session::error("Unable to create Item. Please Try again");
            dd($item->get('error'));
        }

        $itemId = $item->get('id');

        return redirectTo("items/$itemId");
    }

    public function deleteItem($id)
    {

    }
}