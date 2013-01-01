PHP Class FileStorage

This class developed as simple implementation key-value storage in file system. 

It presents simple example of NoSQL database realised on PHP.

Store value into file fb.txt:


$f = new FileStorage(dirname(__FILE__).'/fb.txt');
$f->set($var_name,$var_value);

Read this value later:

$f = new FileStorage(dirname(__FILE__).'/fb.txt');
$value = $f->get($var_name);

I use dirname(__FILE__).'/fb.txt' for storing file near with class. It is a bad code, because you should save your data in private directory.

The home page of project is here http://www.zoonman.com/projects/filestorage/