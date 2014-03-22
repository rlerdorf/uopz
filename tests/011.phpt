--TEST--
Test undefine
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
define ("MY", 1);
uopz_undefine("MY");
var_dump(defined("MY"));
class Upper {
	const NUM = 10;
}
class Lower extends Upper {}
uopz_undefine(Lower::class, "NUM");
var_dump(@constant("Lower::NUM"),
		 @constant("Upper::NUM"));
uopz_redefine(Lower::class, "NUM", 50);
var_dump(@constant("Lower::NUM"),
		 @constant("Upper::NUM"));
?>
--EXPECT--
bool(false)
NULL
NULL
int(50)
int(50)



