<?php
    return [
        "/" => "Index/show",
        "/news/" => "News/index",
        "/news/(\d+)" => "News/show",
        "/products/"=>"Products/index",
        "/products/(\d+)"=>"Products/show",
    ];