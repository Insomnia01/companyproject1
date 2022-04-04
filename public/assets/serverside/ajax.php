<?php
header('Content-Type: application/json; charset=utf-8');

require __DIR__.'/ssp.php';

$table = <<<EOT
(
SELECT p.id, p.title, p.stock, p.status, c.title AS Category FROM product p LEFT JOIN category c ON p.category_id = c.id
) temp
EOT;

$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'company'
);

$primaryKey = 'id';
$columns = array(
array('db' => 'id', 'dt' => 0),
array('db' => 'title', 'dt' => 1),
array('db' => 'stock',  'dt' => 2),
array('db' => 'Category','dt' => 3), 
array('db' => 'status','dt' => 4),
array('db' => 'id',  'dt' => 5,'formatter' => function($data){ 
return "<a href = '/admin/product/{$data}/edit' class = 'btn btn-primary'>Edit </a>  
     <a href = '/admin/product/{$data}/delete' class = 'btn btn-danger'>Delete </a>";
})
);
echo json_encode(
SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns),JSON_UNESCAPED_UNICODE
);
