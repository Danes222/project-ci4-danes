<?php

namespace App\Controllers;

class Product extends BaseController
{
    public function index()
    {
        echo '
        <h1>
        <ol>
            <li><a href="http://localhost:8080/product/detail/sepatu">Sepatu</a></li>
            <li><a href="http://localhost:8080/product/detail/baju">Baju</a></li>
            <li><a href="http://localhost:8080/product/detail/celana">Celana</a></li>
        </ol>
        </h1>
        ';
    }
    public function detail($prod)
    {
        echo "Detail ".$prod;
    }
}
