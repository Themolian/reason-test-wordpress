<?php
foreach( glob( __DIR__ . "/functions/*.php" ) as $filename )
{
    include $filename;
}
