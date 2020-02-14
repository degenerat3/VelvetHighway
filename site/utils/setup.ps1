# Do this first
Set-ExecutionPolicy unrestricted

# Install Chocolatey
Invoke-WebRequest https://chocolatey.org/install.ps1 -UseBasicParsing | Invoke-Expression

# Install AMP
choco install apache-httpd --params '"/installLocation:C:\HTTPD /port:8080"' -y
choco install mysql -y
choco install php -y --params '"/ThreadSafe"'

Add-Content "C:\HTTPD\Apache24\conf\httpd.conf" "AddHandler application/x-httpd-php .php"
Add-Content "C:\HTTPD\Apache24\conf\httpd.conf" "AddType application/x-httpd-php .php .html"
Add-Content "C:\HTTPD\Apache24\conf\httpd.conf" 'LoadModule php7_module "C:/tools/php74/php7apache2_4.dll"'
Add-Content "C:\HTTPD\Apache24\conf\httpd.conf" 'PHPIniDir "C:/tools/php74"'

(Get-Content "C:\HTTPD\Apache24\conf\httpd.conf").replace('DirectoryIndex index.html','DirectoryIndex index.php index.html"') | Set-Content "C:\HTTPD\Apache24\conf\httpd.conf"

Add-Content "C:\tools\php74\php.ini" "`nmemory_limit = 512M"
Add-Content "C:\tools\php74\php.ini" "`nupload_max_filesize = 12M"
Add-Content "C:\tools\php74\php.ini" "`ndate.timezone ='UTC'"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_curl.dll"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_gd2.dll"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_fileinfo.dll"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_mbstring.dll"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_mysqli.dll"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_pdo_mysql.dll"
Add-Content "C:\tools\php74\php.ini" "`nextension=php_openssl.dll"
Add-Content "C:\tools\php74\php.ini" "`n"

cmd.exe /c 'C:\tools\mysql\current\bin\mysql.exe --user="root" --password="" < "ini.sql"'
cmd.exe /c 'C:\tools\mysql\current\bin\mysql.exe --user="root" --password="" < "add_products.sql"'

Get-ChildItem -Path "..\" | Copy-Item -Destination "C:\HTTPD\Apache24\htdocs" -Recurse

NET STOP apache
NET START apache