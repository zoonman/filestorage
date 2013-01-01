<?php

/*

Copyright (c) 2012, Philipp Tkachev
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met: 

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


/**
 * Class for storing key=value database in binary file
 *
 */
class FileStorage {
	/**
	 * Protected filename
	 *
	 * @var string
	 */
	protected $fileName;
	/**
	 * Constructor. 
	 *
	 * @param string $fileName
	 */
	public function __construct($fileName) {
		$this->fileName = $fileName;
	}
	/**
	 * Getting value from from by key
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function get($key) {
		if (file_exists($this->fileName)) {
			$handle = fopen($this->fileName,"rb");
			$contents = '';
			$res = null;
			while (!feof($handle)) {
			  $contents .= fread($handle, 8192);
			}
			fclose($handle);
			if (!empty($contents))	{
				$res = unserialize($contents);
				if (is_array($res)) {
					if (array_key_exists($key,$res)) {
						return $res[$key];
					}
				}
			}
		}
		return null;
	}
	/**
	 * Setting value and storing it into file
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return bool
	 */
	public function set($key,$value) {
		if (file_exists($this->fileName)) {
			$handle = fopen($this->fileName,"rb");
			$contents = '';
			$res = null;
			while (!feof($handle)) {
			  $contents .= fread($handle, 8192);
			}
			fclose($handle);
			if (!empty($contents))	{
				$res = unserialize($contents);
			}
			if (is_array($res)) {
				$res[$key] = $value;
			}
			else {
				$res = array($key => $value);
			}
			
			$wres = serialize($res);
			if(is_writable($this->fileName)) {
				$handle = fopen($this->fileName,"wb");
				fwrite($handle,$wres);
				fclose($handle);
				return true;
			}
		}
		return false;
	}
}

?>