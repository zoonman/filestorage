<?php

/*

Copyright (c) 2012, Philipp Tkachev
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:.

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright notice,
   this list of conditions and the following disclaimer in the documentation
   and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

The views and conclusions contained in the software and documentation are those
of the authors and should not be interpreted as representing official policies,
either expressed or implied, of the FreeBSD Project.

*/


// Include PHP Storage Class
include_once("FileStorage.php");

// NOTE: Please, be sure that current directory has writable fb.txt
// The fastest (but not very secure) way to create it
// touch fb.txt
// chmod a+w fb.txt
// Create object instance
$f = new FileStorage(dirname(__FILE__).'/fb.txt');

// Save first variable into fb.txt
$f->set('first_var', "first_var_value");

// Save second variable into fb.txt
$f->set('second_var', array('a'=>'a value', 'b'=>'b value'));

// ... some your actions is here

// Read values from file
$value = $f->get('first_var');
print_r($value);

// Read second value from file
$value = $f->get('second_var');
print_r($value);

// Modify first value
$f->set('first_var', "Modified first value");

// Read first value after modification
$value = $f->get('first_var');
print_r($value);

?>