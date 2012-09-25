@echo off
if "%PHPBIN%" == "" set PHPBIN=c:\Zend\ZendServer\bin\php.exe
"%PHPBIN%" "c:\www\delivery_sync\app\console" %*