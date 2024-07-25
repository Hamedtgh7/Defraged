<?php

class Validation
{
    public $data;
    public $is_strict = false;
    public $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public static function create($data)
    {
        return new self($data);
    }

    public function is_strict($isStrict)
    {
        $this->is_strict = $isStrict;
    }

    public function setMethods($methods)
    {
        foreach ($methods as $method => $params) {
            if (method_exists($this, $method)) {

                if (!is_array($params)) {
                    $params = [$params];
                }

                $result = call_user_func_array([$this, $method], $params);
                if (!$result) {
                    if ($this->is_strict) {
                        echo "The error is in $method\n";
                        return;
                    } else {
                        $this->errors[] = "The error is in $method";
                    }
                }
            } else {
                throw new Exception('The method does not exist.');
            }
        }
        if (!empty($this->errors)) {
            foreach ($this->errors as $error) {
                echo $error . "\n";
            }
        } else {
            echo 'Everything is ok.';
        }
    }

    public function code($number)
    {
        return preg_match("/^\d{10}$/", $number);
    }

    public function number($number)
    {
        return preg_match("/^09\d{9}$/", $number);
    }

    public function email($address)
    {
        return preg_match("/^[a-zA-Z0-9._]+@[a-zA-Z.]+\.[a-zA-Z]{2,}$/", $address);
    }

    public function is_all_number_or_letter($string)
    {
        return preg_match("/^[a-zA-Z0-9]+$/", $string);
    }

    public function both_number_and_letter($string)
    {
        return preg_match("/[a-zA-Z]/", $string) && preg_match("/[0-9]/", $string);
    }

    public function length($strnig, $length)
    {
        return strlen($strnig) == $length;
    }
}


$test = Validation::create([]);

$test->is_strict(true);

$test->setMethods([
    'code' => ['4315625842'],
    'number' => ['09368459526'],
    'email' => ['test@gmail.com'],
    'is_all_number_or_letter' => ['test17'],
    'both_number_and_letter' => ['test170'],
    'length' => ['test1177', 8]
]);
