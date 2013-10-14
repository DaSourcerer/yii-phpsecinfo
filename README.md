phpsecinfo
==========
A widget to run and display the result of tests concerning PHP's security.

Please take note that the sheer presence of this widget does not add any extra security. All bundled tests are covering
PHP server settings and variables while altering none of them. This widget will not perform any kind of code audit. It
is simply a helper to identify potentially dangerous settings in your environment.

As this widget reveals a significant amount of security-related informations, restrict access to it strictly (e.g. by
placing it on your admin dashboard but nowhere else).

If you spot any errors or flaws in the tests, please be so kind and report them to the [upstream project](https://github.com/funkatron/phpsecinfo).

Installation
============
Download and extract this widget to your application's `extensions` directory. No further configuration is necessary.

If you are tying this module in as a git submodule, install the extension into a `phpsecinfo` path and run
`git submodule init` in it again as the PhpSecInfo library is itself a submodule.

Usage
=====
Find a suitable spot for the widget and include this code in your template:
```
<?php $this->widget('ext.phpsecinfo.PhpsecinfoWidget'); ?>
```