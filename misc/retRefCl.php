<?php

$data['something interesting'] = 'Old value';

$lookup_value = function & ($search_for) use (&$data) {
    return $data[$search_for];
};

$my_value =& $lookup_value('something interesting');
$my_value = 'New Value';

assert($data['something interesting'] === 'New Value');