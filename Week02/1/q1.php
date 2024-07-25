<?php

class Product
{
    protected string $name;
    protected int $price;
    protected array $options;

    public function __construct(string $name, int $price, array $options)
    {
        $this->name = $name;
        $this->price = $price;
        $this->options = $options;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }
}

class Shirt extends Product
{
    private string $size;

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        if (in_array($size, ['2xlg', 'xlg', 'lg', 'md', 'sm'])) {
            $this->size = $size;
        } else {
            echo 'The size is not valid';
        }
    }
}

class Pants extends Product
{
    private int $size;

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        if (30 <= $size && 60 >= $size && $size % 2 == 0) {
            $this->size = $size;
        } else {
            echo 'The size is not valid';
        }
    }
}

class Shop
{
    private array $repo = [];
    private int $income = 0;
    private int $id = 1;

    public function addProduct(Product $product, int $count): bool
    {
        if ($count <= 0) {
            return false;
        }

        foreach ($this->repo as &$item) {
            $p = $item['product'];
            if ($p->getName() == $product->getName() && $p->getOptions() == $product->getOptions() && $p->getPrice() == $product->getPrice()) {
                $item['count'] += $count;
                return true;
            }
        }

        $this->repo[] = [
            'id' => $this->id,
            'product' => $product,
            'count' => $count
        ];
        $this->id++;
        return true;
    }

    public function getSuggestion(string $type, mixed $size, int $maxPrice, array $options = []): array
    {
        $items = [];
        foreach ($this->repo as $item) {
            $p = $item['product'];
            if (get_class($p) == $type  && $p->getSize() == $size) {
                if ((is_null($maxPrice) || $p->getPrice() <= $maxPrice) && $item['count'] > 0) {
                    if (empty($options) || !array_diff($options, $p->getOptions())) {
                        $items[] = $p;
                    }
                }
            }
        }
        return $items;
    }

    public function sell(int $id): Product
    {
        foreach ($this->repo as $item) {
            if ($item['id'] == $id) {
                if ($item['count'] > 0) {
                    $item['count'] -= 1;
                    $this->income += $item['product']->getPrice();
                    return $item['product'];
                } else {
                    echo 'The count of this product is 0.';
                    return null;
                }
            }
        }
        echo 'Product with this Id not find.';
        return null;
    }

    public function getIncome()
    {
        return $this->income;
    }
}
