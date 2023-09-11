<?php


todo('has at least one class');

it('can pass', function () {
    $foo = 'bar';

    expect($foo)->tobe('bar');
});
