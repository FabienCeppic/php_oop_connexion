<?php

function checkErrors(array $toCheck): array
{
    $errors = [];
    foreach ($toCheck as $value) {
        if (mb_strlen($value) === 0)
            array_push($errors, "$value n'est pas une valeur admissible.");
    }
    return $errors;
}
