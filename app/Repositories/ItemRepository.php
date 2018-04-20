<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Item;

class ItemRepository extends Repository implements RepositoryInterface
{
    /**
     * Instance of the item class
     *
     * @var App\Models\Item
     */
    protected $item;

    public function __construct(Item $item)
    {
        $this->item  = $item;
    }

    public function getAll(): Collection
    {
        return $this->item->all();
    }

    public function get($id): Collection
    {
        $item = $this->item->find($id);

        if ($item == null) return new Collection;

        return $this->parse($item->toArray());
    }

    public function create(array $data): Collection
    {
        try {

            $this->item->item_name = $data['name'];
            $this->item->item_price = $data['price'];
            $this->item->item_category = $data['category'] ?: '';
            $this->item->sku = $data['sku'] ?: '';
            $this->item->number_in_stock = $data['number_in_stock'];
            $this->item->description = $data['description'];
            $this->item->discount = $data['discount'] ?: '';
            $this->item->isAvaliable = '1';

            $this->item->save();

            return $this->parse($this->item->toArray());

        } catch (\Exception $e) {
            return new Collection(['error' => $e->getMessage() ]);
        }

    }

    public function update(array $data): Collection
    {
        $item = $this->item->find($data['i_id']);

        if (!$item) {
            return new Collection(['error' => "Item not found." ]);
        }

        try {

            $item->item_name = $data['name'];
            $item->item_price = $data['price'];
            $item->item_category = $data['category'] ?: '';
            $item->sku = $data['sku'] ?: '';
            $item->number_in_stock = $data['number_in_stock'];
            $item->description = $data['description'];
            $item->discount = $data['discount'] ?: '';
            $item->isAvaliable = '1';

            $item->update();

            return $this->parse($item->toArray());

        } catch (\Exception $e) {
            return new Collection(['error' => $e->getMessage() ]);
        }
    }

    public function delete($id): bool
    {

    }
}
