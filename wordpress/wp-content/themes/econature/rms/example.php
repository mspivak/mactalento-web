<?php

namespace Mactalento;

require 'Jobs.php';

echo '<pre>';

echo '<hr>';
echo "<h1>Oportunidad con <code>id=11</code></h1>";
var_dump(Jobs::one(11));

echo '<hr>';
echo "<h1>Oportunidad con <code>id=123</code> <em>(Inexistente)</em></h1>";
var_dump(Jobs::one(123));

echo '<hr>';
echo "<h1>Todas</h1>";
var_dump(Jobs::all());